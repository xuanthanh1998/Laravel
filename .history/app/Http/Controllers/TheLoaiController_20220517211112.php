<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TheLoaiModel;


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
    }
    public function getSua(){

    }
}
