<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('responses/xml', function () {
$content = '<?xml version="1.0" encoding="UTF-8"?>
<root>
<trungtam>Khoa Phạm</trungtam>
<danhsach>
<monhoc>Lập Trình Laravel</monhoc>
<monhoc>Lập Trình Swift</monhoc>
</danhsach>
</root>';
$status = 200;
$value = 'text/xml';
 return response($content, $status)
 ->header('Content-Type', $value);
});

Route::controllers([
    'auth'		 => 'Auth\AuthController',
    'password'	 => 'Auth\PasswordController',
]);
Route::group(['prefix' => 'admin','middleware' => 'auth'], function() {
    // 1.1.Danh mục sản phẩm
    Route::group(['prefix' => 'cate'], function() {
        Route::get('list', ['as' => 'admin.cate.list', 'uses' => 'CateController@getList']);
        Route::get('add', ['as' => 'admin.cate.getAdd', 'uses' => 'CateController@getAdd']);
        Route::post('add', ['as' => 'admin.cate.postAdd', 'uses' => 'CateController@postAdd']);
        Route::get('delete/{id}', ['as' => 'admin.cate.getDelete', 'uses' => 'CateController@getDelete']);
        Route::get('edit/{id}', ['as' => 'admin.cate.getEdit', 'uses' => 'CateController@getEdit']);
        Route::post('edit/{id}', ['as' => 'admin.cate.postEdit', 'uses' => 'CateController@postEdit']);
    });
    //1.2.Danh sach san pham
    Route::group(['prefix' => 'product'],function(){
        Route::get('list',['as' => 'admin.product.list','uses' => 'ProductController@getList']);
        Route::get('add',['as' => 'admin.product.getAdd','uses' => 'ProductController@getAdd']);
        Route::post('add',['as' => 'admin.product.postAdd','uses' => 'ProductController@postAdd']);
        Route::get('delete/{id}', ['as' => 'admin.product.getDelete', 'uses' => 'ProductController@getDelete']);
        Route::get('edit/{id}', ['as' => 'admin.product.getEdit', 'uses' => 'ProductController@getEdit']);
        Route::post('edit/{id}', ['as' => 'admin.product.postEdit', 'uses' => 'ProductController@postEdit']);
        // Route xóa hình Ajax.
        Route::get('delimg/{id}', ['as' => 'admin.product.getDelImg', 'uses' => 'ProductController@getDelImg']);
    });
    // 2.1.Danh mục tin tức
    Route::group(['prefix' => 'catalogue'], function() {
        Route::get('list', ['as' => 'admin.catalogue.list', 'uses' => 'CatalogueController@getList']);
        Route::get('add', ['as' => 'admin.catalogue.getAdd', 'uses' => 'CatalogueController@getAdd']);
        Route::post('add', ['as' => 'admin.catalogue.postAdd', 'uses' => 'CatalogueController@postAdd']);
        Route::get('delete/{id}', ['as' => 'admin.catalogue.getDelete', 'uses' => 'CatalogueController@getDelete']);
        Route::get('edit/{id}', ['as' => 'admin.catalogue.getEdit', 'uses' => 'CatalogueController@getEdit']);
        Route::post('edit/{id}', ['as' => 'admin.catalogue.postEdit', 'uses' => 'CatalogueController@postEdit']);
    });
    //2.2.Danh sách tin tức
    Route::group(['prefix' => 'new'],function(){
        Route::get('list',['as' => 'admin.new.list','uses' => 'NewController@getList']);
        Route::get('add',['as' => 'admin.new.getAdd','uses' => 'NewController@getAdd']);
        Route::post('add',['as' => 'admin.new.postAdd','uses' => 'NewController@postAdd']);
        Route::get('delete/{id}', ['as' => 'admin.new.getDelete', 'uses' => 'NewController@getDelete']);
        Route::get('edit/{id}', ['as' => 'admin.new.getEdit', 'uses' => 'NewController@getEdit']);
        Route::post('edit/{id}', ['as' => 'admin.new.postEdit', 'uses' => 'NewController@postEdit']);
        // Route xóa hình Ajax.
        Route::get('delimg/{id}', ['as' => 'admin.new.getDelImg', 'uses' => 'NewController@getDelImg']);
    });
    //3.Bài post_Giới thiệu

    Route::group(['prefix' => 'post'],function(){
        Route::get('list',['as' => 'admin.post.list','uses' => 'PostController@getList']);
        Route::get('add',['as' => 'admin.post.getAdd','uses' => 'PostController@getAdd']);
        Route::post('add',['as' => 'admin.post.postAdd','uses' => 'PostController@postAdd']);
        Route::get('delete/{id}', ['as' => 'admin.post.getDelete', 'uses' => 'PostController@getDelete']);
        Route::get('edit/{id}', ['as' => 'admin.post.getEdit', 'uses' => 'PostController@getEdit']);
        Route::post('edit/{id}', ['as' => 'admin.post.postEdit', 'uses' => 'PostController@postEdit']);
        // Route xóa hình Ajax.
        Route::get('delimg/{id}', ['as' => 'admin.post.getDelImg', 'uses' => 'PostController@getDelImg']);
    });
    // 4.Khuyến Mại
    Route::group(['prefix' => 'deal'],function(){
        Route::get('list',['as' => 'admin.deal.list','uses' => 'DealController@getList']);
        Route::get('add',['as' => 'admin.deal.getAdd','uses' => 'DealController@getAdd']);
        Route::post('add',['as' => 'admin.deal.postAdd','uses' => 'DealController@postAdd']);
        Route::get('delete/{id}', ['as' => 'admin.deal.getDelete', 'uses' => 'DealController@getDelete']);
        Route::get('edit/{id}', ['as' => 'admin.deal.getEdit', 'uses' => 'DealController@getEdit']);
        Route::post('edit/{id}', ['as' => 'admin.deal.postEdit', 'uses' => 'DealController@postEdit']);
        // Route xóa hình Ajax.
        Route::get('delimg/{id}', ['as' => 'admin.post.getDelImg', 'uses' => 'DealController@getDelImg']);
    });
    // 5.Slideshow
    Route::group(['prefix' => 'slide'],function(){
        Route::get('list',['as' => 'admin.slide.list','uses' => 'SlideshowController@getList']);
        Route::get('add',['as' => 'admin.slide.getAdd','uses' => 'SlideshowController@getAdd']);
        Route::post('add',['as' => 'admin.slide.postAdd','uses' => 'SlideshowController@postAdd']);
        Route::get('delete/{id}', ['as' => 'admin.slide.getDelete', 'uses' => 'SlideshowController@getDelete']);
        Route::get('edit/{id}', ['as' => 'admin.slide.getEdit', 'uses' => 'SlideshowController@getEdit']);
        Route::post('edit/{id}', ['as' => 'admin.slide.postEdit', 'uses' => 'SlideshowController@postEdit']);
        // Route xóa hình Ajax.
        Route::get('delimg/{id}', ['as' => 'admin.post.getDelImg', 'uses' => 'SlideshowController@getDelImg']);
    });
    // 6.Liên lạc
    Route::group(['prefix' => 'contact'],function(){
        Route::get('list',['as' => 'admin.contact.list','uses' => 'ContactController@getList']);
        Route::get('add',['as' => 'admin.contact.getAdd','uses' => 'ContactController@getAdd']);
        Route::post('add',['as' => 'admin.contact.postAdd','uses' => 'ContactController@postAdd']);
        Route::get('delete/{id}', ['as' => 'admin.contact.getDelete', 'uses' => 'ContactController@getDelete']);
        Route::get('edit/{id}', ['as' => 'admin.contact.getEdit', 'uses' => 'ContactController@getEdit']);
        Route::post('edit/{id}', ['as' => 'admin.contact.postEdit', 'uses' => 'ContactController@postEdit']);
        // Route xóa hình Ajax.
        Route::get('delimg/{id}', ['as' => 'admin.post.getDelImg', 'uses' => 'ContactController@getDelImg']);
    });
    // 7.User
    Route::group(['prefix' => 'user'], function() {
        Route::get('list', ['as' => 'admin.user.list', 'uses' => 'UserController@getList']);
        Route::get('add', ['as' => 'admin.user.getAdd', 'uses' => 'UserController@getAdd']);
        Route::post('add', ['as' => 'admin.user.postAdd', 'uses' => 'UserController@postAdd']);
        Route::get('delete/{id}', ['as' => 'admin.user.getDelete', 'uses' => 'UserController@getDelete']);
        Route::get('edit/{id}', ['as' => 'admin.user.getEdit', 'uses' => 'UserController@getEdit']);
        Route::post('edit/{id}', ['as' => 'admin.user.postEdit', 'uses' => 'UserController@postEdit']);
    });
    Route::group(['prefix' => 'message'], function() {
        Route::get('list', ['as' => 'admin.message.list', 'uses' => 'MessageController@getList']);
        Route::get('delete/{id}', ['as' => 'admin.message.getDelete', 'uses' => 'MessageController@getDelete']);

    });
});
Route::get('insertdata', function () {
    DB::table('users')->insert(
    ['username' => 'admin1','password'=>Hash::make('12345'),'email'=>'admin@gmail.com','level'=>1]

);
});

Route::get('/',['as'=>'home','uses'=>'WellcomeController@index']);
// Sản phẩm
Route::get('loai-san-pham/{id}/{tenloai}',['as'=>'loaisanpham','uses'=>'WellcomeController@loaisanpham']);
Route::get('chi-tiet-san-pham/{id}/{tenloai}',['as'=>'chitietsanpham','uses'=>'WellcomeController@chitietsanpham']);
// Liên Hệ
Route::get('lien-he',['as'=>'getLienhe','uses' => 'WellcomeController@get_lienhe']);
Route::post('lien-he',['as'=>'postLienhe','uses' => 'WellcomeController@post_lienhe']);
// Shopping-Cart
Route::get('mua-hang/{id}/{tensanpham}',['as'=>'muahang','uses' => 'WellcomeController@muahang']);
Route::get('gio-hang',['as'=>'giohang','uses' => 'WellcomeController@giohang']);
Route::get('xoa-san-pham/{id}',['as'=>'xoasanpham','uses' => 'WellcomeController@xoasanpham']);
// Tin Tức
Route::get('loai-tin-tuc/{id}/{tenloai}',['as'=>'loaitintuc','uses' => 'WellcomeController@loaitintuc']);
Route::get('chi-tiet-tin-tuc/{id}/{tenloai}',['as'=>'chitiettintuc','uses' => 'WellcomeController@chitiettintuc']);
// Giới Thiệu
Route::get('gioi-thieu/{id}/{tenloai}',['as'=>'gioithieu','uses' => 'WellcomeController@gioithieu']);
// Slide
Route::get('slideshow/{id}',['as'=>'slideshow','uses' => 'WellcomeController@slideshow']);
Route::get('cap-nhat/{id}/{qty}',['as'=>'capnhat','uses' => 'WellcomeController@capnhat']);
