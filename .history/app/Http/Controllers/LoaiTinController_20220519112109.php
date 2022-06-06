<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LoaiTinModel;
use App\Models\TheLoaiModel;

class LoaiTinController extends Controller
{
    public function getDanhSach(){
    $loaitin = LoaiTinModel::all();
    return view('admin.loaitin.danhsach', ['loaitin'=>$loaitin]);
    }
    public function getThem(){
        $theloai = TheLoaiModel::all();
        return view('admin.loaitin.them', ['theloai'=>$theloai]);
    }
    public function postThem(Request $request){
        $this->validate($request,
        ['Ten' => "required",
        'TheLoai'=>"required",
        'TenKhongDau' =>"required"
        ]);
         $loaitin = new LoaiTinModel;
         $loaitin ->Ten = $request->Ten;
         $loaitin ->TenKhongDau = $request->TenKhongDau;
         $loaitin ->idTheLoai = $request->TheLoai;
         $loaitin->save();
         return redirect('admin/loaitin/them')->with('thongbao','Them thanh cong');
    }
    public function getSua($id){   
        $theloai = TheLoaiModel::all();     
        $loaitin = LoaiTinModel::query()->where('TenKhongDau', $id)->first();
        return view('admin.loaitin.sua', ['loaitin'=>$loaitin, 'theloai'=>$theloai]);
    }

    public function postSua(Request $request,$id){
        $this->validate($request,
        ['Ten' => "required",
        'TheLoai'=>"required",
        'TenKhongDau' =>"required"
        ]);
         $loaitin = LoaiTinModel::find($id);
         $loaitin ->Ten = $request->Ten;
         $loaitin ->TenKhongDau = $request->TenKhongDau;
         $loaitin ->idTheLoai = $request->TheLoai;
         $loaitin->save();
         return redirect('admin/loaitin/sua/'.$id)->with('thongbao','Sửa thanh cong');
    }

    public function getXoa($id){
        $loaitin = LoaiTinModel::find($id);
        $loaitin-> delete();
        return redirect('admin/loaitin/danhsach')->with('thongbao','Xóa Thành công');
    }
}
