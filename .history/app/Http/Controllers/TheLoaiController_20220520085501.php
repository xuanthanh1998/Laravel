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
        ['Ten' => 'required|min:3|max:100',
        'TenKhongDau' =>'required'
        ],
        [
            'Ten.required'=>'Bạn chưa nhập tên thể loại',
            'Ten.min'=>'Tên thể loại phải có độ dài từ3chođến 198 ký tự,
'Ten.max'=>'Tên thể loại phải có độ dài từ3cho
           đến 100 ký tự',

        ]);
         $theloai = new TheLoaiModel;
         $theloai ->Ten = $request->Ten;
         $theloai ->TenKhongDau = $request->TenKhongDau;
         $theloai->save();
         return redirect('admin/theloai/them')->with('thongbao','Them thanh cong');
    }

    public function getSua($id){        
        $theloai = TheLoaiModel::query()->where('TenKhongDau', $id)->first();
        return view('admin.theloai.sua', ['theloai'=>$theloai]);
    }

    public function postSua(Request $request,$id){
        
        $theloai = TheLoaiModel::find($id);
        $this->validate($request,
            ['Ten' => "required",
            'TenKhongDau' =>"required"]
        );

        $theloai ->Ten = $request->Ten;
        $theloai ->TenKhongDau = $request->TenKhongDau;
        $theloai->save();
        return redirect('admin/theloai/sua/'.$id)->with('thongbao','sua thanh cong');
    }

    public function getXoa($id){
        $theloai = TheLoaiModel::find($id);
        $theloai-> delete();
        return redirect('admin/theloai/danhsach')->with('thongbao','Xóa Thành công');
    }
}
