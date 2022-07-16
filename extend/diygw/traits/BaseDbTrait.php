<?php
declare(strict_types=1);

namespace diygw\traits;

use diygw\Utils;
use think\helper\Str;

trait BaseDbTrait
{
    protected $likeField=[];

    protected $paginate = true;

    public function afterList(&$list){
        return true;
    }

    /**
     * 查询列表
     *
     * @time 2022年03月28日
     * @return mixed
     */
    public function getList()
    {
        // 不分页
        if (property_exists($this, 'paginate') && $this->paginate === false) {
            $data =   $this->quickSearch($this->likeField)
                ->field('*')
                ->diygwOrder()
                ->select()->toArray();
            $list['data']= $data;
            $list['total']= count($data);
        }else{
            $requestParams = \request()->param();
            $pageSize = 10;
            if(isset($requestParams['pageSize'])){
                $pageSize = $requestParams['pageSize'];
            }
            // 分页列表
            $list =  $this->quickSearch($this->likeField)
                ->field('*')
                ->diygwOrder()
                ->paginate([
                    'list_rows'=> $pageSize,
                    'var_page' => 'pageNum',
                ])->toArray();
        }
        //对结果返回前进行处理
        if ($this->afterList($list)) {
            return ['rows'  => $list['data'],'count' => $list['total']];
        }else{
            return ['rows'  => [],'count' => 0];

        }
    }

    /**
     * 查询获取所有数据列表
     *
     * @time 2022年03月28日
     * @return mixed
     */
    public function getAllList()
    {
        $data =   $this->quickSearch()
            ->field('*')
            ->diygwOrder()
            ->select()->toArray();
        $list['data']= $data;
        $list['total']= count($data);
        //对结果返回前进行处理
        if ($this->afterList($list)) {
            return ['rows'  => $list['data'],'count' => $list['total']];
        }else{
            return ['rows'  => [],'count' => 0];

        }
    }

    public function getPk(){
        return $this->diygwPk();
    }


    public function beforeAdd(&$data){
        return true;
    }

    public function afterAdd(&$data){
        return true;
    }


    public function beforeEdit(&$data){
        return true;
    }

    public function afterEdit(&$data){
        return true;
    }

    /**
     *
     * @param array $data
     * @return bool
     */
    public function add(array $data)
    {
        $pk = $this->diygwPk();
        if ($this->beforeAdd($data) && $this->allowField($this->field)->save($this->filterData($data))) {
            $pkvalue =  $this->{$this->getPk()};
            $data[Str::camel($pk)] = $pkvalue;
            $this->afterAdd($data);
            return  $data;
        }
        return false;
    }


    /**
     *
     * @param $data
     * @param string $field
     * @return bool
     * @throws \think\db\exception\DbException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\db\exception\DataNotFoundException
     */
    public function edit($data)
    {
        $pk = $this->diygwPk();
        $id = $data[Str::camel($pk)];
        if ($this->beforeEdit($data) && static::update($this->filterData($data), [$pk => $id])) {
            $this->updateChildren($id, $data);
            $this->afterEdit($data);
            return $data;
        }
        return false;
    }


    /**
     *
     * @param $id
     * @param bool $force
     * @return mixed
     */
    public function del($id, bool $force = false)
    {
        return static::destroy(is_array($id['id']) ? $id['id'] : Utils::stringToArrayBy($id['id']), $force);
    }


    /**
     * 用于循环插入
     *
     * @time 2022年03月21日
     * @param array $data
     * @return mixed
     */
    public function createData(array $data)
    {
        $model = static::create($data, $this->field, true);
        return $model->{$this->getPk()};
    }

    public function afterGet($data){
        return $data;
    }

    public function get($id){
        $data = static::where($this->getPk(), $id['id'])->find();
        if($data){
            return $this->afterGet($data->toArray());
        }else{
            return $this->afterGet([]);
        }
    }
    /**
     *
     * @param $id
     * @param array $field
     * @param bool $trash
     * @return mixed
     */
    public function findData($id, array $field = ['*'], bool $trash = false)
    {
        if ($trash) {
            return static::onlyTrashed()->find($id);
        }

        return static::where($this->getPk(), $id)->field($field)->find();
    }



    /**
     * 批量插入
     *
     * @param array $data
     * @return mixed
     */
    public function insertAllData(array $data)
    {
        $newData = [];
        foreach ($data as $item) {
            foreach ($item as $field => $value) {
                if (!in_array($field, $this->field)) {
                    unset($item[$field]);
                }

                if (in_array($this->createTime, $this->field)) {
                    $item[$this->createTime] = time();
                }

                if (in_array($this->updateTime, $this->field)) {
                    $item[$this->updateTime] = time();
                }
            }
            $newData[] = $item;
        }
        return $this->insertAll($newData);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function recover($id)
    {
        return static::onlyTrashed()->find($id)->restore();
    }

  /**
   * 获取删除字段
   *
   * @time 2022年03月18日
   * @return mixed
   */
    public function getDeleteAtField()
    {
      return $this->deleteTime;
    }

    /**
     * 更新下级
     *
     * @time 2022年03月28日
     * @param $parentId
     * @param $data
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\DbException
     * @throws \think\db\exception\ModelNotFoundException
     * @return void
     */
    protected function updateChildren($parentId, $data)
    {
        if (property_exists($this, 'updateChildrenFields')) {
            $parentIdField = property_exists($this, 'parentId') ? $this->$parentId : 'parent_id';

            if (!empty($this->updateChildrenFields)) {
                if (is_array($this->updateChildrenFields)) {
                    foreach ($data as $field => $value) {
                        if (! in_array($field, $this->updateChildrenFields)) {
                            unset($data[$field]);
                        }
                    }

                    $this->recursiveUpdate($parentId, $parentIdField, $data);
                }

                if (is_string($this->updateChildrenFields) && isset($data[$this->updateChildrenFields])) {
                    $this->recursiveUpdate($parentId, $parentIdField, [
                        $this->updateChildrenFields => $data[$this->updateChildrenFields]
                    ]);
                }
            }
        }
    }

    /**
     * 递归更新子级
     *
     * @time 2022年03月25日
     * @param $parentId
     * @param $parentIdField
     * @param $updateData
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\DbException
     * @throws \think\db\exception\ModelNotFoundException
     * @return void
     */
    public function recursiveUpdate($parentId, $parentIdField, $updateData)
    {
        $this->where($parentIdField, $parentId)->update($updateData);

        $children = $this->where($parentIdField, $parentId)->select();

        if ($children->count()) {
            foreach ($children as $child) {
                $this->recursiveUpdate($child->id, $parentIdField, $updateData);
            }
        }
    }

  /**
   * 别名
   *
   * @time 2022年03月18日
   * @param $field
   * @param string $table
   * @return array|string
   */
    public function aliasField($field, $table = '')
    {
        $table = $table ? Utils::tableWithPrefix($table) : $this->getTable();

        if (is_string($field)) {
            return sprintf('%s.%s', $table, $field);
        }

        if (is_array($field)) {
            foreach ($field as &$value) {
                $value = sprintf('%s.%s', $table, $value);
            }

            return $field;
        }

        return $field;
    }

    /**
     * 禁用/启用
     *
     * @time 2020年06月29日
     * @param $id
     * @param string $field
     * @return mixed
     */
    public function disOrEnable($id, string $field='status')
    {
        $model = $this->findBy($id);

        $status = $model->{$field} == self::DISABLE ? self::ENABLE : self::DISABLE;

        $model->{$field} = $status;

        return $model->save();
    }

    /**
     * 过滤数据
     *
     * @time 2021年02月28日
     * @param array $data
     * @return mixed
     */
    protected function filterData(array $data)
    {
        $pk = $this->getPk();
        foreach ($data as $field => $value) {
            if (is_null($value)) {
                unset($data[$field]);
            }

            if ($field == $pk ||$field== Str::camel($pk) ) {
                unset($data[$field]);
            }

            if (in_array($field, [$this->createTime, $this->updateTime, $this->deleteTime,Str::camel($this->createTime), Str::camel($this->updateTime), Str::camel($this->deleteTime)])) {
                unset($data[$field]);
            }
        }

        return $data;
    }


}
