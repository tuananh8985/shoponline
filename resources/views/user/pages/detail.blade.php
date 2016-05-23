@extends('user.master')
@section('description',"Day la trang home")
    @section('content')
    <style>
    #producttag ul{
            margin: 26px;
    }
    </style>
        <div class="span9">
            <div id="maincontainer">
                <div class="row">
                    <div class="span5">
                        <ul class="thumbnails mainimage">
                            <li class="span5">
                                <a  rel="position: 'inside' , showTitle: false, adjustX:-4, adjustY:-4" class="thumbnail cloud-zoom" href="{!!url('upload/images/product/'.$product_detail->image)!!}">
                                    <img src="{!!url('upload/images/product/'.$product_detail->image)!!}" alt="" title=``"">
                                </a>
                            </li>
                            @foreach($image as $item_image)
                                <li class="span5">
                                    <a  rel="position: 'inside' , showTitle: false, adjustX:-4, adjustY:-4" class="thumbnail cloud-zoom" href="{!!url('upload/images/detail/product/'.$item_image->image)!!}">
                                        <img  src="{!!url('upload/images/detail/product/'.$item_image->image)!!}" alt="" title="">
                                    </a>
                                </li>
                            @endforeach

                        </ul>
                        <ul class="thumbnails mainimage">
                            <li class="producthtumb">
                                <a class="thumbnail" >
                                    <img src="{!!url('upload/images/product/'.$product_detail->image)!!}" alt="" title=``"">
                                </a>
                            </li>
                            @foreach($image as $item_image)
                                <li class="producthtumb">
                                    <a class="thumbnail" >
                                        <img  src="{!!url('upload/images/detail/product/'.$item_image->image)!!}" alt="" title="">
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="span3 pull-right">
                        <div>
                            <h4>Tên sản phẩm:</h4>
                            <h5 class="productname"><span class="">{!!$product_detail->name!!}</span></h5>
                        </div>
                        <div>
                            <h4>Giá sản phẩm:</h4>
                            <h5 class="productname"><span class="">{!!$product_detail->name!!}</span></h5>
                        </div>
                        <div>
                            <ul class="productpagecart">
                                <li><a class="cart" href="{!!url('mua-hang',[$product_detail->id,$product_detail->alias])!!}">Mua hàng</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- Right Details-->

                </div>
                <div class="row">
                    <div class="span7">
                        <div class="row">
                            <div class="span7">

                                <div class="productprice">
                                    <!-- Product Description tab & comments-->
                                    <div class="productdesc">
                                        <ul class="nav nav-tabs" id="myTab">
                                            <li class="active"><a href="#description">Khuyến Mãi</a>
                                            </li>
                                            <li><a href="#specification">Thông số kỹ thuật</a>
                                            </li>
                                            <li><a href="#review">Đánh giá</a>
                                            </li>
                                            <li><a href="#producttag">Sản phẩm tương tự</a>
                                            </li>
                                        </ul>
                                        <div class="tab-content">
                                            <div class="tab-pane active" id="description">

                                                {!!$product_detail->offer!!}
                                            </div>
                                            <div class="tab-pane " id="specification">
                                                <ul class="productinfo">
                                                    {!!$product_detail->parameter!!}
                                                </ul>
                                            </div>
                                            <div class="tab-pane" id="review">
                                                {!!$product_detail->description!!}
                                            </div>


                                            <div class="tab-pane" id="producttag">
                                                <div class ="row">
                                                    @foreach($product_same as $item)
                                                        <ul class="span2">
                                                            <a href="{!!url('chi-tiet-san-pham',[$item->id,$item->alias])!!}">
                                                                <img src="{!!url('upload/images/product/'.$item->image)!!}" alt="" title=``"">
                                                            </a>

                                                            <li><a href="#"><i class="icon-tag"></i>{!!$item->name!!}</a>
                                                            </li>
                                                        </ul>
                                                    @endforeach
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endsection
