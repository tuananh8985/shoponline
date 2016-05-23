<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Admin</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{asset('admin/bower_components/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="{{asset('admin/bower_components/metisMenu/dist/metisMenu.min.css')}}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{asset('admin/dist/css/sb-admin-2.css')}}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{asset('admin/bower_components/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">

    <!-- DataTables CSS -->
    <link href="{{asset('admin/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css')}}" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="{{asset('admin/bower_components/datatables-responsive/css/dataTables.responsive.css')}}" rel="stylesheet">
    {{-- Ckfinder and CKeditor phai gan tren the head --}}
    <script src="{{asset('admin/js/ckeditor/ckeditor.js')}}"></script>

    <script src="{{asset('admin/js/ckfinder/ckfinder.js')}}"></script>

    <script>
        var baseURL = "{!!url('/')!!}";
    </script>
    <script type="text/javascript" src = "{{url('admin/js/func_ckfinder.js')}}"></script>
    {{-- End Ckfinder and CKeditor phai gan tren the head --}}


</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Trang Quản Lý Admin</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> {!!Auth::user()->username!!}</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="{!!url('auth/logout')!!}"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">

                        <li>
                            <a href="{!!url(route('admin.user.list'))!!}"><i class="fa fa-dashboard fa-fw"></i>Trang chủ</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Sản Phẩm<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{!!url(route('admin.cate.list'))!!}">Danh mục sản phẩm</a>
                                </li>
                                <li>
                                    <a href="{!!url(route('admin.product.list'))!!}">Danh sách sản phẩm</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-cube fa-fw"></i> Tin Tức<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{!!url(route('admin.catalogue.list'))!!}">Danh mục Tin Tức</a>
                                </li>
                                <li>
                                    <a href="{!!url(route('admin.new.list'))!!}">Danh sách Tin Tức</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="{!!url(route('admin.deal.list'))!!}"><i class="fa fa-cube fa-fw"></i>Khuyến Mại<span class="fa arrow"></span></a>

                        </li>
                        <li>
                            <a href="{!!url(route('admin.post.list'))!!}"><i class="fa fa-cube fa-fw"></i>Thông Tin Chung<span class="fa arrow"></span></a>

                        </li>
                        <li>
                            <a href="{!!url(route('admin.slide.list'))!!}"><i class="fa fa-cube fa-fw"></i>Slideshow<span class="fa arrow"></span></a>

                        </li>
                        <li>
                            <a href="{!!url(route('admin.contact.list'))!!}"><i class="fa fa-cube fa-fw"></i>Liên Hệ Chung<span class="fa arrow"></span></a>

                        </li>
                        <li>
                            <a href="{!!url(route('admin.message.list'))!!}"><i class="fa fa-cube fa-fw"></i>Đơn Đặt Hàng<span class="fa arrow"></span></a>

                        </li>
                        <li>
                            <a href="{!!url(route('admin.user.list'))!!}"><i class="fa fa-users fa-fw"></i> User<span class="fa arrow"></span></a>
                            {{-- <ul class="nav nav-second-level">
                                <li>
                                    <a href="{!!url(route('admin.user.list'))!!}">List User</a>
                                </li>
                                <li>
                                    <a href="{!!url(route('admin.user.getAdd'))!!}">Add User</a>
                                </li>
                            </ul> --}}
                            <!-- /.nav-second-level -->
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class ="row">
                            @yield('title')
                </div>
                <div class="row">

                    {{-- Hien thong bao khi thực thi --}}
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-12">
                        @if(Session::has('flash_message'))
                            <div class = "alert alert-{!!Session::get('flash_level')!!}">
                                {!!Session::get('flash_message')!!}
                            </div>
                        @endif
                    </div>
                    {{-- Noi dung --}}
                    @yield('content')
                    {{-- End Noi dung --}}
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="{{asset('admin/bower_components/jquery/dist/jquery.min.js')}}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{asset('admin/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="{{asset('admin/bower_components/metisMenu/dist/metisMenu.min.js')}}"></script>

    <!-- Custom Theme JavaScript -->
    <script src="{{asset('admin/dist/js/sb-admin-2.js')}}"></script>

    <!-- DataTables JavaScript -->
    <script src="{{asset('admin/bower_components/DataTables/media/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('admin/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js')}}"></script>

    {{-- MyScript --}}
    <script src="{{asset('admin/js/myscript.js')}}"></script>

</body>

</html>
