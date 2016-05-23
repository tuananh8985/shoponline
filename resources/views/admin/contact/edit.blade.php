@extends('admin.master')
@section('title')
    <div class ="pull-left">
        <h3><span class="glyphicon glyphicon-folder-open"></span> Sửa Thông Tin Liên Hệ</h3>
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
            <label>Tên</label>
            <input class="form-control" name="txtName" placeholder="Xin hãy nhập tên" value = "{!!old('txtName',isset($contact) ? $contact["name"] : null)!!}"/>
        </div>
        <div class="form-group">
            <label>Tiêu đề</label>
            <input class="form-control" name="txtTitle" placeholder="Xin hãy nhập tiêu đề" value = "{!!old('txtName',isset($contact) ? $contact["title"] : null)!!}"/>
        </div>
        <div class="form-group">
            <label>Hottline 1</label>
            <input class="form-control" name="txtHotline1" placeholder="Xin hãy nhập hotline 1" value = "{!!old('txtName',isset($contact) ? $contact["hotline1"] : null)!!}"/>
        </div>
        <div class="form-group">
            <label>Hottline 2</label>
            <input class="form-control" name="txtHotline2" placeholder="Xin hãy nhập hotline 2" value = "{!!old('txtName',isset($contact) ? $contact["hotline2"] : null)!!}"/>
        </div>
        <div class="form-group">
            <label>Facebook</label>
            <input class="form-control" name="txtFacebook" placeholder="Xin hãy nhập facebook" value = "{!!old('txtName',isset($contact) ? $contact["facebook"] : null)!!}"/>
        </div>
        <div class="form-group">
            <label>Skype</label>
            <input class="form-control" name="txtSkype" placeholder="Xin hãy nhập skype" value = "{!!old('txtName',isset($contact) ? $contact["skype"] : null)!!}"/>
        </div>
        <div class="form-group">
            <label>Email</label>
            <input class="form-control" name="txtEmail" placeholder="Xin hãy nhập email" value = "{!!old('txtName',isset($contact) ? $contact["email"] : null)!!}"/>
        </div>
        <div class="form-group">
            <label>Slogan</label>
            <input class="form-control" name="txtSlogan" placeholder="Xin hãy nhập slogan" value = "{!!old('txtName',isset($contact) ? $contact["slogan"] : null)!!}"/>
        </div>

        <div class="form-group">
            <label>Thông Tin Liên Hệ</label>
            <textarea class="form-control" rows="3" name="txtInfo">{!!old('txtdescription',isset($contact) ? $contact["contactinfo"] : null)!!}</textarea>
            <script type="text/javascript"> ckeditor ("txtInfo")</script>
        </div>
        <div class="form-group">
            <label>Bản đồ</label>
            <textarea class="form-control" rows="3" name="txtMap">{!!old('txtdescription',isset($contact) ? $contact["map"] : null)!!}</textarea>
            <script type="text/javascript"> ckeditor ("txtMap")</script>
        </div>

        <button type="submit" class="btn btn-default">Sửa sản phẩm</button>
        <button type="reset" class="btn btn-default">Reset</button>
    </div>
</form>

@endsection
