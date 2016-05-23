@extends('admin.master')
@section('title')
    <div class ="pull-left">
        <h3><span class="glyphicon glyphicon-folder-open"></span> Sửa thông tin</h3>
    </div>@endsection
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
            <label>Tên</label>
            <input class="form-control" name="txtName" placeholder="Xin hãy nhập tên" value = "{!!old('txtName',isset($post) ? $post["name"] : null)!!}"/>
        </div>
        <div class="form-group">
            <label>Giới Thiệu</label>
            <textarea class="form-control" rows="3" name="txtdescription">{!!old('txtdescription',isset($post) ? $post["description"] : null)!!}</textarea>
            <script type ="text/javascript">ckeditor("txtdescription")</script>

        </div>
        <div class="form-group">
            <label>Nội dung</label>
            <textarea class="form-control" rows="3" name="txtContent">{!!old('txtContent',isset($post) ? $post["content"] : null)!!}</textarea>
            <script type ="text/javascript">ckeditor("txtContent")</script>

        </div>
        <div class="form-group">
            <label>Hình ảnh sản phẩm</label>
            <img src = "{!!asset('upload/images/post/'.$post["image"])!!}" class = "img_curent"/>
            <input type = "hidden" name = "img_current" value = "{!!$post['image']!!}" />
        </div>
        <div class="form-group">
            <label>Hình ảnh</label>
            <input type="file" name="fImages" value = "{!!old('fImages',isset($post) ? $post["image"] : null)!!}">
        </div>


        <button type="submit" class="btn btn-default">Sửa sản phẩm</button>
        <button type="reset" class="btn btn-default">Reset</button>
    </div>
    <div class = "col-md-1"></div>

</form>

@endsection
