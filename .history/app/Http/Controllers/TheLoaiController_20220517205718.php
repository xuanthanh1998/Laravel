<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TheLoaiModel;


class TheLoaiController extends Controller
{
    public function getDanhSach(){
    $theloai = TheLoaiModel::all();
    return view('admin.theloai.danhsach', ['theloai'=>$theloai])
    }
}
