<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\SlideRequest;
use App\Slideshow;
use App\SlideImages;
use Request,File;
use Input;




class SlideshowController extends Controller
{

    public function getList(){
        $data = Slideshow::all();
        return view('admin.slide.list',compact('data'));
    }
    public function getAdd(){
        return view('admin.slide.add');
    }
    public function postAdd(SlideRequest $request){
        $file_name = $request ->file('fImages')->getClientOriginalName();

        $slide = new Slideshow();
        $slide->name = $request ->txtName;
        $slide->alias = changeTitle($request ->txtName);
        $slide->image = $file_name;
        $request ->file('fImages')->move('upload/images/slide/',$file_name);
        $slide->save();

        // $slide_id = $slide->id;
        // if(Input::hasFile('fProductDetail')){
        //     foreach(Input::file('fProductDetail') as $file){
        //         $slide_img = new SlideImages();
        //         if(isset($file)){
        //             // Luu vao database
        //             $slide_img->image = $file->getClientOriginalName();
        //             $slide_img->slide_id = $slide_id;
        //             // Upload vao muc upload
        //             $file->move('upload/images/detail/slide/',$file->getClientOriginalName());
        //             $slide_img->save();
        //
        //         }
        //     }
        // }
        return redirect()->route('admin.slide.list')->with(['flash_level' => 'success','flash_message'=>'Thêm thành công!!']);
    }
    public function getEdit($id){

        $slide = Slideshow::find($id)->toArray();
        return view('admin.slide.edit',compact('slide'));
    }
    public function postEdit($id,Request $request){

        $slide = Slideshow::find($id);
        $slide->name = Request::input('txtName');
        $slide->alias = changeTitle(Request::input('txtName'));
        $img_current = 'upload/images/slide/'.Request::input('img_current');
        if(!empty(Request::file('fImages'))){
            // Lấy ra tên ảnh.
            $file_name = Request::file('fImages')->getClientOriginalName();
            // Gắn tên ảnh vào CSDL.
            $slide->image = $file_name;
            // Di chuyển vào file upload.
            Request::file('fImages')->move('upload/images/slide/',$file_name);
            //Kiểm tra nếu gẵn sẵn thì xóa đi.
            if(File::exists($img_current)){
                File::delete($img_current);
            }
        }else{
            echo "Không Có File";
        }
        // End img
        $slide->save();
        return redirect()->route('admin.slide.list')->with(['flash_level' => 'success','flash_message'=>'Sửa thành công!!']);
    }
    public function getDelete($id){

        // Xóa ảnh trong thư mục upload
        $slide = Slideshow::find($id);
        File::delete('upload/images/slide/'.$slide->image);
        // 2.Xoa csdl product
        $slide->delete($id);
        return redirect()->route('admin.slide.list')->with(['flash_level' => 'success','flash_message'=>'Xóa thành công!!']);
    }
}
