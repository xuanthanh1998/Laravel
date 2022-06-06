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
        $request->validate([
            'Ten' => 'required',
            'TenKhongDau' => 'required',
        ]);
    
        Post::create($request->all());
     
        return redirect()->route('admin.theloai.them')
                        ->with('success','Post created successfully.');
    }

    }
    public function getSua(){

    }
}
