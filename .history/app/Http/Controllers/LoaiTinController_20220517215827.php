<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LoaiTinModel;

class LoaiTinController extends Controller
{
    public function getDanhSach(){
    $loaitin = LoaiTinModel::all();
    return view('admin.theloai.danhsach', ['theloai'=>$loaitin]);
    }
    public function getThem(){
        return view('admin.theloai.them');
    }
    public function postThem(Request $request){
        $this->validate($request,
        ['Ten' => "required",
        'TenKhongDau' =>"required"
        ]);
         $loaitin = new LoaiTinModel();
         $loaitin ->Ten = $request->Ten;
         $loaitin ->TenKhongDau = $request->TenKhongDau;
         $loaitin->save();
         return redirect('admin/theloai/them')->with('thongbao','Them thanh cong');
    }
    public function getSua($id){            
        $loaitin = LoaiTinModel()::find($id);
        return view('admin.theloai.sua', ['theloai'=>$loaitin]);
    }

    public function postSua(Request $request,$id){
        $loaitin = LoaiTinModel::find($id);
        $this->validate($request,
        ['Ten' => "required",
        'TenKhongDau' =>"required"]
    );
    $loaitin ->Ten = $request->Ten;
    $loaitin ->TenKhongDau = $request->TenKhongDau;
    $loaitin->save();
    return redirect('admin/theloai/sua/'.$id)->with('thongbao','sua thanh cong');
    }

    public function getXoa($id){
        $loaitin = LoaiTinModel()::find($id);
        $loaitin-> delete();
        return redirect('admin/theloai/danhsach')->with('thongbao','Xóa Thành công');
    }
}
