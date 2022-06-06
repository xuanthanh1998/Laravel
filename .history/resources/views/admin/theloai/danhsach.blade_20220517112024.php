@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Thể Loại
                            <small>Danh Sách</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Tên Thể Loại</th>
                                <th>Tên Không dấu</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($theloai as $tl)
                            <tr class="odd gradeX" align="center">
                                <td>{{$tl->id}}</td>
                                <td>{{$tl->Ten}}</td>
                                <td>{{$tl->TenKhongDau}}</td>
                                
                                <td class="center"><i class="  fa fa-pencil fa-fw"></i><a href="{{route('admin.theloai.edit',['theloai'=>$tl->id])}}">Sửa </a></td>
                                <td class="center"><i class="fa fa-trash-o fa-fw"></i>  <form action="{{route('admin.theloai.destroy',['theloai'=>$tl->id])}}" method="POST" onsubmit="return confirm('Bạn thật sự muốn xóa?')">
                    @method('DELETE')
                    @csrf
                    <input type="submit" value="Xóa">

                </form></td>
                            </tr>
                           @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
@endsection