<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Shows extends Model
{
    //数据表名称
    protected $table = 'shows';
    //该模型是否被自动维护时间戳
    public $timestamps = false;
    //可以被批量赋值的属性
    protected $fillable = ['name','pic','url','status'];

    /**
     * status获取
     * @param $value
     * @return mixed
     */
    public function getStatusAttribute($value)
    {
        $status =  ['0'=>'隐藏','1'=>'展示'];
        return $status[$value];
    }
}
