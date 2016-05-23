<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class LoginRequest extends Request
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
            'username'=>'required',
            'password'=>'required'
        ];
    }

    public function messages()
    {
        return [
            'username.required'=>'Xin hãy nhập tên',
            'password.required'=>'Xin hãy nhập mật khẩu'
        ];
    }
}
