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
            'description' => 'required',
        ]);
    
        Post::create($request->all());
     
        return redirect()->route('posts.index')
                        ->with('success','Post created successfully.');
    }

    }
    public function getSua(){

    }
}
