<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Queue\RedisQueue;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class SubmitOrderController extends Controller
{
    //
    public function index(Request $request)
    {
        //获取所有数据
        $data = $request->all();
        $cart_id = $data['cart_id'];
        //查询购物车数据
        $cart = DB::table('cart')
            ->whereIn('id', $cart_id)
            ->where('user_id', $data['user_id'])
            ->get();
        //生成订单号
        $order['orderno'] = date('Ymd') . str_pad(mt_rand(1, 99999), 5, '0', STR_PAD_LEFT);
        //用户id
        $order['user_id'] = session('user')->user_id;
        //判断是否和提交订单的用户id是同一个id
        if ($order['user_id'] != $data['user_id']) {
            exit;
        }
        //查询用户地址
        $address_data = DB::table('address')->where([['id', $data['address']], ['user_id', $order['user_id']]])->first();
        //地址
        $order['address'] = $address_data->address;
        //姓名
        $order['name'] = $address_data->name;
        //电话
        $order['phone'] = $address_data->phone;
        //状态0:未支付
        $order['status'] = 0;
        $order['time'] = date("Y-m-d H:i:s");
        //获取用户留言
        $order['remarks'] = $data['remarks'];

        //计算总价
        $order['goods_money'] = 0;
        foreach ($cart as $value) {
            $num = $value->num;
            $order['goods_money'] += DB::table('goods')->where('id', $value->goods_id)->first()->price * $num;
        }

        //查询商品表库存是否足够
        $arr = array();
        foreach ($cart as $value) {
            $num = DB::table('goods')->where('id', $value->goods_id)->first()->store;
            if ($num < $value->num) {
                return redirect('/cart')->with('error', '商品库存不足');
            }
            //获取购物车id 以便删除
            $arr[] = $value->id;
        }

        //删除购物车数据
        DB::table('cart')->whereIn('id', $arr)->delete();

        //写入数据库 orders表
        $id = DB::table('orders')->insertGetId($order);
        //将商品详情写入 details表
        foreach ($cart as $val) {
            //将商品详情写入 details表
            DB::table('details')->insert(['order_id' => $id, 'good_id' => $val->goods_id, 'num' => $val->num, 'taste' => $val->taste]);
            //计算剩余库存
            $store = DB::table('goods')->where('id', $val->goods_id)->first()->store - $val->num;
            //更新库存
            DB::table('goods')->where('id', $val->goods_id)->update(['store' => $store]);
        }


        //调用支付方法
        $alipay = app('alipay.web');
        $alipay->setOutTradeNo($order['orderno']);
        $alipay->setTotalFee($order['goods_money']);
        $alipay->setSubject('悦桔拉拉商城购物');
        $alipay->setBody('测试');

        $alipay->setQrPayMode('5'); //该设置为可选，添加该参数设置，支持二维码支付。

        // 跳转到支付页面。
        return redirect()->to($alipay->getPayLink());

    }

    public function immediately(Request $request)
    {
        //获取所有数据
        $data = $request->all();
        //生成订单号
        $order['orderno'] = date('Ymd') . str_pad(mt_rand(1, 99999), 5, '0', STR_PAD_LEFT);
        //用户id
        $order['user_id'] = session('user')->user_id;
        //商品id
        $gid = $data['goods_id'];
        //判断是否和提交订单的用户id是同一个id
        if ($order['user_id'] != $data['user_id']) {
            exit;
        }
        //查询用户地址
        $address_data = DB::table('address')->where([['id', $data['address']], ['user_id', $order['user_id']]])->first();
        //地址
        $order['address'] = $address_data->address;
        //姓名
        $order['name'] = $address_data->name;
        //电话
        $order['phone'] = $address_data->phone;
        //状态0:未支付
        $order['status'] = 0;
        $order['time'] = date("Y-m-d H:i:s");
        //获取用户留言
        $order['remarks'] = $data['remarks'];

        //数量
        $num = $request->input('num');
        //计算总价
        $order['goods_money'] = DB::table('goods')->where('id',$gid)->first()->price * $num;

        //查询商品表库存是否足够
        $store = DB::table('goods')->where('id', $gid)->first()->store;

        if($store < $num){
            return redirect("/goodsdetail?id=$gid")->with('error', '商品库存不足');
        }

        //写入数据库 orders表
        $id = DB::table('orders')->insertGetId($order);

        //将商品详情写入 details表
        DB::table('details')->insert(['order_id' => $id, 'good_id' => $gid, 'num' => $num, 'taste' => $data['taste']]);
        //计算剩余库存
        $store = DB::table('goods')->where('id', $gid)->first()->store - $num;
        //更新库存
        DB::table('goods')->where('id', $gid)->update(['store' => $store]);



        //调用支付方法
        $alipay = app('alipay.web');
        $alipay->setOutTradeNo($order['orderno']);
        $alipay->setTotalFee($order['goods_money']);
        $alipay->setSubject('悦桔拉拉商城购物');
        $alipay->setBody('测试');

        $alipay->setQrPayMode('5'); //该设置为可选，添加该参数设置，支持二维码支付。

        // 跳转到支付页面。
        return redirect()->to($alipay->getPayLink());
    }

    // 异步通知支付结果
    public function AliPayNotify(Request $request)
    {
        // 验证请求。
        if (!app('alipay.web')->verify()) {
            Log::notice('Alipay notify post data verification fail.', [
                'data' => $request->instance()->getContent()
            ]);
            return 'fail';
        }
        // 判断通知类型。
        switch ($request->input('trade_status', '')) {
            case 'TRADE_SUCCESS':
            case 'TRADE_FINISHED':
                // TODO: 支付成功，取得订单号进行其它相关操作。
                $orderno = $request->input('out_trade_no');
                $trade_no = $request->input('trade_no');
                DB::table('orders')->where('orderno', $orderno)->update(['status' => '1', 'trade_no' => $trade_no]);
                $data = DB::table('orders')->where('orderno', $orderno)->first();

                Log::debug('Alipay notify post data verification success.', [
                    'out_trade_no' => $request->input('out_trade_no', ''),
                    'trade_no' => $request->input('trade_no', '')
                ]);
                break;
        }
        return 'success';
    }

    // 同步通知支付结果
    public function AliPayReturn(Request $request)
    {
        // 验证请求。
        if (!app('alipay.web')->verify()) {
            Log::notice('支付宝返回查询数据验证失败。', [
                'data' => $request->getQueryString()
            ]);
            return view('Home.Order.error');
        }
        // 判断通知类型。
        switch ($request->input('trade_status', '')) {
            case 'TRADE_SUCCESS':
            case 'TRADE_FINISHED':
                // TODO: 支付成功，取得订单号进行其它相关操作。
                $orderno = $request->input('out_trade_no');
                $trade_no = $request->input('trade_no');
                DB::table('orders')->where('orderno', $orderno)->update(['status' => '1', 'trade_no' => $trade_no]);
                $data = DB::table('orders')->where('orderno', $orderno)->first();

                Log::debug('支付宝通知获得数据验证成功。', [
                    'out_trade_no' => $request->input('out_trade_no', ''),
                    'trade_no' => $request->input('trade_no', '')
                ]);
                break;
        }


        return view("Home.Order.success", ['data' => $data]);
    }

}
