@extends('admin.master')
@section('title')
    <div class ="pull-left">
        <h3><span class="glyphicon glyphicon-folder-open"></span> Sửa danh sách tin tức</h3>
    </div>
@endsection
@section('content')

<style>
.img_curent{
    width:150px;
}
.img_detail{
    width:150px;
    margin-bottom:20px;
}
.icon_del{
    top: -14px;
    position: relative;
    left: -4px;

}
</style>
<form action="" method="POST" name ="frmEditProduct" enctype = "multipart/form-data">
    <!-- /.col-lg-12 -->
    <div class="col-lg-7" style="padding-bottom:120px">
        {{-- Hiển thông báo lỗi như kiểm tra form nhập --}}
        @include('admin.blocks.error')
        {{-- End Hiển thông báo lỗi như kiểm tra form nhập --}}
        <input type="hidden" name="_token" value = "{{csrf_token()}}"/>
        <div class="form-group">
            <label>Danh mục cha</label>
            <select class="form-control" name = "sltParent">
                <option value="">Lựa chọn danh mục</option>
                <?php cate_parent($cate,0,"--",$new["cate_id"])?>

            </select>

        </div>
        <div class="form-group">
            <label>Tên</label>
            <input class="form-control" name="txtName" placeholder="Xin hãy nhập tên sản phẩm" value = "{!!old('txtName',isset($new) ? $new["name"] : null)!!}"/>
        </div>
        <div class="form-group">
            <label>Giới Thiệu</label>
            <textarea class="form-control" rows="3" name="txtdescription">{!!old('txtdescription',isset($new) ? $new["description"] : null)!!}</textarea>
            <script type ="text/javascript">ckeditor("txtdescription")</script>

        </div>
        <div class="form-group">
            <label>Nội Dung</label>
            <textarea class="form-control" rows="3" name="txtcontent">{!!old('txtcontent',isset($new) ? $new["content"] : null)!!}</textarea>
            <script type ="text/javascript">ckeditor("txtcontent")</script>
        </div>
        <div class="form-group">
            <label>Hình ảnh</label>
            <img src = "{!!asset('upload/images/new/'.$new["image"])!!}" class = "img_curent"/>
            <input type = "hidden" name = "img_current" value = "{!!$new['image']!!}"/>
        </div>
        <div class="form-group">
            <label>Chọn Hình ảnh</label>
            <input type="file" name="fImages" value = "{!!old('fImages',isset($new) ? $new["image"] : null)!!}">
        </div>


        <button type="submit" class="btn btn-default">Sửa sản phẩm</button>
        <button type="reset" class="btn btn-default">Reset</button>
    </div>
    <div class = "col-md-1"></div>
    <div class = "col-md-4">
        @foreach($new_image as $key => $item)
            <div  class="form-group" id = "{!!$key!!}">
                <img src = "{!!asset('upload/images/detail/new/'.$item["image"])!!}" class = "img_detail" idHinh = "{!!$item['id']!!}" id="{!!$key!!}"/>
                <a href="javascript:void(0)" type ="button" id ="del_imgnew_demo" class ="btn btn-danger btn-circle icon_del"><i class="fa fa-times"></i></a>
            </div>
        @endforeach
        {{-- Nút thêm ảnh --}}
        <button type = "button" class = "btn btn-primary" id = "addImages">Thêm Hình ảnh</button>
        {{-- Chèn nhiều ảnh --}}
        <div id = "insert"></div>
    </div>
</form>

@endsection
