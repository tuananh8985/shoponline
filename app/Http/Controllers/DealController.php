<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\DealRequest;
use App\Deal;
use Request,File,Input;



class DealController extends Controller
{

    public function getList(){
        $data = Deal::all();
        return view('admin.deal.list',compact('data'));
    }
    public function getAdd(){
        return view('admin.deal.add');
    }
    public function postAdd(DealRequest $request){
        if(Input::hasFile('fImages')){
            $file_name = $request ->file('fImages')->getClientOriginalName();
        }
        $deal = new Deal();
        $deal->name = $request->txtName;
        $deal->alias = changeTitle($request ->txtName);
        $deal->description = $request->txtdescription;
        $deal->content = $request->txtContent;
        if(Input::hasFile('fImages')){
            $deal->image = $file_name;
            $request ->file('fImages')->move('upload/images/deal/',$file_name);
        }
        $deal->save();
        return redirect()->route('admin.deal.list')->with(['flash_level' => 'success','flash_message'=>'Thêm thành công!!']);
    }
    public function getEdit($id){

        $deal = Deal::find($id)->toArray();
        return view('admin.deal.edit',compact('deal'));
    }
    public function postEdit($id,Request $request){

        $deal = Deal::find($id);
        $deal->name = Request::input('txtName');
        $deal->alias = changeTitle(Request::input('txtName'));
        $deal->description = Request::input('txtdescription');
        $deal->content = Request::input('txtContent');
        $img_current = 'upload/images/deal/'.Request::input('img_current');
        if(!empty(Request::file('fImages'))){
            // Lấy ra tên ảnh.
            $file_name = Request::file('fImages')->getClientOriginalName();
            // Gắn tên ảnh vào CSDL.
            $deal->image = $file_name;
            // Di chuyển vào file upload.
            Request::file('fImages')->move('upload/images/deal/',$file_name);
            //Kiểm tra nếu gẵn sẵn thì xóa đi.
            if(File::exists($img_current)){
                File::delete($img_current);
            }
        }else{
            echo "Không Có File";
        }
        // End img
        $deal->save();
        return redirect()->route('admin.deal.list')->with(['flash_level' => 'success','flash_message'=>'Sửa thành công!!']);
    }
    public function getDelete($id){

        // Xóa ảnh trong thư mục upload
        $deal = Deal::find($id);
        File::delete('upload/images/deal/'.$deal->image);
        // 2.Xoa csdl product
        $deal->delete($id);
        return redirect()->route('deal.post.list')->with(['flash_level' => 'success','flash_message'=>'Xóa thành công!!']);
    }
}
