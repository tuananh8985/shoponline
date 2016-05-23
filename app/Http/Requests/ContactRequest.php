<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ContactRequest extends Request
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
            'txtName'=>'required',
            'txtHotline1'=>'required',
            'txtHotline1' =>'required',
            'txtEmail' =>'required|email',

        ];
    }
    public function messages()
    {
        return [
            'txtName.required'=>'Xin hãy nhập tên',
            'txtHotline1.required'=>'Xin hãy nhập số điện thoại',
            'txtHotline1.required' =>'Xin hãy nhập số điện thoại',
            'txtEmail.required' =>'Xin hãy nhập email',
            'txtEmail.email' =>'Email không đúng định dạng',
        ];
    }
}
