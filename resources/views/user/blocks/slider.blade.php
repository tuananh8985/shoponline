<section class="slider">
    <div class="container">
        <div class="flexslider" id="mainslider">
            <ul class="slides">
                <?php
                $product_detail = DB::table('slideshows')->get();
                ?>
                @foreach($product_detail as $item)
                <li>
                    <img src="{!!asset(('upload/images/slide/'.$item->image))!!}" alt="" />
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</section>
