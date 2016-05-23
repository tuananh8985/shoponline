<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Message;
class MessageController extends Controller
{
    public function getList(){
        $data = Message::all();
        return view('admin.messages.list',compact('data'));
    }
    public function getDelete($id){
        $mes = Message::find($id);
        $mes->delete($id);
        return redirect()->route('admin.message.list')->with(['flash_level' => 'success','flash_message'=>'Xóa thành công!!']);
    }
}
