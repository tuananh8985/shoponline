<div id="categorymenu">
    <nav class="subnav">
        <ul class="nav-pills categorymenu">
            <li><a href="{!!url('/')!!}">Trang chủ</a>
            </li>

            <?php
            $menu_level_1 = DB::table('posts')->get();
            ?>
            @foreach($menu_level_1 as $item_level_1)

                <li><a href="{!!url('gioi-thieu',[$item_level_1->id,$item_level_1->alias])!!}">Giới Thiệu</a>
                </li>
            @endforeach

            <?php
            $menu_level_1 = DB::table('cates')->where('parent_id',0)->get();
            ?>

            @foreach($menu_level_1 as $item_level_1)
                <li><a href="">{!!$item_level_1->name!!}</a>
                    <div>
                        <ul>
                            <?php
                            $menu_level_2 = DB::table('cates')->where('parent_id',$item_level_1->id)->get();
                            ?>
                            @foreach($menu_level_2 as $item_level_2)
                                <li><a href="{!!URL('loai-san-pham',[$item_level_2->id,$item_level_2->alias])!!}">{!!$item_level_2->name!!}</a></li>
                            @endforeach

                        </ul>
                    </div>
                </li>
            @endforeach
        
            <?php
            $menu_level_1 = DB::table('catalogues')->where('parent_id',0)->get();
            ?>
            <li><a href="">Tin Tức</a>

                <div>
                    <ul>
                        @foreach($menu_level_1 as $item_level_1)
                            <li><a href="{!!URL('loai-tin-tuc',[$item_level_1->id,$item_level_1->alias])!!}">{!!$item_level_1->name!!}</a></li>
                        @endforeach

                    </ul>
                </div>

            </li>

            <li><a href="{!!url('lien-he')!!}">Liên Hệ</a>
            </li>
        </ul>
    </nav>
</div>
