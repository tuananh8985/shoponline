@extends('admin.master')
@section('title')
    <div class ="pull-left">
        <h3><span class="glyphicon glyphicon-folder-open"></span> Thêm Thông Tin Liên Hệ</h3>
    </div>
@endsection
@section('content')
    <form action="" method="POST" enctype = "multipart/form-data">

        <!-- /.col-lg-12 -->
        <div class="col-lg-7" style="padding-bottom:120px">

            {{-- Hiển thông báo lỗi như kiểm tra form nhập --}}
            @include('admin.blocks.error')
            {{-- End Hiển thông báo lỗi như kiểm tra form nhập --}}
            <input type="hidden" name="_token" value = "{{csrf_token()}}"/>

            <div class="form-group">
                <label>Tên</label>
                <input class="form-control" name="txtName" placeholder="Xin hãy nhập tên" value = "{!!old('txtName')!!}" />
            </div>
            <div class="form-group">
                <label>Tiêu đề</label>
                <input class="form-control" name="txtTitle" placeholder="Xin hãy nhập tiêu đề" value = "{!!old('txtTitle')!!}" />
            </div>
            <div class="form-group">
                <label>Hottline 1</label>
                <input class="form-control" name="txtHotline1" placeholder="Xin hãy nhập hotline 1" value = "{!!old('txtHotline1')!!}" />
            </div>
            <div class="form-group">
                <label>Hottline 2</label>
                <input class="form-control" name="txtHotline2" placeholder="Xin hãy nhập hotline 2" value = "{!!old('txtHotline2')!!}" />
            </div>
            <div class="form-group">
                <label>Facebook</label>
                <input class="form-control" name="txtFacebook" placeholder="Xin hãy nhập facebook" value = "{!!old('txtFacebook')!!}" />
            </div>
            <div class="form-group">
                <label>Skype</label>
                <input class="form-control" name="txtSkype" placeholder="Xin hãy nhập skype" value = "{!!old('txtSkype')!!}" />
            </div>
            <div class="form-group">
                <label>Email</label>
                <input class="form-control" name="txtEmail" placeholder="Xin hãy nhập email" value = "{!!old('txtEmail')!!}" />
            </div>
            <div class="form-group">
                <label>Slogan</label>
                <input class="form-control" name="txtSlogan" placeholder="Xin hãy nhập slogan" value = "{!!old('txtSlogan')!!}" />
            </div>

            <div class="form-group">
                <label>Thông Tin Liên Hệ</label>
                <textarea class="form-control" rows="3" name="txtInfo">{!!old('txtInfo')!!}</textarea>
                <script type="text/javascript"> ckeditor ("txtInfo")</script>
            </div>
            <div class="form-group">
                <label>Bản đồ</label>
                <textarea class="form-control" rows="3" name="txtMap">{!!old('txtMap')!!}</textarea>
                <script type="text/javascript"> ckeditor ("txtMap")</script>
            </div>

            <button type="submit" class="btn btn-default">Thêm Sản Phẩm</button>
            <button type="reset" class="btn btn-default">Reset</button>
        </div>

    </form>

@endsection
