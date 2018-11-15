<?php

namespace App\Http\Requests\Home;

use Illuminate\Foundation\Http\FormRequest;

class HomePersonaleditinsert extends FormRequest
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
            'name'=>'required',
            'phone'=>'required|regex:/^\d{11}$/',
            'city'=>'required',
            'detailed'=>'required',
        ];
    }
}
