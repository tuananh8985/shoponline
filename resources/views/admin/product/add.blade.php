@extends('admin.master')
@section('title')
    <div class ="pull-left">
        <h3><span class="glyphicon glyphicon-folder-open"></span> Thêm sản phẩm</h3>
    </div>
@endsection
@section('content')
    <form action="{{url('/admin/product/add')}}" method="POST" enctype = "multipart/form-data">

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
                <label>Tên sản phẩm</label>
                <input class="form-control" name="txtName" placeholder="Xin hãy nhập tên sản phẩm" value = "{!!old('txtName')!!}" />
            </div>
            <div class="form-group">
                <label>Giá</label>
                <input class="form-control" name="txtPrice" placeholder="Xin hãy nhập giá sản phẩm" value = "{!!old('txtPrice')!!}"/>
            </div>
            <div class="form-group">
                <label>Màu sắc</label>
                <input class="form-control" name="txtColor" placeholder="Xin hãy nhập màu sắc sản phẩm" value = "{!!old('txtColor')!!}"/>
            </div>
            <div class="form-group">
                <label>Thời gian bảo hành</label>
                <input class="form-control" name="txtwarranty" placeholder="Xin hãy nhập thời gian bảo hành sản phẩm" value = "{!!old('txtwarranty')!!}"/>
            </div>

            <div class="form-group">
                <label>Khuyến Mại</label>
                <textarea class="form-control" rows="3" name="txtoffer">{!!old('txtoffer')!!}</textarea>
                <script type="text/javascript"> ckeditor ("txtoffer")</script>

            </div>
            <div class="form-group">
                <label>Thông số kỹ thuật</label>
                <textarea class="form-control" rows="3" name="txtparameter">{!!old('txtparameter')!!}</textarea>
                <script type="text/javascript"> ckeditor ("txtparameter")</script>
            </div>
            <div class="form-group">
                <label>Giới Thiệu</label>
                <textarea class="form-control" rows="3" name="txtdescription">{!!old('txtdescription')!!}</textarea>
                <script type="text/javascript"> ckeditor ("txtdescription")</script>

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
