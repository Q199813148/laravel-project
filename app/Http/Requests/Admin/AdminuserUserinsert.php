<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class AdminuserUserinsert extends FormRequest
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
            'name'=>'required|regex:/\w{5,10}/|unique:admin',
            'password'=>'required|regex:/\w{6,18}/',
            'repassword'=>'required|same:password',
            // email邮箱格式规则
            'email'=>'required|regex:/\w+@\w+\.\w+/|email|unique:admin',
            'phone'=>'required|regex:/^\d{11}$/|unique:admin',
        ];
    }
//	自定义错误信息
    public function messages(){
    	return [
	    	'name.required'=>'　　*用户名不能为空',
	        'name.regex'=>'　　*用户名必须为5-10位任意的数字字母下划线',
            'name.unique'=>'　　*用户名重复',
            'password.required'=>'　　*密码不能为空',
            'password.regex'=>'　　*密码必须为6-18位任意的数字字母下划线',
            'repassword.required'=>'　　*重复密码不能为空',
            'repassword.same'=>'　　*两次密码不一致',
            'email.required'=>'　　*邮箱不能为空',
	        'email.regex'=>'　　*邮箱不符合格式',
            'email.email'=>'　　*邮箱不符合格式',
            'email.unique'=>'　　*邮箱重复',
            'phone.required'=>'　　*电话不能为空',
            'phone.regex'=>'　　*电话不符合格式',
            'phone.unique'=>'　　*电话重复',
    	];
    }
}
