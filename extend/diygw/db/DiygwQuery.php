<?php
declare(strict_types=1);

namespace diygw\db;

use diygw\model\DiygwModel;
use think\db\Query;
use think\helper\Str;
use think\Paginator;

class DiygwQuery extends Query
{

  /**
   *
   * @time 2022年03月18日
   * @param mixed $model
   * @param string $joinField
   * @param string $currentJoinField
   * @param array $field
   * @param string $type
   * @param array $bind
   * @return DiygwQuery
   */
    public function diygwJoin($model, string $joinField, string $currentJoinField, array $field = [], string $type = 'INNER', array $bind = []): DiygwQuery
    {
        $tableAlias = null;

        if (is_string($model)) {
            $table = app($model)->getTable();
        } else {
            list($model, $tableAlias) = $model;
            $table = app($model)->getTable();
        }

        // 合并字段
        $this->options['field'] = array_merge($this->options['field'] ?? [], array_map(function ($value) use ($table, $tableAlias) {
          return ($tableAlias ? : $table) . '.' . $value;
        }, $field));

        return $this->join($tableAlias ? sprintf('%s %s', $table, $tableAlias) : $table

            , sprintf('%s.%s=%s.%s', $tableAlias ? $tableAlias : $table, $joinField, $this->getAlias(), $currentJoinField), $type, $bind);
    }

  /**
   *
   * @time 2022年03月18日
   * @param mixed $model
   * @param string $joinField
   * @param string $currentJoinField
   * @param array $field
   * @param array $bind
   * @return DiygwQuery
   */
    public function diygwLeftJoin($model, string $joinField, string $currentJoinField, array $field = [], array $bind = []): DiygwQuery
    {
        return $this->diygwJoin($model, $joinField,  $currentJoinField,  $field,'LEFT', $bind);
    }

  /**
   *
   * @time 2022年03月18日
   * @param mixed $model
   * @param string $joinField
   * @param string $currentJoinField
   * @param array $field
   * @param array $bind
   * @return DiygwQuery
   */
    public function diygwRightJoin($model, string $joinField, string $currentJoinField, array $field = [], array $bind = []): DiygwQuery
    {
        return $this->diygwJoin($model, $joinField,  $currentJoinField, $field,'RIGHT', $bind);
    }

  /**
   * rewrite
   *
   * @time 2022年03月18日
   * @param array|string $field
   * @param bool $needAlias
   * @return $this|Query
   */
    public function withoutField($field, bool $needAlias = false)
    {
      if (empty($field)) {
          return $this;
      }

      if (is_string($field)) {
          $field = array_map('trim', explode(',', $field));
      }

      // 过滤软删除字段
      $field[] = $this->model->getDeleteAtField();

      // 字段排除
      $fields = $this->getTableFields();
      $field  = $fields ? array_diff($fields, $field) : $field;

      if (isset($this->options['field'])) {
          $field = array_merge((array) $this->options['field'], $field);
      }

      $this->options['field'] = array_unique($field);

      if ($needAlias) {
          $alias = $this->getAlias();
          $this->options['field'] = array_map(function ($field) use ($alias) {
          return $alias . '.' . $field;
        }, $this->options['field']);
      }

      return $this;
    }

    /**
     *
     * @time 2022年03月18日
     * @param array $params
     * @return DiygwQuery
     */
    public function diygwSearch(array $params = []): DiygwQuery
    {
        $params = empty($params) ? \request()->param() : $params;

        if (empty($params)) {
            return $this;
        }

        foreach ($params as $field => $value) {
            $method = 'search' . Str::studly($field) . 'Attr';
            // value in [null, '']
            if ($value !== null && $value !== '' && method_exists($this->model, $method)) {
                $this->model->$method($this, $value, $params);
            }
        }

        return $this;
    }

    /**
     * 快速搜索
     *
     * @param array $likeField
     * @return Query
     */
    public function quickSearch(array $likeField = []): Query
    {
        $requestParams = \request()->param();
        if (empty($requestParams)) {
            return $this;
        }
        $fields = $this->getFields();
        $exclueFields = ['pageNum','pageSize','page','limit'];
        foreach ($requestParams as $field => $value) {
            if (in_array($field,$exclueFields)||empty($value)){
                continue;
            }
            if (isset($params[$field])) {

                // ['>', value] || value
                if (in_array($field, array_keys($fields))) {
                    if (is_array($params[$field])) {
                        $this->where(Str::snake($field), $params[$field][0], $params[$field][1]);
                    } else {
                        $this->where(Str::snake($field), $value);
                    }
                }
            } else {

                // 区间范围 数据库字段_start & 数据库字段_end
                $endField = "_start";
                if (Str::endsWith($field,$endField)) {
                    $field = Str::snake(Str::substr($field,0,Str::length($field) - Str::length($endField)));
                    if (in_array($field, array_keys($fields))) {
                        $this->where($field, '>=', strtotime($value));
                    }
                }
                $endField = "_end";
                if (Str::endsWith($field,$endField)) {
                    $field = Str::snake(Str::substr($field,0,Str::length($field) - Str::length($endField)));
                    if (in_array($field, array_keys($fields))) {
                        $this->where($field, '<=', strtotime($value));
                        continue;
                    }
                }

                // 模糊搜索
                $endField = "_like";
                if (Str::endsWith($field,$endField)) {
                    $field = Str::snake(Str::substr($field,0,Str::length($field) - Str::length($endField)));
                    if (in_array($field, array_keys($fields))) {
                        $this->whereLike($field, $value);
                        continue;
                    }
                }
                // 模糊搜索
                $endField = "_leftlike";
                if (Str::endsWith($field,$endField)) {
                    $field = Str::snake(Str::substr($field,0,Str::length($field) - Str::length($endField)));
                    if (in_array($field, array_keys($fields))) {
                        $this->whereLeftLike($field, $value);
                        continue;
                    }
                }

                // 模糊搜索
                $endField = "_rightlike";
                if (Str::endsWith($field,$endField)) {
                    $field = Str::snake(Str::substr($field,0,Str::length($field) - Str::length($endField)));
                    if (in_array($field, array_keys($fields))) {
                        $this->whereRightLike($field, $value);
                        continue;
                    }
                }
                // = 值搜索
                if ($value || is_numeric($value)) {
                    $tablefield = Str::snake($field);
                    if (in_array($tablefield, array_keys($fields))) {
                        if(in_array($field,$likeField)){
                            $this->whereLike($tablefield, $value);
                        }else{
                            $this->where($tablefield, $value);
                        }
                    }
                    if($field=='isself' && $value=='1' && in_array('user_id',array_keys($fields))){
                        $this->where('user_id',\request()->userId);
                    }
                }
            }
        }
        return $this;
    }

  /**
   *
   * @time 2022年03月18日
   * @return mixed
   */
    public function getAlias()
    {
      return isset($this->options['alias']) ? $this->options['alias'][$this->getTable()] : $this->getTable();
    }

  /**
   * rewrite
   *
   * @time 2022年03月18日
   * @param string $field
   * @param mixed $condition
   * @param string $option
   * @param string $logic
   * @return Query
   */
    public function whereLike(string $field, $condition, string $logic = 'AND', string $option = 'both'): Query
    {
        switch ($option) {
          case 'both':
              $condition = '%' . $condition . '%';
              break;
          case 'left':
              $condition = '%' . $condition;
              break;
          default:
              $condition .= '%';
        }

        if (strpos($field, '.') === false) {
            $field = $this->getAlias() . '.' . $field;
        }

        return parent::whereLike($field, $condition, $logic);
    }

    /**
     * @param string $field
     * @param $condition
     * @param string $logic
     * @return Query
     */
    public function whereLeftLike(string $field, $condition, string $logic = 'AND'): Query
    {
        return $this->where($field, $condition, $logic, 'left');
    }

    /**
     * @param string $field
     * @param $condition
     * @param string $logic
     * @return Query
     */
    public function whereRightLike(string $field, $condition, string $logic = 'AND'): Query
    {
        return $this->where($field, $condition, $logic, 'right');
    }

  /**
   * 额外的字段
   *
   * @time 2022年03月18日
   * @param $fields
   * @return DiygwQuery
   */
    public function addFields($fields): DiygwQuery
    {
        if (is_string($fields)) {
            $this->options['field'][] = $fields;

            return $this;
        }

        $this->options['field'] = array_merge($this->options['field'], $fields);

        return $this;
    }

    public function paginate($listRows = null, $simple = false): Paginator
    {
        if (!$listRows) {
           $limit = \request()->param('limit');

           $listRows = $limit ? : DiygwModel::LIMIT;
        }

        return parent::paginate($listRows, $simple); // TODO: Change the autogenerated stub
    }


    /**
     * 默认排序
     *
     * @time 2022年03月17日
     * @param string $order
     * @return $this
     */
    public function diygwOrder(string $order = 'desc'): DiygwQuery
    {
        $fields = $this->getFields();
        if (in_array('sort', array_keys($fields))) {
            $this->order($this->getTable() . '.sort asc');
        }

        if (in_array('weight', array_keys($fields))) {
            $this->order($this->getTable() . '.weight', $order);
        }

        $this->order($this->getTable() . '.' . $this->getPk(), $order);

        return $this;
    }

    /**
     * 获取当前数据表的主键
     * @access public
     * @return string|array
     */
    public function diygwPk()
    {
        return $this->getPk();
    }

    /**
     * 新增 Select 子查询
     *
     * @time 2022年03月17日
     * @param callable $callable
     * @param string $as
     * @return $this
     */
    public function  addSelectSub(callable $callable, string $as): DiygwQuery
    {
        $this->field(sprintf('%s as %s', $callable()->buildSql(), $as));

        return $this;
    }

    /**
     * 字段增加
     *
     * @time 2020年11月04日
     * @param $field
     * @param int $amount
     * @return int
     *@throws \think\db\exception\DbException
     */
    public function increment($field, int $amount = 1): int
    {
        return $this->inc($field, $amount)->update();
    }

    /**
     * 字段减少
     *
     * @time 2020年11月04日
     * @param $field
     * @param int $amount
     * @return int
     *@throws \think\db\exception\DbException
     */
    public function decrement($field, int $amount = 1): int
    {
        return $this->dec($field, $amount)->update();
    }
}
