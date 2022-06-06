@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Thể Loại
                            <small>Edit</small>
                        </h1>
                    </div>
            <div>
                <ul>
                    @foreach($errors->all() as $error)
                        <li>
                            {{$error}}
                        </li>
                    @endforeach
                </ul>
            </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                    <form action="{{route('theloai.update', ['theloai'=>$theloai->id])}}" method="POST">
                    @csrf 
                    @method('PUT')
                        
                            <div class="form-group">
                                <label>Tên</label>
                                <input class="form-control" name="Ten" placeholder="Please Enter Category Name" value="{{count($errors)?old('Ten'):($theloai->Ten)}}"/>
                            </div>
                            <div class="form-group">
                                <label>Tên Không Dấu</label>
                                <input class="form-control" name="Ten" placeholder="Please Enter Category Name" value="{{count($errors)?old('Ten'):($theloai->Ten)}}"/>
                            </div>
                            
                            <button type="submit" class="btn btn-default">Sửa</button>
                            <button type="reset" class="btn btn-default">Reset</button>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
@endsection