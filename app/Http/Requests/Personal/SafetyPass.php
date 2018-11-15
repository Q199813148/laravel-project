<?php

namespace App\Http\Requests\Personal;

use Illuminate\Foundation\Http\FormRequest;

class SafetyPass extends FormRequest
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
            'plpassword'=>'required',
            'password'=>'required|regex:/\w{6,18}/',
            'repassword'=>'required|same:password',
        ];
    }
//	自定义错误信息
    public function messages(){
    	return [

            'plpassword.required'=>'　　　　　　*原始密码不能为空',
            
            'password.required'=>'　　　　　　*密码不能为空',
            'password.regex'=>'　　　　　　*密码格式为6-18位数字字母下划线组成',
            
            'repassword.required'=>'　　　　　　*重复密码不能为空',
            'repassword.same'=>'　　　　　　*两次密码不一致',

    	];
    }
}
