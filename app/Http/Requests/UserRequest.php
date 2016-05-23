<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UserRequest extends Request
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
            'txtUser' =>'required|unique:users,username',
            'txtPass' =>'required',
            'txtRePass' =>'required|same:txtPass',
            'txtEmail' =>'required|email',
        ];
    }
    public function messages()
    {
        return [
            'txtUser.required' =>'Xin hãy nhập tên',
            'txtUser.unique' =>'Tên này đã tồn tại',
            'txtPass.required' =>'Xin hãy nhập mật khẩu',
            'txtRePass.required' =>'Nhập lại mật khẩu',
            'txtRePass.same' =>'Hai mật khẩu không giống nhau',
            'txtEmail.required'=>'Xin hãy nhập mail',
            'txtEmail.email'=>'Định dạng mail không đúng',
        ];
    }
}
