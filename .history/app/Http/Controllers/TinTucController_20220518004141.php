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
        return view('admin.tintuc.them');
       
    }
    public function postThem(Request $request){
      
    }
    public function getSua($id){   
      
    }

    public function postSua(Request $request,$id){
       
    }

    public function getXoa($id){
       
    }
}
