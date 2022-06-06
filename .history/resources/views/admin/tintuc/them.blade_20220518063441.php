@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Tin Tức
                            <small>Thêm</small>
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
                        <form action="admin/tintuc/them" enctype="multipart/form-data" method="POST">
                        <input type="hidden" name="_token" value="{{csrf_token()}}" />
                        
                            <div class="form-group">
                                <label>Thể Loại</label>
                                <select class="form-control" name="TheLoai" id="TheLoai">
                                    @foreach($theloai as $tl)
                                    <option value="{{$tl->id}}">{{$tl->Ten}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Loại Tin</label>
                                <select class="form-control"  name="LoaiTin" id="LoaiTin">
                                    @foreach($loaitin as $lt)
                                    <option value="{{$lt->id}}">{{$lt->Ten}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Tiêu Đề</label>
                                <input class="form-control" name="TieuDe" placeholder="Please Enter Category Name" />
                            </div>
                           
                            <div class="form-group">
                                <label>Tóm Tắt</label>
                                <textarea id="demo" class="ckeditor" rows="3"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Nội Dung</label>
                                <textarea id="demo" class="ckeditor" rows="3"></textarea>
                            </div>
                           
                            <button type="submit" class="btn btn-default">Category Add</button>
                            <button type="reset" class="btn btn-default">Reset</button>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>

        @endsection
        @secssion('script')
    <script>
        $(document).ready(function(){
             $("#TheLoai").change(function(){
                 var idTheLoai = $(this).val();
                $.get("admin/ajax/loaitin/" +idTheLoai, function(data){
                    $("#LoaiTin").html(data);
                });
             });
            });
    </script>
        @endsecssion