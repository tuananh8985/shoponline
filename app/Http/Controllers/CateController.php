<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\CateRequest;
use App\Http\Controllers\Controller;
use App\Cate;

class CateController extends Controller {

    public function getList() {
        $data = Cate::select('id', 'name', 'parent_id')->orderBy('id', 'DESC')->get()->toArray();
        return view('admin.cate.list', compact('data'));
    }

    public function getAdd() {
        $parent = Cate::select('id', 'name', 'parent_id')->get()->toArray();
        return view('admin.cate.add')->with('parent', $parent);
    }

    public function postAdd(CateRequest $request) {
        $cate = new Cate;
        $cate->name = $request->txtCateName;
        $cate->alias = changeTitle($request->txtCateName);
        $cate->order = $request->txtOrder;
        $cate->parent_id = $request->sltParent;
        $cate->keywords = $request->txtKeywords;
        $cate->description = $request->txtDescription;
        $cate->save();
        return redirect()->route('admin.cate.list')->with(['flash_level' => 'success', 'flash_message' => 'Thêm thành công!!']);
    }

    public function getEdit($id) {
        $data = Cate::findOrfail($id)->toArray();
        $parent = Cate::select('id','name','parent_id')->get()->toArray();
        return view('admin.cate.edit',compact('data','parent','id'));


    }

    public function postEdit(Request $request,$id){
        $this ->validate($request,
        ["txtCateName" => "required"],
        ["txtCateName.required" => "Please input Name Category"]
    );

    $cate = Cate::find($id);
    $cate->name = $request->txtCateName;
    $cate->alias = changeTitle($request->txtCateName);
    $cate->order = $request->txtOrder;
    $cate->parent_id = $request->sltParent;
    $cate->keywords = $request->txtKeywords;
    $cate->description = $request->txtDescription;
    $cate->save();
    return redirect()->route('admin.cate.list')->with(['flash_level' => 'success', 'flash_message' => 'Sửa thành công!!']);
}

public function getDelete($id) {
    $parent = Cate::where('parent_id',$id)->count();
    if($parent == 0){
        $cate = Cate::find($id);
        $cate->delete($id);
        return redirect()->route('admin.cate.list')->with(['flash_level' => 'success', 'flash_message' => 'Xóa thành công!!']);
    }
    else{
        echo "<script type='text/javascript'>
        alert('Xin lỗi!Bạn không xóa được danh mục này');
        window.location = '";
        echo route('admin.cate.list');
        echo "';
        </script>";
    }

}

}
