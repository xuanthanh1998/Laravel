<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LoaiTinModel;
use App\Models\TheLoaiModel;
use App\Models\TinTucModel;

class AjaxController extends Controller
{
    public function getLoaiTin($idTheLoai){
        $loaitin = LoaiTinModel::where('idTheLoai',$idTheLoai)->get();
        foreach($loaitin as $lt){
           echo" <option value='" .$lt->id."'>".$lt->Ten."</option>";
        }
    }
}
