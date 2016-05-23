@extends('admin.master')
@section('title')
    <div class ="pull-left">
        <h3><span class="glyphicon glyphicon-folder-open"></span> Sửa danh mục tin tức</h3>
    </div>
@endsection
@section('content')
    <!-- /.col-lg-12 -->

    <div class="col-lg-7" style="padding-bottom:120px">
        {{-- Hiển thông báo lỗi như kiểm tra form nhập --}}
        @include('admin.blocks.error')
        {{-- End Hiển thông báo lỗi như kiểm tra form nhập --}}

        <form action="" method="POST">
            <input type ="hidden" name="_token" value ="{!!csrf_token()!!}"/>
            <div class="form-group">
                <label>Danh mục cha</label>
                <select class="form-control" name = "sltParent">
                    <option value="0">Lựa chọn danh mục</option>
                    <?php cate_parent($parent,0,"--",$data["parent_id"])?>
                </select>
            </div>
            <div class="form-group">
                <label>Tên</label>
                <input class="form-control" name="txtCateName" placeholder="Please Enter Category Name" value ="{!!old('txtCateName',isset($data) ? $data['name'] : null)!!}" />
            </div>
            <button type="submit" class="btn btn-default">Sửa</button>
            <button type="reset" class="btn btn-default">Reset</button>
            <form>
            </div>
        @endsection
