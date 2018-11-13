<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Shops extends Model
{
    //
//    与模型关联的数据表
    protected $table = 'goods';
//    该模型是否被自动维护时间戳
    public $timestamps = false;
//    可以被批量赋值的属性。
    protected $fillable = ['status'];

    public function getStatusAttribute($value){
        $status=[0=>"上架",1=>"下架"];
        return $status[$value];
    }
}
