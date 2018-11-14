<?php

namespace App\Http\Requests\Home;

use Illuminate\Foundation\Http\FormRequest;

class ForgetPass extends FormRequest
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
            'name'=>'required',
            'code'=>'required',
//          'email'=>'required|regex:/\w+@\w+\.\w+/|unique:users',
        ];
    }
//	自定义错误信息
    public function messages(){
    	return [
	    	'name.required'=>'*用户名不能为空',
	    	'code.required'=>'*验证码不能为空',

    	];
    }
}
