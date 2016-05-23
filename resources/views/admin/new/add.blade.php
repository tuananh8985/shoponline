@extends('admin.master')
@section('title')
    <div class ="pull-left">
        <h3><span class="glyphicon glyphicon-folder-open"></span> Thêm danh sách tin tức</h3>
    </div>
@endsection
@section('content')
    <form action="{{url('/admin/new/add')}}" method="POST" enctype = "multipart/form-data">

        <!-- /.col-lg-12 -->
        <div class="col-lg-7" style="padding-bottom:120px">

            {{-- Hiển thông báo lỗi như kiểm tra form nhập --}}
            @include('admin.blocks.error')
            {{-- End Hiển thông báo lỗi như kiểm tra form nhập --}}
            <input type="hidden" name="_token" value = "{{csrf_token()}}"/>
            <div class="form-group">
                <label>Danh mục</label>
                <select class="form-control" name ="sltParent">
                    <option value="">Lựa chọn danh mục</option>
                    <?php cate_parent($cate,0,"--",old('sltParent'))?>
                </select>
            </div>
            <div class="form-group">
                <label>Tên</label>
                <input class="form-control" name="txtName" placeholder="Xin hãy nhập tên" value = "{!!old('txtName')!!}" />
            </div>
            <div class="form-group">
                <label>Giới Thiệu</label>
                <textarea class="form-control" rows="3" name="txtdescription">{!!old('txtdescription')!!}</textarea>
                <script type="text/javascript"> ckeditor ("txtdescription")</script>

            </div>
            <div class="form-group">
                <label>Nội dung</label>
                <textarea class="form-control" rows="3" name="txtcontent">{!!old('txtcontent')!!}</textarea>
                <script type="text/javascript"> ckeditor ("txtcontent")</script>

            </div>
            <div class="form-group">
                <label>Hình Ảnh</label>
                <input type="file" name="fImages" value = "{!!old('fImages')!!}">
            </div>


            <button type="submit" class="btn btn-default">Thêm Sản Phẩm</button>
            <button type="reset" class="btn btn-default">Reset</button>
        </div>
        <div class = "col-md-1"></div>
        <div class = "col-md-4">
            @for($i = 1;$i<= 10;$i++)
                <div class = "form-group">
                    <label>Hình ảnh khác {!! $i !!}</label>
                    <input type ="file" name="fProductDetail[]"/>
                </div>
            @endfor
        </div>
    </form>

@endsection
