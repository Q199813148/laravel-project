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
            'phone'=>'required|regex:/^\w{11}$/|unique:users',
            'phcode'=>'required',
        ];
    }
//	自定义错误信息
    public function messages(){
    	return [

	    	'phone.required'=>'*手机不能为空',
	        'phone.regex'=>'*手机格式不正确',
	        'phone.unique'=>'*该手机号已注册',
	        
	    	'phcode.required'=>'*验证码不能为空',
    	];
    }
}
