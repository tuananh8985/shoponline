<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class NewRequest extends Request
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
             'sltParent' => 'required',
             'txtName'  => 'required|unique:news,name',
         ];
     }

     public function messages()
     {
         return [
             'sltParent.required' => 'Xin hãy chọn danh mục',
             'txtName.required'  => 'Xin hãy nhập tên',
             'txtName.unique'    => 'Tên này đã tồn tại'
         ];
     }
}
