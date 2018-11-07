<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    //模型类对应数据表
    protected $table="users";
    //可以被批量赋值的属性字段
    protected $fillable=['name','password','emali','status','token','addtime'];

    //修改器方法 status 数据表字段 getAttribute() 获取字段值
    public function getStatusAttribute($value){
    	//自动处理
    	$status=[0=>'未激活',1=>'启用',2=>'禁用'];
    	//返回数据
    	return $status[$value];
    }
}
