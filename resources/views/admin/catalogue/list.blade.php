@extends('admin.master')
@section('title')
    <div class ="pull-left">
        <h3><span class="glyphicon glyphicon-folder-open"></span> Danh mục tin tức</h3>
    </div>
    <div class ="pull-right">
        <h3><span class="glyphicon glyphicon-plus-sign"></span><a href="{!!url(route('admin.catalogue.getAdd'))!!}">Thêm mới</a></h3>
    </div>
@endsection
@section('content')
                    <!-- /.col-lg-12 -->
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>STT</th>
                                <th>Tên</th>
                                <th>Danh mục cha</th>
                                <th>Hiện trạng</th>
                                <th>Xóa</th>
                                <th>Sửa</th>
                            </tr>
                        </thead>
                        <tbody>
                           <?php $stt = 0 ?>
                           @foreach($data as $item)
                           <?php $stt = $stt + 1?>
                            <tr class="odd gradeX" align="center">
                                <td>{!! $stt !!}</td>
                                <td>{!!$item["name"]!!}</td>

                                <td>
                                    @if($item["parent_id"] == 0)
                                    {!! "None" !!}
                                    @else
                                    <?php
                                    $parent = DB::table('cates')->where('id', $item['parent_id'])->first();
                                    echo $parent->name;
                                    ?>
                                    @endif
                                </td>
                                <td>Hiện</td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a onclick = "return xacnhanxoa('Ban co chac chan xoa khong')" href="{!!URL::route('admin.catalogue.getDelete',$item['id'])!!}"> Xóa</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{!!URL::route('admin.catalogue.postEdit',$item['id'])!!}">Sửa</a></td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
@endsection
