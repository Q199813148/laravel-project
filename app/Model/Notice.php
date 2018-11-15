<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Notice extends Model
{
    //模型类对应数据表
    protected $table="notice";
    //可以被批量赋值的属性字段
    protected $fillable=['title','addtime','content','status'];

    //修改器方法 status 数据表字段 getAttribute() 获取字段值
    public function getStatusAttribute($value){
    	//自动处理
    	$status=[0=>'禁用',1=>'启用'];
    	//返回数据
    	return $status[$value];
    }

}
