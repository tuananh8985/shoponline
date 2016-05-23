@extends('user.master')
@section('description',"Day la trang home")
    @section('content')
        <div id="maincontainer">
            <section id="product">
                <div class="span9">
                    <!-- Category Products-->
                    <section id="category">
                        <div class="row">
                            <div class="span9">
                                <!-- Category-->
                                <section id="categorygrid">
                                    <ul class="thumbnails grid">
                                        @foreach($product_cate as $item_product_cate)
                                            <li class="span3">
                                                <a class="prdocutname" href="{!!url('chi-tiet-san-pham',[$item_product_cate->id,$item_product_cate->alias])!!}">{!!$item_product_cate->name!!}</a>
                                                <div class="thumbnail">
                                                    <span class="offer tooltip-test" >Offer</span>
                                                    <a href="{!!url('chi-tiet-san-pham',[$item_product_cate->id,$item_product_cate->alias])!!}"><img alt="" src="{!!url('upload/images/product/'.$item_product_cate->image)!!}"></a>
                                                    <div class="pricetag">
                                                        <span class="spiral"></span><a href="{!!url(route('muahang',[$item_product_cate->id,$item_product_cate->alias]))!!}" class="productcart">Mua Hàng</a>

                                                        <div class="price">
                                                            <div class="pricenew">{!!number_format($item_product_cate->price,0,",",".")!!} đ</div>
                                                            <div class="priceold"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                    <div class="pagination pull-right">
                                        <ul>
                                            @if($product_cate->currentPage() != 1)
                                                <li><a href="{!!str_replace('/?','?',$product_cate->url($product_cate->currentPage() - 1))!!}">Prev</a></li>
                                            @endif
                                            @for($i = 1;$i <= $product_cate->lastPage();$i = $i + 1)
                                                <li class="{!!($product_cate->currentPage() == $i) ? 'active' : ''!!}">
                                                    <a href="{!!str_replace('/?','?',$product_cate->url($i))!!}">{!!$i!!}</a>
                                                </li>
                                            @endfor

                                            @if($product_cate->currentPage() != $product_cate->lastPage())
                                                <li><a href="{!!str_replace('/?','?',$product_cate->url($product_cate->currentPage() + 1))!!}">Next</a></li>
                                            @endif
                                        </ul>
                                    </div>
                                </section>
                            </div>
                        </div>
                    </section>
                </div>
            </section>
        </div>
    @endsection
