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
        ['Ten' => 'required min:3|max:100'
        ],
        ['Ten.required'=>'Bạn chưa nhập tên thể loại',
         'Ten.min'=>'Tên thể loại phải có độ dài từ3cho
           đến 100 ký tự',
        'Ten.max'=>'Tên thể loại phải có độ dài từ3cho
            đến 100 ký tự',
         ]);
         $theloai = new TheLoaiModel;
         $theloai ->Ten = $request->Ten;
         $theloai ->TenKhongDau = $request->TenKhongDau;
         $theloai->save();
         return redirect('admin/theloai/them')
    }
    public function getSua(){

    }
}
