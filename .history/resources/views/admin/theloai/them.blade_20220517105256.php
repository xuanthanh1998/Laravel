@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Thể loại
                            <small>Thêm</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                    <ul>
    @foreach($errors->all() as $error)
        <li>
            {{$error}}
        </li>
    @endforeach
    </ul>
</div>
                        <form action="{{route('theloai.store')}} " method="POST">
                            @csrf 
                           
                            <div class="form-group">
                                <label>Tên Thể Loại</label>
                                <input class="form-control" name="txtCateName" value="{{old('Ten')}}" />
                            </div>
                        
                            <button type="submit" class="btn btn-default">Thêm Thể loại</button>
                            <button type="reset" class="btn btn-default">Reset</button>
                        </form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>

        @endsection