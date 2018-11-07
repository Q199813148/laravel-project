<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class User_info extends Model
{
    	//模型类对应数据表
    protected $table="user_info";
    //可以被批量赋值的属性字段
    protected $fillable=['u_name','age','summary','birthday','sex','pic','phone'];

    //修改器方法 sex 数据表字段 getAttribute() 获取字段值
    public function getSexAttribute($value){
        //自动处理
        $sex=[0=>'女',1=>'男',2=>'保密'];
        //返回数据
        return $sex[$value];
    }
}
