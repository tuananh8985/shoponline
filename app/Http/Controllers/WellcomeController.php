<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;

//use App\Http\Requests;
use App\Http\Requests\CommentRequest;
//use App\Http\Controllers\Controller;
use DB,Cart;
//use Request;
//use Mail;
use App\Message;
//use Request;
use Mail;
//use Illuminate\Support\Facades\Request;
use Illuminate\Http\Request;
//

use App\Http\Controllers\Controller;
class WellcomeController extends Controller
{
    public function index(){
        $cat_product = DB::table('cates')->where('parent_id',0)->get();
        $product = DB::table('products')->select('id','name','image','price','alias')->orderBy('id','DESC')->get();

        return view('user.pages.home',compact('product','cat_product','lasted_product'));

    }
    // Sản phẩm-Products
    public function loaisanpham($id){
        // Hiển ra san phẩm khi kick vao menu nav.101
        // 1.Hiển thị content_danh sách sản phẩm.
        $product_cate = DB::table('products')->select('id','name','image','price','alias','cate_id')->where('cate_id',$id)->paginate(4);
        //2 câu lệnh sau có chức năng như nhau.Sidebar Categorys.
        //$cate = DB::table('cates')->select('parent_id')->where('id',$product_cate[0]->cate_id)->first();
        //Lấy ra các parent_id theo id tương ứng.
        //3.Menu sp liên quan-sidebar
        $cate = DB::table('cates')->select('parent_id')->where('id',$id)->first();
        $menu_cate = DB::table('cates')->select('id','name','alias')->where('parent_id',$cate->parent_id)->get();
        //4.Spham bán chạy nhất
        // Latest Products cha
        $name_cate = DB::table('cates')->select('name')->where('id',$id)->first();
        // Latest Products con
        $lasted_product = DB::table('products')->select('id','name','image','price','alias')->orderBy('id','DESC')->take(3)->get();


        return view('user.pages.cate',compact('product_cate','menu_cate','lasted_product','name_cate'));
    }
    public function chitietsanpham($id){
        $product_detail = DB::table('products')->where('id',$id)->first();
        $product_same = DB::table('products')->where('cate_id',$product_detail->cate_id)->get();
        $image = DB::table('product_images')->select('id','image')->where('product_id',$product_detail->id)->get();
        return view('user.pages.detail',compact('product_detail','image','product_same'));
    }
    // Slideshow
    public function slideshow($id){
        $product_detail = DB::table('slideshows')->where('id',$id)->first();
        $image = DB::table('slide_images')->select('id','image')->where('slide_id',$product_detail->id)->get();
        return view('user.blocks.slider',compact('product_detail','image'));
    }
    // Liên Hệ
    public function get_lienhe(){
        return view('user.pages.contact');
    }
    public function post_lienhe(CommentRequest $request){
    $mes = new Message();
    $mes->name = $request->txtname;
    $mes->alias = changeTitle($request->txtname);
    $mes->mobile = $request->txtmobile;
    $mes->email = $request->txtemail;
    $mes->messages = $request->txtmessage;
    $mes->save();

    echo "<script>
    alert('Cám ơn bạn đã góp ý.Chúng tôi sẽ liên hệ với bạn trong thời gian sớm nhất');
    window.location = '".url('/')."'
    </script>";
    // return redirect()->route('home');

}

// Tin Tức
public function loaitintuc($id){
    // Hiển ra san phẩm khi kick vao menu nav.101
    // 1.Hiển thị content_danh sách sản phẩm.
    $cate = DB::table('catalogues')->find($id);
    $new_cate = DB::table('news')->select('id','name','alias','description','content','cate_id')->where('cate_id',$id)->paginate(4);
    return view('user.pages.new',compact('new_cate','cate'));
}
public function chitiettintuc($id){
    $new_detail = DB::table('news')->where('id',$id)->first();
    $new_same=DB::table('news')->where('cate_id',$new_detail->cate_id)->get();
    return view('user.pages.detail_new',compact('new_detail','new_same'));
}
// Mua hang
public function muahang($id){
    $product_buy = DB::table('products')->where('id',$id)->first();
    Cart::add(array('id'=>$id,'name'=>$product_buy->name,'qty'=>1,'price'=>$product_buy->price,'options' => array('img'=>$product_buy->image)));
    $content = Cart::content();
    return redirect()->route('giohang');
}
public function giohang(){
    $content = Cart::content();
    $total = Cart::total();
    return view('user.pages.shopping',compact('content','total'));
}
public function xoasanpham($id){
    Cart::remove($id);
    return redirect()->route('giohang');
}
public function capnhat(){
    if(Request::ajax()){
        $id = Request::get('id');
        $qty = Request::get('qty');
        Cart::update($id,$qty);
        echo "oke";
    }
}
// Giới Thiệu
public function gioithieu($id){
    $data = DB::table('posts')->find($id);
    return view('user.pages.gioithieu',compact('data'));
}
}
