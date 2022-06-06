<?php

namespace App\Http\Controllers;

use App\Models\TheLoaiModel;
use Illuminate\Http\Request;

class TheLoaiController extends Controller
{
    //
    public function getDanhSach(){
        $theloai =TheLoaiModel::all();
        return view('admin.theloai.danhsach',['theloai'=> $theloai]);
    }

    public function getThem(){
        return view('admin.theloai.them');
    }
    public function postThem(Request $request){
          // gán dữ liệu gửi lên vào biến data
          $data = $request->all();
         
  
          // Tạo mới user với các dữ liệu tương ứng với dữ liệu được gán trong $data
          Ten::create($data);
          echo"success create user";

    }
    public function getSua(){

    }
}
