
<!-- /.col-lg-12 -->
@extends('admin.master')
@section('title')
    <div class ="pull-left">
        <h3><span class="glyphicon glyphicon-folder-open"></span> Thêm danh mục tin tức</h3>
    </div>
@endsection
@section('content')

<div class="col-lg-7" style="padding-bottom:120px">
    {{-- Hiển thông báo lỗi như kiểm tra form nhập --}}
    @include('admin.blocks.error')
    {{-- End Hiển thông báo lỗi như kiểm tra form nhập --}}

    <form action="{{route('admin.catalogue.postAdd')}}" method="POST">
        <input type="hidden" name="_token" value = "{{csrf_token()}}"/>
        <div class="form-group">
            <label>Danh mục cha</label>
            <select class="form-control" name ="sltParent">
                <option value="0">Lựa chọn danh mục cha</option>
                    <?php cate_parent($parent);?>
            </select>
        </div>
        <div class="form-group">
            <label>Tên</label>
            <input class="form-control" name="txtCateName" placeholder="Xin hãy nhập tên" />
        </div>
        <button type="submit" class="btn btn-default">Thêm</button>
        <button type="reset" class="btn btn-default">Reset</button>
        <form>
            </div>
            @endsection
