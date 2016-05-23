<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CommentRequest extends Request
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
             'txtname'=>'required',
             'txtmobile'=>'required|numeric',
             'txtemail' =>'required|email',
             'txtmessage' =>'required',

         ];
     }
     public function messages()
     {
         return [
             'txtname.required'=>'Xin hãy nhập tên',
             'txtmobile.required'=>'Xin hãy nhập số điện thoại',
             'txtmobile.numeric' =>'Chỉ nhập ký tự số',
             'txtemail.required' =>'Xin hãy nhập địa chỉ email',
             'txtemail.email' =>'Không đúng định dạng email',
             'txtmessage.required' =>'EXin hãy nhập nội dung tin nhắn'
         ];
     }
}
