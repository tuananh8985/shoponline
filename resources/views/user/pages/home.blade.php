@extends('user.master')
@section('description',"Day la trang home")
    @section('content')

        <div class="span9">
            <!-- Category Products-->
            <section id="category">
                <div class="row">
                    <div class="span9">
                        <!-- Category-->
                        <section id="categorygrid">
                            <?php
                            $menu_level_1 = DB::table('cates')->where('parent_id',0)->get();
                            ?>
                            @foreach($menu_level_1 as $item_level_1)
                                {{-- <a class="prdocutname" href="product.html">{!!$item_level_1->name!!}</a> --}}
                                <h2><span class="glyphicon glyphicon-play-circle"></span>{!!$item_level_1->name!!}</h2>
                                <ul class="thumbnails grid">
                                        <?php
                                        $menu_level_2 = DB::table('cates')->where('parent_id',$item_level_1->id)->get();
                                        ?>
                                        @foreach($menu_level_2 as $item_level_2)
                                            <?php
                                            $menu_level_3 = DB::table('products')->where('cate_id',$item_level_2->id)->get();
                                            ?>
                                                @foreach($menu_level_3 as $item_level_3)
                                                        <li class="span3">

                                                            <a class="prdocutname" href="{!!url('chi-tiet-san-pham',[$item_level_3->id,$item_level_3->alias])!!}">{!!$item_level_3->name!!}</a>
                                                            <div class="thumbnail">
                                                                <span class="offer tooltip-test" >Offer</span>
                                                                <a href="{!!url('chi-tiet-san-pham',[$item_level_3->id,$item_level_3->alias])!!}"><img alt="" src="{!!url('upload/images/product/'.$item_level_3->image)!!}"></a>
                                                                <div class="pricetag">
                                                                    <span class="spiral"></span><a href="{!!url(route('muahang',[$item_level_3->id,$item_level_3->alias]))!!}" class="productcart">Mua Hàng</a>
                                                                    <div class="price">
                                                                        <div class="pricenew">{!!number_format($item_level_3->price,0,",",".")!!} đ</div>
                                                                        <div class="priceold"></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>

                                                    @endforeach
                                        @endforeach
                                </ul>
                            @endforeach

        
                        </section>
                    </div>
                </div>
            </section>
        </div>


    @endsection
