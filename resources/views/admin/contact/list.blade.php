@extends('admin.master')
@section('title')
    <div class ="pull-left">
        <h3><span class="glyphicon glyphicon-folder-open"></span> Thông Tin Liên Hệ</h3>
    </div>
    <div class ="pull-right">
        <h3><span class="glyphicon glyphicon-plus-sign"></span><a href="{!!url(route('admin.contact.getAdd'))!!}">Thêm mới</a></h3>
    </div>
@endsection
@section('content')
                    <!-- /.col-lg-12 -->
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Name</th>
                                <th>Date</th>
                                <th>Category</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $stt = 0 ?>
                            @foreach($data as $item)
                                <?php $stt = $stt + 1 ?>
                            <tr class="odd gradeX" align="center">
                                <td>{!! $stt !!}</td>
                                <td>{!!$item["name"]!!}</td>
                                <td>
                                    {!!
                                        \Carbon\Carbon::createFromTimeStamp(strtotime($item["created_at"]))->diffForHumans()
                                    !!}
                                </td>
                                <td>
                                    <?php
                                        $cate = DB::table('cates')->where('id',$item["cate_id"])->first();
                                    ?>
                                    @if(!empty($cate->name))
                                        {!!$cate->name!!}
                                    @endif
                                </td>

                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a onclick = "return xacnhanxoa('Ban co chac chan xoa khong')" href="{!!URL::route('admin.contact.getDelete',$item['id'])!!}"> Delete</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{!!URL::route('admin.contact.getEdit',$item['id'])!!}">Edit</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
@endsection
