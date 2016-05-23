<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Post;
use Request,File;



class PostController extends Controller
{

    public function getList(){
        $data = Post::all();
        return view('admin.post.list',compact('data'));
    }
    public function getAdd(){
        return view('admin.post.add');
    }
    public function postAdd(PostRequest $request){
        if(Input::hasFile('fImages')){
            $file_name = $request ->file('fImages')->getClientOriginalName();
        }
        $post = new Post();
        $post->name = $request->txtName;
        $post->alias = changeTitle($request ->txtName);
        $post->description = $request->txtdescription;
        $post->content = $request->txtContent;
        if(Input::hasFile('fImages')){
            $post->image = $file_name;
            $request ->file('fImages')->move('upload/images/post/',$file_name);
        }
        $post->save();
        return redirect()->route('admin.post.list')->with(['flash_level' => 'success','flash_message'=>'Thêm thành công!!']);
    }
    public function getEdit($id){

        $post = Post::find($id)->toArray();
        return view('admin.post.edit',compact('post'));
    }
    public function postEdit($id,Request $request){

        $post = Post::find($id);
        $post->name = Request::input('txtName');
        $post->alias = changeTitle(Request::input('txtName'));
        $post->description = Request::input('txtdescription');
        $post->content = Request::input('txtContent');
        $img_current = 'upload/images/post/'.Request::input('img_current');
        if(!empty(Request::file('fImages'))){
            // Lấy ra tên ảnh.
            $file_name = Request::file('fImages')->getClientOriginalName();
            // Gắn tên ảnh vào CSDL.
            $post->image = $file_name;
            // Di chuyển vào file upload.
            Request::file('fImages')->move('upload/images/post/',$file_name);
            //Kiểm tra nếu gẵn sẵn thì xóa đi.
            if(File::exists($img_current)){
                File::delete($img_current);
            }
        }else{
            echo "Không Có File";
        }
        // End img
        $post->save();
        return redirect()->route('admin.post.list')->with(['flash_level' => 'success','flash_message'=>'Sửa thành công!!']);
    }
    public function getDelete($id){

        // Xóa ảnh trong thư mục upload
        $post = Post::find($id);
        File::delete('upload/images/product/'.$post->image);
        // 2.Xoa csdl product
        $post->delete($id);
        return redirect()->route('admin.post.list')->with(['flash_level' => 'success','flash_message'=>'Xóa thành công!!']);
    }
}
