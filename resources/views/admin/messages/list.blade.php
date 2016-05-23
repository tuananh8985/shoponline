@extends('admin.master')
@section('title')
    <div class ="pull-left">
        <h3><span class="glyphicon glyphicon-folder-open"></span> Đơn Đặt Hàng</h3>
    </div>
@endsection
@section('content')
                    <!-- /.col-lg-12 -->
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Tên</th>
                                <th>Số Điện Thoại</th>
                                <th>Email</th>
                                <th>Tin Nhắn</th>
                                <th>Ngày đăng</th>
                                <th>Xóa</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $stt = 0 ?>
                            @foreach($data as $item)
                                <?php $stt = $stt + 1 ?>
                            <tr class="odd gradeX" align="center">
                                <td>{!! $stt !!}</td>
                                <td>{!!$item["name"]!!}</td>
                                <td>{!!$item["mobile"]!!}</td>
                                <td>{!!$item["email"]!!}</td>
                                <td>{!!$item["messages"]!!}</td>
                                <td>
                                    {!!
                                        \Carbon\Carbon::createFromTimeStamp(strtotime($item["created_at"]))->diffForHumans()
                                    !!}
                                </td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a onclick = "return xacnhanxoa('Ban co chac chan xoa khong')" href="{!!URL::route('admin.message.getDelete',$item['id'])!!}"> Xóa</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
@endsection
