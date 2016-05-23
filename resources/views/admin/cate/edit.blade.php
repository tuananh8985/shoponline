@extends('admin.master')
@section('title')
    <div class ="pull-left">
        <h3><span class="glyphicon glyphicon-folder-open"></span> Sửa danh mục sản phẩm</h3>
    </div>@endsection
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
                <label>Tên danh mục</label>
                <input class="form-control" name="txtCateName" placeholder="Xin hãy nhập tên danh mục" value ="{!!old('txtCateName',isset($data) ? $data['name'] : null)!!}" />
            </div>
            {{-- <div class="form-group">
                <label>Category Order</label>
                <input class="form-control" name="txtOrder" placeholder="Please Enter Category Order" value ="{!!old('txtOrder',isset($data) ? $data['order'] : null)!!}"/>
            </div>
            <div class="form-group">
                <label>Category Keywords</label>
                <input class="form-control" name="txtKeywords" placeholder="Please Enter Category Keywords" value ="{!!old('txtKeywords',isset($data) ? $data['keywords'] : null)!!}"/>
            </div>
            <div class="form-group">
                <label>Giới Thiệu</label>
                <textarea class="form-control" rows="3" name="txtDescription" >{!!old('txtDescription',isset($data) ? $data['description'] : null)!!}</textarea>
            </div> --}}
            <button type="submit" class="btn btn-default">Sửa danh mục</button>
            <button type="reset" class="btn btn-default">Reset</button>
            <form>
            </div>
        @endsection
