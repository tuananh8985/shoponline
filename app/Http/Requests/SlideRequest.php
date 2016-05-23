<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class SlideRequest extends Request
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
             'fImages'  => 'required|image'
         ];
     }

     public function messages()
     {
         return [
             'fImages.required'  => 'Xin hãy chọn hình ảnh',
             'fImages.image'  => 'File không đúng định dạng ảnh',
         ];
     }
}
