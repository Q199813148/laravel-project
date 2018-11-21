<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    //模型类对应数据表
    protected $table = "orders";
    //可以被批量赋值的属性字段
    Protected $fillable = ['orderno','user_id','address','status','time','goods_money','name','phone','remarks','refund','endtime','company'];

    //修改器方法 status 数据表字段getAttribute() 获取字段值
    public function getStatusAttribute($value){
    	//自动处理
    	$status=[0=>'未支付',1=>'已支付',2=>'已发货',3=>'已收货',4=>'已评价'];
    	//返回数据
    	return $status[$value];
    }

    //修改器方法 refund 数据表字段 getAttribute() 获取字段值
    public function getRefundAttribute($value){
    	//自动处理
    	$refund=[0=>'未申请',1=>'申请退款',2=>'退款中',3=>'完成退款'];
    	//返回数据
    	return $refund[$value];
    }
}
