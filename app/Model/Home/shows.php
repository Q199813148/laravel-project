<?php

namespace App\Model\Home;

use Illuminate\Database\Eloquent\Model;

class shows extends Model
{
    //选择数据表
    protected $table = 'shows';
    //该模型是否被自动维护时间戳
    public $timestamps = false;
    //可以被批量赋值的属性。
    protected $fillable = ['name','pic','url','status'];


}
