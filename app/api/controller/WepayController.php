<?php
namespace app\api\controller;
use app\BaseController;

use app\diy\model\OrderModel;
use app\diy\model\UserModel;
use EasyWeChat\Pay\Application;
use think\App;


/*
 * 支付
 */
class WepayController extends BaseController
{
    //判断是否全部不需要登录
    public $notNeedLoginAll = false;
    public $isModel = false;
    //判断不需要登录的方法
    public $notNeedLogin = ['notify','test'];

    public $wepayApp;

    /**
     * 构造方法
     * @access public
     * @param  App  $app  应用对象
     */
    public function __construct(App $app)
    {
        parent::__construct($app);
        $paymentConfig = config('wechat.payment');
        $this->wepayApp =  new Application($paymentConfig);
    }

    /**
     * 用户下单
     * @return \think\response\Json
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidArgumentException
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \think\exception\DbException
     */
    public function order(){
        $userModel = UserModel::where(['id'=>$this->request->userId])->find();
        if(!$userModel){
            return $this->error('请先登录'.$this->request->userId);
        }
        $user = $userModel->toArray();
        if(empty($user['openid'])){
            return $this->error('请先登录');
        }
        // 生成订单信息
        $data = $this->request->param();
        $data['orderNo'] = getOrderNo();
        $data['status'] = 0;
        $data['payStatus'] = 0;
        $data['openid'] = $user['openid'];
        $data['userId'] = $this->request->userId;
        $model = new OrderModel();
        $data = $model->add($data);
        $notify_url = url('api/wepay/notify')
            ->suffix('html')
            ->domain($this->request->domain())->build();
        //调起微信支付
        $payData = [
            'body' => $data['body'],
            'out_trade_no' =>$data['orderNo'] ,
            'total_fee' =>(float)($data['total']*100),
            'notify_url' => $notify_url, // 支付结果通知网址，如果不设置则会使用配置里的默认地址
            'trade_type' => 'JSAPI', // 请对应换成你的支付方式对应的值类型
            'openid' => $data['openid'],
        ];
        $result = $this->wepayApp->order->unify($payData);
        if ($result['return_code'] === 'SUCCESS') {
            $jssdk = $this->wepayApp->jssdk;
            $config = $jssdk->bridgeConfig($result['prepay_id'],false); // 返回数组
            return $this->successData($config);
        }else{
            return $this->errorData($result);
        }
    }


    /**
     * 支付回调
     * @return mixed
     */
    public function notify(){
        $response = $this->wepayApp->handlePaidNotify(function ($message,$error){
            $order = OrderModel::where(['order_no'=>$message['out_trade_no']])->find();
            if (!$order || $order['status'] == '1') return true;
            if ($message['return_code'] === 'SUCCESS') {
                if ($message['result_code'] === 'SUCCESS') {
                    $order['status'] = '1';
                } elseif ($message['result_code'] === 'FAIL') {
                    $order['status'] = '2';
                }
            } else {
                return $error('通信失败，请稍后再通知我');
            }
            if ($order->save()){
                return true;
            }
            return false;
        });
        $send = $response->send();
        return $send;
    }

}
