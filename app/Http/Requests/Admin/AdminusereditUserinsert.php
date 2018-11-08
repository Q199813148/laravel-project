<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class AdminusereditUserinsert extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
            //required 数据不能为空规则  regex 正则规则  unique唯一规则 users 操作的数据表  same一致规则
        return [
            'name'=>'required|regex:/\w{5,10}/',
            'email'=>'required|regex:/\w+@\w+\.\w+/',
            'phone'=>'required|regex:/\d{11}/',
        ];
    }
//	自定义错误信息
    public function messages(){
    	return [
	    	'name.required'=>'　　*用户名不能为空',
	        'name.regex'=>'　　*用户名必须为5-10位任意的数字字母下划线',

            'email.required'=>'　　*邮箱不能为空',
	        'email.regex'=>'　　*邮箱不符合格式',

            'phone.required'=>'　　*电话不能为空',
            'phone.regex'=>'　　*电话不符合格式',

    	];
    }
}
