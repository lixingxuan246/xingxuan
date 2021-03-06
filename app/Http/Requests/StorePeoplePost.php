<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePeoplePost extends FormRequest
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
            'username'=>'required|unique:people|max:12|min:2',
                'age'=>'required|integer|min:1|max:3',
        ];
    }



    public function messages()
    {
        return[
            'username.required'=>'名字不能为空',
'age.required'=>'年龄长度不够',
        ];
}


}