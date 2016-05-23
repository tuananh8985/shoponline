@extends('user.master')
@section('content')
    <div class="span9">
        <div id="maincontainer">
            <section id="product">
                <div class="row">
                    <h1 class="heading1"><span class="maintext">Liên Hệ</span><span class="subtext">Nhập thông tin liên hệ của bạn</span></h1>
                    <div class="row">
                        <div class="span9">
                            <form class="form-horizontal"  method="post" action = "{!!url('lien-he')!!}">
                                <input type="hidden" name="_token" value = "{{csrf_token()}}"/>
                                {{-- Hiển thông báo lỗi như kiểm tra form nhập --}}
                                @include('admin.blocks.error')
                                {{-- End Hiển thông báo lỗi như kiểm tra form nhập --}}

                                <fieldset>
                                    <div class="control-group">
                                        <label for="name" class="control-label">Họ và Tên <span class="required">*</span></label>
                                        <div class="controls">
                                            <input type="text"  class="required" id="name"  name="txtname" value ="{!!old('txtname')!!}">
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label for="name" class="control-label">Số Điện Thoại <span class="required">*</span></label>
                                        <div class="controls">
                                            <input type="text"  class="required" id="name"  name="txtmobile" value ="{!!old('txtmobile')!!}">
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label for="name" class="control-label">Email <span class="required">*</span></label>
                                        <div class="controls">
                                            <input type="text"  class="required" id="name"  name="txtemail" value ="{!!old('txtemail')!!}">
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <label for="message" class="control-label">Tin nhắn</label>
                                        <div class="controls">
                                            <textarea  class="required" rows="6" cols="40" id="message" name="txtmessage">{!!old('txtmessage')!!}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-actions">
                                        <input class="btn btn-orange" type="submit" value="Gửi" id="submit_id">
                                        <input class="btn" type="reset" value="Reset">
                                    </div>
                                </fieldset>
                            </form>
                        </div>

                        <!-- Sidebar Start-->
                        <div class="span9">
                            <aside>
                                <div class="sidewidt">
                                    <h2 class="heading2"><span>Thông Tin Liên Hệ</span></h2>
                                    <?php
                                        $contact =DB::table('contacts')->get();
                                    ?>
                                    @foreach($contact as $item)
                                        <li>Tên công ty:{!!$item->name!!}</li>
                                        <li>Hotline 1:{!!$item->hotline1!!}</li>
                                        <li>Hotline 2:{!!$item->hotline2!!}</li>
                                        <li>Facebook:{!!$item->facebook!!}</li>
                                        <li>Skype:{!!$item->skype!!}</li>
                                        <li>Email:{!!$item->email!!}</li>
                                        <li>Địa Chỉ:{!!$item->title!!}</li>
                                    @endforeach
                                </div>
                            </aside>
                        </div>
                        <!-- Sidebar End-->

                    </div>
                </div>
            </section>
        </div>

    </div>
@endsection
