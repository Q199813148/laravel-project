<?php

namespace App\Http\Requests\Home;

use Illuminate\Foundation\Http\FormRequest;

class HomeRegist extends FormRequest
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
        return [
            //
            //required 数据不能为空规则  regex 正则规则  unique唯一规则 users 操作的数据表  same一致规则
            'name'=>'required|regex:/\w{5,10}/|unique:users',
            'phone'=>'required|regex:/^\d{11}$/|unique:users',
//          'email'=>'required|regex:/\w+@\w+\.\w+/|unique:users',
            'password'=>'required|regex:/\w{6,18}/',
            'repassword'=>'required|same:password',
        ];
    }
//	自定义错误信息
    public function messages(){
    	return [
	    	'name.required'=>'*用户名不能为空',
	        'name.regex'=>'*用户名为5-10位数字字母下划线组成',
	        'name.unique'=>'*该用户名已存在',
			
	    	'phone.required'=>'*手机不能为空',
	        'phone.regex'=>'*手机格式不正确',
	        'phone.unique'=>'*该手机号已注册',

//          'email.required'=>'*邮箱不能为空',
//	        'email.regex'=>'*邮箱不符合格式',
//	        'email.unique'=>'*该邮箱已注册',

            'password.required'=>'*密码不能为空',
            'password.regex'=>'*密码格式为6-18位数字字母下划线组成',
            
            'repassword.required'=>'*重复密码不能为空',
            'repassword.same'=>'*两次密码不一致',

    	];
    }
}
