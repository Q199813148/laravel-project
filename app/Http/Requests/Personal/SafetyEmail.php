<?php

namespace App\Http\Requests\Personal;

use Illuminate\Foundation\Http\FormRequest;

class SafetyEmail extends FormRequest
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
            'email'=>'required|regex:/\w+@\w+\.\w+/|unique:users',
            'emcode'=>'required',
        ];
    }
//	自定义错误信息
    public function messages(){
    	return [

            'email.required'=>'*邮箱不能为空',
	        'email.regex'=>'*邮箱不符合格式',
	        'email.unique'=>'*该邮箱已注册',
	        
	    	'emcode.required'=>'*验证码不能为空',
    	];
    }
}
