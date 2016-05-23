<?php

namespace App\Http\Controllers;
//Đong de chay requet o postEdit
//use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\ContactRequest;
use App\Http\Controllers\Controller;
use App\Contact;
use Input;
use Request;

class ContactController extends Controller
{
    public function  getList(){
        $data = Contact::all();
        return view('admin.contact.list',compact('data'));
    }
    public function  getAdd(){
        return view('admin.contact.add');
    }
    public function  postAdd(ContactRequest $request){
        $contact = new Contact();
        $contact->name = $request->txtName;
        $contact->alias = changeTitle($request ->txtName);

        $contact->title =$request->txtTitle;
        $contact->hotline1 =$request->txtHotline1;
        $contact->hotline2 =$request->txtHotline2;
        $contact->facebook =$request->txtFacebook;
        $contact->skype =$request->txtSkype;
        $contact->email =$request->txtEmail;
        $contact->slogan =$request->txtSlogan;
        $contact->map =$request->txtMap;
        $contact->contactinfo =$request->txtInfo;
        $contact->save();
        return redirect()->route('admin.contact.list')->with(['flash_level' => 'success','flash_message'=>'Thêm thành công!!']);


    }
    public function  getEdit($id){
        $contact = Contact::find($id)->toArray();
        return view('admin.contact.edit',compact('contact'));
    }
    public function postEdit($id,Request $request){
        $contact = Contact::find($id);
        $contact->name = Request::input('txtName');
        $contact->alias = changeTitle(Request::input('txtName'));
        $contact->title = Request::input('txtTitle');
        $contact->hotline1= Request::input('txtHotline1');
        $contact->hotline2 = Request::input('txtHotline2');
        $contact->facebook = Request::input('txtFacebook');
        $contact->skype = Request::input('txtSkype');
        $contact->email = Request::input('txtEmail');
        $contact->slogan = Request::input('txtSlogan');
        $contact->map = Request::input('txtMap');
        $contact->contactinfo = Request::input('txtInfo');
        $contact->save();
        return redirect()->route('admin.contact.list')->with(['flash_level' => 'success','flash_message'=>'Sửa thành công!!']);


    }
    public function  getDelete($id){
        $contact = Contact::find($id);
        $contact->delete($id);
        return redirect()->route('admin.contact.list')->with(['flash_level' => 'success','flash_message'=>'Xóa thành công!!']);
    }
}
