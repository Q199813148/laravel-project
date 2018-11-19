<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdminRole extends Model
{
    //模型类对应数据表
    protected $table="role";
    //可以被批量赋值的属性字段
    protected $fillable=['name','status'];
    //修改器方法  getAttribute() 获取字段值
    public function getStatusAttribute($value){
    	//自动处理 status 数据表字段
                            
    	$status=[0=>'禁用',1=>'启用'];
    	//返回数据
    	return $status[$value];
    }
	
}
