@extends('admin.master')
@section('title')
    <h1>Thêm người dùng</h1>
@endsection
@section('content')
                    <!-- /.col-lg-12 -->

                    <div class="col-lg-7" style="padding-bottom:120px">
                        {{-- Hiển thông báo lỗi như kiểm tra form nhập --}}
                        @include('admin.blocks.error')
                        {{-- End Hiển thông báo lỗi như kiểm tra form nhập --}}
                        <form action="" method="POST">
                            <input type = "hidden" name="_token" value ="{!!csrf_token()!!}"/>
                            <div class="form-group">
                                <label>Tên</label>
                                <input class="form-control" name="txtUser" placeholder="Please Enter Username" value ="{!!old('txtUser')!!}"/>
                            </div>
                            <div class="form-group">
                                <label>Mật khẩu</label>
                                <input type="password" class="form-control" name="txtPass" placeholder="Please Enter Password" />
                            </div>
                            <div class="form-group">
                                <label>Nhập lại mật khẩu</label>
                                <input type="password" class="form-control" name="txtRePass" placeholder="Please Enter RePassword" />
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" name="txtEmail" placeholder="Please Enter Email" value ="{!!old('txtEmail')!!}"/>
                            </div>
                            <div class="form-group">
                                <label>User Level</label>
                                <label class="radio-inline">
                                    <input name="rdoLevel" value="1" checked="" type="radio">Admin
                                </label>
                                <label class="radio-inline">
                                    <input name="rdoLevel" value="2" type="radio">Member
                                </label>
                            </div>
                            <button type="submit" class="btn btn-default">Thêm user</button>
                            <button type="reset" class="btn btn-default">Reset</button>
                        <form>
                    </div>
@endsection
