<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TheLoaiModel;
use Illuminate\Support\Facades\Validator;


class TheLoaiController extends Controller
{
    public function getDanhSach(){
    $theloai = TheLoaiModel::all();
    return view('admin.theloai.danhsach', ['theloai'=>$theloai]);
    }
    public function getThem(){
        return view('admin.theloai.them');
    }
    public function postThem(Request $request){
        $this->validate($request,
        ['Ten' => "required",
        'TenKhongDau' =>"required"
        ]);
         $theloai = new TheLoaiModel;
         $theloai ->Ten = $request->Ten;
         $theloai ->TenKhongDau = $request->TenKhongDau;
         $theloai->save();
         return redirect('admin/theloai/them')->with('thongbao','Them thanh cong');
    }
    public function getSua($id){            
        $theloai = TheLoaiModel::find($id);
        return view('admin.theloai.sua', ['theloai'=>$theloai]);
    }

    public function postSua(){
        
    }
}
