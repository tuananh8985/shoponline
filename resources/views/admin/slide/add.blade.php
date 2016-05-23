@extends('admin.master')
@section('title')
    <div class ="pull-left">
        <h3><span class="glyphicon glyphicon-folder-open"></span> Thêm ảnh slideshow</h3>
    </div>
@endsection
@section('content')
    <form action="{!!url(route('admin.slide.postAdd'))!!}" method="POST" enctype = "multipart/form-data">

        <!-- /.col-lg-12 -->
        <div class="col-lg-7" style="padding-bottom:120px">

            {{-- Hiển thông báo lỗi như kiểm tra form nhập --}}
            @include('admin.blocks.error')
            {{-- End Hiển thông báo lỗi như kiểm tra form nhập --}}
            <input type="hidden" name="_token" value = "{{csrf_token()}}"/>
            <div class="form-group">
                <label>Tên</label>
                <input class="form-control" name="txtName" placeholder="Xin hãy nhập tên" />
            </div>
            <div class="form-group">
                <label>Hình Ảnh</label>
                <input type="file" name="fImages">
            </div>


            <button type="submit" class="btn btn-default">Thêm</button>
            <button type="reset" class="btn btn-default">Reset</button>
        </div>
    </form>

@endsection
