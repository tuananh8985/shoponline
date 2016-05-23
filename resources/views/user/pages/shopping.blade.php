@extends('user.master')
@section('content')
        <div class="span9">
            <div id="maincontainer">
                <section id="product">
                    <div class="row">
                        <!--  breadcrumb -->

                        <h1 class="heading1"><span class="maintext"> Shopping Cart</span></h1>
                        <!-- Cart-->
                        <div class="cart-info">
                            <table class="table table-striped table-bordered">
                                <tr>
                                    <th class="image">Ảnh</th>
                                    <th class="name">Tên Sản Phẩm</th>
                                    <th class="quantity">Số lượng</th>
                                    <th class="total">Hành Động</th>
                                    <th class="price">Đơn Giá</th>
                                    <th class="total">Tổng Giá</th>

                                </tr>
                                <form method="POST" action ="">
                                    <input type ="hidden" name="_token" value = "{!!csrf_token()!!}"/>
                                @foreach($content as $item)
                                    <tr>
                                        <td class="image"><a href="#"><img title="product" alt="product" src="{!!asset('upload/images/product/'.$item['options']['img'])!!}" height="50" width="50"></a></td>
                                        <td  class="name"><a href="#">{!!$item['name']!!}</a></td>
                                        <td class="quantity"><input class = "span1 qty" type="text" size="1" value='{!!$item["qty"]!!}' name="quantity[40]" />

                                        </td>
                                        <td class="total"> <a href="" class="updatecart" id ='{!!$item["rowid"]!!}'><img class="tooltip-test" data-original-title="Update" src="{!!url('user/img/update.png')!!}" alt=""></a>
                                            <a href="{!!url('xoa-san-pham',['id'=>$item['rowid']])!!}"><img class="tooltip-test" data-original-title="Remove"  src="{!!url('user/img/remove.png')!!}" alt=""></a></td>


                                            <td class="price">{!!number_format($item['price'],0,",",".") !!}</td>
                                            <td class="total">{!!number_format($item['price']*$item["qty"],0,",",".")!!}</td>

                                        </tr>
                                    @endforeach()
                                </form>

                                </table>
                            </div>
                            <div class="row">
                                <div class="pull-right">
                                    <div class="span4 pull-right">
                                        <table class="table table-striped table-bordered ">
                                            <tr>
                                                <td><span class="extra bold totalamout">Tổng Tiền :</span></td>
                                                <td><span class="bold totalamout">{!!number_format($total,0,",",".") !!} </span></td>
                                            </tr>
                                        </table>
                                        <a href="{!!url(route('home'))!!}"><input type="submit" value="Tiếp Tục Mua Hàng" class="btn btn-orange pull-right mr10"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
        </div>
    @endsection
