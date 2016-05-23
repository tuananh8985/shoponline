@extends('admin.master')
@section('title')
    <div class ="pull-left">
        <h3><span class="glyphicon glyphicon-folder-open"></span> Sửa sản phẩm</h3>
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
            <label>Category Parent</label>
            <select class="form-control" name = "sltParent">
                <option value="">Please Choose Category</option>
                <?php cate_parent($cate,0,"--",$product["cate_id"])?>

            </select>


        </div>
        <div class="form-group">
            <label>Tên sản phẩm</label>
            <input class="form-control" name="txtName" placeholder="Xin hãy nhập tên sản phẩm" value = "{!!old('txtName',isset($product) ? $product["name"] : null)!!}"/>
        </div>
        <div class="form-group">
            <label>Giá</label>
            <input class="form-control" name="txtPrice" placeholder="Xin hãy nhập giá sản phẩm" value = "{!!old('txtPrice',isset($product) ? $product["price"] : null)!!}" />
        </div>
        <div class="form-group">
            <label>Màu sắc</label>
            <input class="form-control" name="txtColor" placeholder="Xin hãy nhập màu sắc sản phẩm" value = "{!!old('txtColor',isset($product) ? $product["color"] : null)!!}" />
        </div>
        <div class="form-group">
            <label>Thời gian bảo hành</label>
            <input class="form-control" name="txtwarranty" placeholder="Xin hãy nhập thời gian bảo hành" value = "{!!old('txtwarranty',isset($product) ? $product["warranty"] : null)!!}" />
        </div>
        <div class="form-group">
            <label>Khuyến mãi</label>
            <textarea class="form-control" rows="3" name="txtoffer">{!!old('txtoffer',isset($product) ? $product["offer"] : null)!!}</textarea>
            <script type ="text/javascript">ckeditor("txtoffer")</script>

        </div>
        <div class="form-group">
            <label>Thông số kỹ thuật</label>
            <textarea class="form-control" rows="3" name="txtparameter">{!!old('txtparameter',isset($product) ? $product["parameter"] : null)!!}</textarea>
            <script type ="text/javascript">ckeditor("txtparameter")</script>

        </div>
        <div class="form-group">
            <label>Giới thiệu</label>
            <textarea class="form-control" rows="3" name="txtdescription">{!!old('txtdescription',isset($product) ? $product["description"] : null)!!}</textarea>
            <script type ="text/javascript">ckeditor("txtdescription")</script>

        </div>
        <div class="form-group">
            <label>Hình ảnh sản phẩm</label>
            <img src = "{!!asset('upload/images/product/'.$product["image"])!!}" class = "img_curent"/>
            <input type = "hidden" name = "img_current" value = "{!!$product['image']!!}"/>
        </div>
        <div class="form-group">
            <label>Hình ảnh</label>
            <input type="file" name="fImages" value = "{!!old('fImages',isset($product) ? $product["image"] : null)!!}">
        </div>


        <button type="submit" class="btn btn-default">Sửa sản phẩm</button>
        <button type="reset" class="btn btn-default">Reset</button>
    </div>
    <div class = "col-md-1"></div>
    <div class = "col-md-4">
        @foreach($product_image as $key => $item)
            <div  class="form-group" id = "{!!$key!!}">
                <img src = "{!!asset('upload/images/detail/product/'.$item["image"])!!}" class = "img_detail" idHinh = "{!!$item['id']!!}" id="{!!$key!!}"/>
                <a href="javascript:void(0)" type ="button" id ="del_img_demo" class ="btn btn-danger btn-circle icon_del"><i class="fa fa-times"></i></a>
            </div>
        @endforeach
        {{-- Nút thêm ảnh --}}
        <button type = "button" class = "btn btn-primary" id = "addImages">Thêm Hình ảnh</button>
        {{-- Chèn nhiều ảnh --}}
        <div id = "insert"></div>
    </div>
</form>

@endsection
