
<aside class="span3">
    <!-- Category-->
    <?php
    $menu_level_1 = DB::table('cates')->where('parent_id',0)->get();
    ?>
    @foreach($menu_level_1 as $item_level_1)
        <div class="sidewidt">
            <h2 class="heading2"><span>{!!$item_level_1->name!!}</span></h2>
            <ul class="nav nav-list categories">
                <?php
                $menu_level_2 = DB::table('cates')->where('parent_id',$item_level_1->id)->get();
                ?>
                @foreach($menu_level_2 as $item_level_2)
                    <li>
                        <a href="{!!URL('loai-san-pham',[$item_level_2->id,$item_level_2->alias])!!}">{!!$item_level_2->name!!}</a>
                    </li>
                @endforeach

            </ul>
        </div>
    @endforeach

    <?php
    $lasted_product = DB::table('products')->select('id','name','image','price','alias')->orderBy('id','DESC')->take(3)->get();
    ?>

    <div class="sidewidt">
        <h2 class="heading2"><span>Sản Phẩm Mới Nhất</span></h2>
        @foreach($lasted_product as $item_lasted)
            <ul class="bestseller">
                <li><a href="{!!url('chi-tiet-san-pham',[$item_lasted->id,$item_lasted->alias])!!}">{!!$item_lasted->name!!}</a></li>
                <li><a href="{!!url('chi-tiet-san-pham',[$item_lasted->id,$item_lasted->alias])!!}"><img width="50" height="80" src="{!!url('upload/images/product/'.$item_lasted->image)!!}" alt="" title=""></a></li>
                <li><a href="{!!url('chi-tiet-san-pham',[$item_lasted->id,$item_lasted->alias])!!}" class="pricenew">{!!number_format($item_lasted->price,0,",",".")!!} đ</a></li>

            </ul>
        @endforeach

    </div>



    {{-- <div class="sidewidt">
    <h2 class="heading2"><span>Best Seller</span></h2>
    <ul class="bestseller">
    <li>
    <img width="50" height="50" src="img/prodcut-40x40.jpg" alt="product" title="product">
    <a class="productname" href="product.html"> Product Name</a>
    <span class="procategory">Women Accessories</span>
    <span class="price">$250</span>
</li>
<li>
<img width="50" height="50" src="img/prodcut-40x40.jpg" alt="product" title="product">
<a class="productname" href="product.html"> Product Name</a>
<span class="procategory">Electronics</span>
<span class="price">$250</span>
</li>
<li>
<img width="50" height="50" src="img/prodcut-40x40.jpg" alt="product" title="product">
<a class="productname" href="product.html"> Product Name</a>
<span class="procategory">Electronics</span>
<span class="price">$250</span>
</li>
</ul>
</div> --}}

<div class="sidewidt">
    <h2 class="heading2"><span>Hỗ Trợ Trực Tuyến</span></h2>
    <div class="flexslider" id="mainslider">
        <img src="{!!url('user/img/hotro.png')!!}" alt="" />
        <div>
            <?php
            $hotro =DB::table('contacts')->get();
            ?>
            @foreach($hotro as $item)
                <div>Tư vấn 1:{!!$item->hotline1!!}</div>
                <div>Tư vấn 2:{!!$item->hotline2!!}</div>
                <div class="face"><img src="{!!url('user/img/email.png')!!}"/><span class="bold">Facebook</span>:{!!$item->facebook!!}</div>
                <div class="skype"><img src="{!!url('user/img/sky.png')!!}"/><span class="bold">Skype</span>:{!!$item->skype!!}</div>
                <div class="email"><img src="{!!url('user/img/email.png')!!}"/><span class="bold">Email</span>:{!!$item->email!!}</div>
            @endforeach
        </div>
    </div>
</div>
</aside>
