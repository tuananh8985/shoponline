<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class DealRequest extends Request
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
             'txtName'  => 'required|unique:deals,name',
         ];
     }

     public function messages()
     {
         return [
             'txtName.required'  => 'Xin hãy nhập tên',
             'txtName.unique'    => 'Tên này đã tồn tại',
         ];
     }
}
