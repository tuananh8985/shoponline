<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ProductRequest extends Request
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
            'txtName'  => 'required|unique:products,name',
            'fImages'  => 'required|image'
        ];
    }

    public function messages()
    {
        return [
            'sltParent.required' => 'Xin hãy chọn danh mục',
            'txtName.required'  => 'Xin hãy nhập tên',
            'txtName.unique'    => 'Tên này đã tồn tại',
            'fImages.required'  => 'Xin hãy chọn hình ảnh',
            'fImages.image'  => 'File không đúng định dạng ảnh',
        ];
    }
}
