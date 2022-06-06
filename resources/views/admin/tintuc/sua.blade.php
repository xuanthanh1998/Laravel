@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Tin Tức
                            <small>{{$tintuc->TieuDe}}</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                    @if(count($errors)> 0)
                        <div class="alert alert-danger">
                            @foreach($errors -> all() as $err)
                                {{$err}}<br>
                             @endforeach
                        </div>
                    @endif

                    @if(session('thongbao'))
                        <div class="alert alert-success">
                            {{session('thongbao')}}
                        </div>

                    @endif
                        <form action="admin/tintuc/sua/{{$tintuc->id}}" enctype="multipart/form-data" method="POST">
                        <input type="hidden" name="_token" value="{{csrf_token()}}" />
                        
                            <div class="form-group">
                                <label>Thể Loại</label>
                                <select class="form-control" name="TheLoai" id="TheLoai">
                                    @foreach($theloai as $tl)
                                    <option 
                                 
                                    @if($tintuc->loaitin->theloai->id == $tl->id)
                                        {{"selected"}}
                                    @endif
                                    value="{{$tl->id}}">{{$tl->Ten}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Loại Tin</label>
                                <select class="form-control"  name="LoaiTin" id="LoaiTin">
                                    
                                @foreach($loaitin as $lt)
                                    <option 
                                   
                                    @if($tintuc->loaitin->id == $lt->id)
                                        {{"selected"}}
                                    @endif
                                    value="{{$lt->id}}">{{$lt->Ten}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Tiêu Đề</label>
                                <input class="form-control" name="TieuDe" value="{{$tintuc->TieuDe}}" placeholder="Please Enter Category Name" />
                            </div>
                            <div class="form-group">
                                <label>Tiêu Đề không dấu</label>
                                <input class="form-control" name="TieuDeKhongDau" value="{{$tintuc->TieuDeKhongDau}}"  placeholder="Please Enter Category Name" />
                            </div>
                           
                            <div class="form-group">
                                <label>Tóm Tắt</label>
                                <textarea id="demo" class="ckeditor" rows="3" name="TomTat"  >"{{$tintuc->TomTat}}"</textarea>
                            </div>
                            <div class="form-group">
                                <label>Nội Dung</label>
                                <textarea id="demo" class="ckeditor" rows="3" name="NoiDung" >"{{$tintuc->NoiDung}}" </textarea>
                            </div>
                           
                            <button type="submit" class="btn btn-default">Sửa Tin </button>
                            <button type="reset" class="btn btn-default">Reset</button>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>

        @endsection
       