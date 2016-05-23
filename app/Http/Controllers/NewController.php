<?php

namespace App\Http\Controllers;
//Dung AJax len use sau ko dc su dung,su dung use Request;
//use Illuminate\Http\Request;
use Request;
use Auth;
use App\Http\Requests;
use App\Http\Requests\NewRequest;
use App\Catalogue;
use Input,File;
use App\News;
use App\NewImages;
use App\Http\Controllers\Controller;

class NewController extends Controller
{
    public function getList(){

        $data = News::all();
        return view('admin.new.list',compact('data'));
    }
    public function getAdd(){
        $cate = Catalogue::all();
        return view('admin.new.add',compact('cate'));
    }
    public function postAdd(NewRequest $request){
        // Lay ve ten cua anh vd abc.jpg
        if(Input::hasFile('fImages')){
        $file_name = $request ->file('fImages')->getClientOriginalName();
    }
        // Ghi data vao CSDL.
        $new = new News();
        $new->name = $request ->txtName;
        $new->alias = changeTitle($request ->txtName);

        if(Input::hasFile('fImages')){
            $new->image = $file_name;
    }
        $new->content = $request ->txtcontent;
        $new->description = $request ->txtdescription;


        $new->user_id = Auth::user()->id;
        $new->cate_id = $request ->sltParent;
        // Xu ly image Product
        if(Input::hasFile('fImages')){
            $request ->file('fImages')->move('upload/images/new/',$file_name);
    }
        $new->save();

        // Thao tac voi anh.
        // Xu ly voi anh Image Product Detail.
        $new_id = $new->id;
        if(Input::hasFile('fProductDetail')){
            foreach(Input::file('fProductDetail') as $file){
                $new_img = new NewImages();
                if(isset($file)){
                    // Luu vao database
                    $new_img->image = $file->getClientOriginalName();
                    $new_img->news_id = $new_id;
                    // Upload vao muc upload
                    $file->move('upload/images/detail/new/',$file->getClientOriginalName());
                    $new_img->save();

                }
            }
        }
        return redirect()->route('admin.new.list')->with(['flash_level' => 'success','flash_message'=>'Thêm thành công!!']);
    }


    public function getDelete($id){
        // 1.Xoa image
        $new_detail = News::find($id)->nimages->toArray();
        // Xóa ảnh detail trong thư mục upload
        foreach($new_detail as $value){
            // Ham File delete trong laravel đc dùng để xóa anh detil trong  thư mục
            File::delete('upload/images/detail/new/'.$value["image"]);
        }
        // Xóa ảnh trong thư mục upload
        $new = News::find($id);
        File::delete('upload/images/new/'.$new->image);
        // 2.Xoa csdl product
        $new->delete($id);
        return redirect()->route('admin.new.list')->with(['flash_level' => 'success','flash_message'=>'Xóa thành công!!']);
    }

    public function getEdit($id){

        $cate = Catalogue::all();
        $new = News::find($id)->toArray();
        $new_image = News::find($id)->nimages;
        return view('admin.new.edit',compact('cate','new','new_image'));
    }
    public function postEdit($id,Request $request){
        $new = News::find($id);

        $new->name = Request::input('txtName');
        $new->alias = changeTitle(Request::input('txtName'));

        $new->description = Request::input('txtdescription');
        $new->content = Request::input('txtcontent');
        $new->user_id = Auth::user()->id;
        $new->cate_id = Request::input('sltParent');
        //Image Product.
        // Đây la duong dan.
        $img_current = 'upload/images/new/'.Request::input('img_current');
        if(!empty(Request::file('fImages'))){
            // Lấy ra tên ảnh.
            $file_name = Request::file('fImages')->getClientOriginalName();


            // Gắn tên ảnh vào CSDL.
            $new->image = $file_name;
            // Di chuyển vào file upload.
            Request::file('fImages')->move('upload/images/new/',$file_name);
            //Kiểm tra nếu gẵn sẵn thì xóa đi.
            if(File::exists($img_current)){
                File::delete($img_current);
            }
        }else{
            echo "Không Có File";
        }
        // End img
        $new->save();
        // Image detail.
        // Kiem tra xem co chon file ko.
        if(!empty(Request::file('fEditDetail'))){
            // Duyet mang lay ra ten tung anh
            foreach(Request::file('fEditDetail') as $file){
            $new_img = new NewImages();
                if(isset($file)){
                $new_img ->image =$file->getClientOriginalName();
                $new_img->news_id = $id;
                    $file->move('upload/images/detail/new/',$file->getClientOriginalName());
                $new_img->save();
                }
            }
        }
        return redirect()->route('admin.new.list')->with(['flash_level' => 'success','flash_message'=>'Sửa thành công!!']);
    }
    // Function delete Ajax.
    public function getDelImg($id){
        // Kiểm tra nếu yêu cầu là Ajax
        if(Request::ajax()){
            $idHinh = (int)Request::get('idHinh');
            $image_detail = NewImages::find($idHinh);
            if(!empty($image_detail)){
                $img = 'upload/images/detail/new/'.$image_detail->image;
                if(File::exists($img)){
                    File::delete($img);
                }
                $image_detail->delete();
            }
            return "Ok";
        }
    }

}
