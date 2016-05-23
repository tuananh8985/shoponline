<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\CatalogueRequest;
use App\Http\Controllers\Controller;
use App\Catalogue;

class CatalogueController extends Controller {

    public function getList() {
        $data = Catalogue::select('id', 'name', 'parent_id')->orderBy('id', 'DESC')->get()->toArray();
        return view('admin.catalogue.list',compact('data'));
    }

    public function getAdd() {
        $parent = Catalogue::select('id', 'name', 'parent_id')->get()->toArray();
        return view('admin.catalogue.add')->with('parent', $parent);
    }

    public function postAdd(CatalogueRequest $request) {
        $cate = new Catalogue;
        $cate->name = $request->txtCateName;
        $cate->alias = changeTitle($request->txtCateName);
        $cate->parent_id = $request->sltParent;
        $cate->save();
        return redirect()->route('admin.catalogue.list')->with(['flash_level' => 'success', 'flash_message' => 'Hoàn thành thêm danh mục']);
    }

    public function getEdit($id) {
        $data = Catalogue::findOrfail($id)->toArray();
        $parent = Catalogue::select('id','name','parent_id')->get()->toArray();
        return view('admin.catalogue.edit',compact('data','parent','id'));


    }

    public function postEdit(Request $request,$id){
        $this ->validate($request,
        ["txtCateName" => "required"],
        ["txtCateName.required" => "Xin hãy nhập tên"]
    );

    $cate = Catalogue::find($id);
    $cate->name = $request->txtCateName;
    $cate->alias = changeTitle($request->txtCateName);
    $cate->save();
    return redirect()->route('admin.catalogue.list')->with(['flash_level' => 'success', 'flash_message' => 'Hoàn thành sửa danh mục']);
}

public function getDelete($id) {
    $parent = Catalogue::where('parent_id',$id)->count();
    if($parent == 0){
        $cate = Catalogue::find($id);
        $cate->delete($id);
        return redirect()->route('admin.catalogue.list')->with(['flash_level' => 'success', 'flash_message' => 'Hoàn thành xóa danh mục']);
    }
    else{
        echo "<script type='text/javascript'>
        alert('Xin lỗi bạn không xóa được danh mục này');
        window.location = '";
        echo route('admin.catalogue.list');
        echo "';
        </script>";
    }

}

}
