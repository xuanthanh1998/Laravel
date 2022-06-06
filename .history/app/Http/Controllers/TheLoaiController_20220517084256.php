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
        echo $request->Ten;

    }
    public function getSua(){

    }
}
