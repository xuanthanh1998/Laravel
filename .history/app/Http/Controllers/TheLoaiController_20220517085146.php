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
          
        $rules=[
            'title' => "required"
        ];
        $validator = Validator::make($request->all(), $rules);
        if($validator->fails())
        {
            return redirect()-> route('news.create')->withErrors($validator)->withInput();
        }else{
            $news = new News;
            $news -> title = $request->title;
            $news -> content = $request->content;
            
            $news->save();
            return redirect()->route('news.index');

        }

    }
    public function getSua(){

    }
}
