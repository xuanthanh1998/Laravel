<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TheLoaiModel;
use Illuminate\Support\Facades\Validator;
use App\Events\NewTitle;
use Event;
use Illuminate\Support\Facades\Log;


class TheLoaiController extends Controller
{
    

    public function getDanhSach(){
        $theloai = TheLoaiModel::all();
        return view('admin.theloai.danhsach', ['theloai'=>$theloai]);
    }

    public function getThem(){
        return view('admin.theloai.them');
    }

    public function postThem(Request $request,){
        $data = $request->all();
        $newPost = TheLoaiModel::create($data);
        if(!newPost) {
            Log::channel('post_history')->info($this->getDataLog($request, $ddat); 
        }
        return response('success', 200);


        $this->validate($request,
        ['Ten' => 'required',
        'TenKhongDau' =>'required'
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
        ['Ten' => 'required|min:3|max:100',
        'TenKhongDau' =>'required'
        ],
        [
            'Ten.required'=>'Bạn chưa nhập tên thể loại',
           
            'TenKhongDau.required'=>'Bạn chưa nhập tên thể loại không dấu',
            'Ten.min'=>'Tên thể loại phải có độ dài từ 3 cho đến 100 ký tự',
            'Ten.max'=>'Tên thể loại phải có độ dài từ 3 cho đến 100 ký tự',

        ]);

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

    // public function show(TheLoaiModel $theloai)
    // {
    //     $this->authorize('view', $theloai);
        
    //     // Logic to show post
    // }
}
