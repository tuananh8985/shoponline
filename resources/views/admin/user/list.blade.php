@extends('admin.master')
@section('title')
    <div class ="pull-left">
        <h3><span class="glyphicon glyphicon-folder-open"></span> Danh sách người dùng</h3>
    </div>
    <div class ="pull-right">
        <h3><span class="glyphicon glyphicon-plus-sign"></span><a href="{!!url(route('admin.user.getAdd'))!!}">Thêm mới</a></h3>
    </div>
@endsection
@section('content')
    <!-- /.col-lg-12 -->
    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
        <thead>
            <tr align="center">
                <th>ID</th>
                <th>Username</th>
                <th>Level</th>
                <th>Delete</th>
                <th>Edit</th>
            </tr>
        </thead>
        <tbody>
            <?php $stt = 0 ?>
            @foreach($user as $item_user)
                <?php $stt =$stt + 1?>
                {{--  Chuan men --}}
                <tr class="odd gradeX" align="center">
                    <td>{!!$stt!!}</td>
                    <td>{!!$item_user['username']!!}</td>
                    <td>
                        @if($item_user['id'] == 2)
                            Super Admin
                        @elseif($item_user['level'] == 1)
                            Admin
                        @else
                            Member
                        @endif
                    </td>
                    <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a onclick = "return xacnhanxoa('Ban co chac chan xoa khong')" href="{!!URL::route('admin.user.getDelete',$item_user['id'])!!}"> Xóa</a></td>
                    <td class="center"><i class="fa fa-pencil fa-fw"></i><a href="{!!URL::route('admin.user.getEdit',$item_user['id'])!!}">Sửa</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
