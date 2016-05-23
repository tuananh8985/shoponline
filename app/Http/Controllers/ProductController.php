<?php

namespace App\Http\Controllers;
//Dung AJax len use sau ko dc su dung,su dung use Request;
//use Illuminate\Http\Request;
use Request;
use Auth;
use App\Http\Requests;
use App\Http\Requests\ProductRequest;
use App\Cate;
use Input,File;
use App\Product;
use App\ProductImages;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function getList(){

        $data = Product::all();
        return view('admin.product.list',compact('data'));
    }
    public function getAdd(){
        $cate = Cate::all();
        return view('admin.product.add',compact('cate'));
    }
    public function postAdd(ProductRequest $request){
        // Lay ve ten cua anh vd abc.jpg
        $file_name = $request ->file('fImages')->getClientOriginalName();
        // Ghi data vao CSDL.
        $product = new Product();
        $product->name = $request ->txtName;
        $product->alias = changeTitle($request ->txtName);
        $product->price = $request ->txtPrice;
        $product->color= $request ->txtColor;

        $product->image = $file_name;

        $product->warranty = $request ->txtwarranty;
        $product->offer = $request ->txtoffer;
        $product->parameter = $request ->txtparameter;
        $product->description = $request ->txtdescription;


        $product->user_id = Auth::user()->id;
        $product->cate_id = $request ->sltParent;
        // Xu ly image Product
        $request ->file('fImages')->move('upload/images/product/',$file_name);
        $product->save();

        // Thao tac voi anh.
        // Xu ly voi anh Image Product Detail.
        $product_id = $product->id;
        if(Input::hasFile('fProductDetail')){
            foreach(Input::file('fProductDetail') as $file){
                $product_img = new ProductImages();
                if(isset($file)){
                    // Luu vao database
                    $product_img->image = $file->getClientOriginalName();
                    $product_img->product_id = $product_id;
                    // Upload vao muc upload
                    $file->move('upload/images/detail/product/',$file->getClientOriginalName());
                    $product_img->save();

                }
            }
        }
        return redirect()->route('admin.product.list')->with(['flash_level' => 'success','flash_message'=>'Thêm thành công!!']);
    }


    public function getDelete($id){
        // 1.Xoa image
        $product_detail = Product::find($id)->pimages->toArray();
        // Xóa ảnh detail trong thư mục upload
        foreach($product_detail as $value){
            // Ham File delete trong laravel đc dùng để xóa anh detil trong  thư mục
            File::delete('upload/images/detail/product/'.$value["image"]);
        }
        // Xóa ảnh trong thư mục upload
        $product = Product::find($id);
        File::delete('upload/images/product/'.$product->image);
        // 2.Xoa csdl product
        $product->delete($id);
        return redirect()->route('admin.product.list')->with(['flash_level' => 'success','flash_message'=>'Xóa thành công!!']);
    }

    public function getEdit($id){

        $cate = Cate::all();
        $product = Product::find($id)->toArray();
        $product_image = Product::find($id)->pimages;
        return view('admin.product.edit',compact('cate','product','product_image'));
    }
    public function postEdit($id,Request $request){
        $product = Product::find($id);

        $product->name = Request::input('txtName');
        $product->alias = changeTitle(Request::input('txtName'));
        $product->price = Request::input('txtPrice');
        $product->color= Request::input('txtColor');
        $product->warranty = Request::input('txtwarranty');
        $product->offer = Request::input('txtoffer');
        $product->parameter = Request::input('txtparameter');
        $product->description = Request::input('txtdescription');
        $product->user_id = Auth::user()->id;
        $product->cate_id = Request::input('sltParent');
        //Image Product.
        // Đây la duong dan.
        $img_current = 'upload/images/product/'.Request::input('img_current');
        if(!empty(Request::file('fImages'))){
            // Lấy ra tên ảnh.
            $file_name = Request::file('fImages')->getClientOriginalName();
            // Gắn tên ảnh vào CSDL.
            $product->image = $file_name;
            // Di chuyển vào file upload.
            Request::file('fImages')->move('upload/images/product/',$file_name);
            //Kiểm tra nếu gẵn sẵn thì xóa đi.
            if(File::exists($img_current)){
                File::delete($img_current);
            }
        }else{
            echo "Không Có File";
        }
        // End img
        $product->save();
        // Image detail.
        // Kiem tra xem co chon file ko.
        if(!empty(Request::file('fEditDetail'))){
            // Duyet mang lay ra ten tung anh
            foreach(Request::file('fEditDetail') as $file){
                $product_img = new ProductImages();
                if(isset($file)){
                    $product_img ->image =$file->getClientOriginalName();
                    $product_img->product_id = $id;
                    $file->move('upload/images/detail/product/',$file->getClientOriginalName());
                    $product_img->save();
                }
            }
        }
        return redirect()->route('admin.product.list')->with(['flash_level' => 'success','flash_message'=>'Sửa thành công']);
    }
    // Function delete Ajax.
    public function getDelImg($id){
        // Kiểm tra nếu yêu cầu là Ajax
        if(Request::ajax()){
            $idHinh = (int)Request::get('idHinh');
            $image_detail = ProductImages::find($idHinh);
            if(!empty($image_detail)){
                $img = 'upload/images/detail/product/'.$image_detail->image;
                if(File::exists($img)){
                    File::delete($img);
                }
                $image_detail->delete();
            }
            return "Ok";
        }
    }


}
