<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LoaiTinModel;
use App\Models\TheLoaiModel;
use App\Models\TinTucModel;

class TinTucController extends Controller
{
    public function getDanhSach(){
    $tintuc = TinTucModel::orderBy('id','DESC')->get();
    return view('admin.tintuc.danhsach', ['tintuc'=>$tintuc]);
    }

    public function getThem(){
        $theloai = TheLoaiModel::all();
        $loaitin = LoaiTinModel::all();
        return view('admin.tintuc.them',['theloai'=>$theloai,'loaitin'=>$loaitin]);
       
    }
    
    public function postThem(Request $request){
      $this->validate($request,
      [
          'LoaiTin'=> 'required|min:3|max:100',
          'TieuDe'=>"required",
          'TomTat'=>"required",
          'NoiDung'=>"required"
      ]);
        $tintuc = new TinTucModel;
        $tintuc->TieuDe = $request->TieuDe;
        $tintuc->TieuDeKhongDau = $request->TieuDeKhongDau;
        $tintuc-> idLoaiTin = $request->LoaiTin;
        $tintuc-> TomTat = $request-> TomTat;
        $tintuc-> NoiDung = $request-> NoiDung;
        $tintuc -> save();
        return redirect('admin/tintuc/them')->with('thongbao','Them thanh cong');
                                            
                                    
    }
    public function getSua($id){   
    $theloai = TheLoaiModel::all();

    $loaitin = LoaiTinModel::all();
    
    $tintuc = TinTucModel::query()->where('TenKhongDau', $id)->first();
      return view('admin/tintuc/sua' ,['loaitin'=>$loaitin, 'theloai'=>$theloai, 'tintuc'=>$tintuc]);
    }

    public function postSua(Request $request,$id){
       $tintuc = TinTucModel::find($id);
       $this->validate($request,
      [
          'LoaiTin'=> "required",
          'TieuDe'=>"required",
          'TomTat'=>"required",
          'NoiDung'=>"required"
      ]);
       
        $tintuc->TieuDe = $request->TieuDe;
        $tintuc->TieuDeKhongDau = $request->TieuDeKhongDau;
        $tintuc-> idLoaiTin = $request->LoaiTin;
        $tintuc-> TomTat = $request-> TomTat;
        $tintuc-> NoiDung = $request-> NoiDung;
        $tintuc -> save();
        return redirect('admin/tintuc/sua'.$id)->with('thongbao','sua thanh cong');
                                            
    }

    public function getXoa($id){
        $tintuc =TinTucModel::find($id);
        $tintuc-> delete();
        return redirect('admin/tintuc/danhsach')->with('thongbao','X??a Th??nh c??ng');
    }
}
