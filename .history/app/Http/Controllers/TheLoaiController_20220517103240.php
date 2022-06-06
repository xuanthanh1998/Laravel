<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TheLoaiModel;
use Illuminate\Support\Facades\Validator;

class TheLoaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $theloai= TheLoaiModel::all();
        return view('admin.theloai.danhsach',['theloai'=>$theloai]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.theloai.them');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules=[
            'Ten' => "required"
        ];
        $validator = Validator::make($request->all(), $rules);
        if($validator->fails())
        {
            return redirect()-> route('theloai.create')->withErrors($validator)->withInput();
        }else{
            $theloai = new TheLoaiModel;
            $theloai -> Ten = $request->Ten;
            $theloai -> content = $request->content;
            
            $theloai->save();
            return redirect()->route('admin.theloai.them');

        }
    }
    {
        $request->validate([
        'Ten' => 'required',
       
        ]);
        $theloai = new TheLoaiModel;
        $theloai -> Ten = $request->Ten;
        
        $theloai->save();
        return redirect()->route('companies.index')
        ->with('success','Company has been created successfully.');
        }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $theloai = TheLoaiModel::find($id);
        return view('admin.theloai.sua',['theloai'=>$theloai]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'Ten' => 'required|max:30'
        ];

        $validator = Validator::make($request->all(),$rules);
        if($validator->fails()){
            return redirect()->route('admin.theloai.sua',['Ten'=>$id])->withErrors($validator)->withInput();
        }else{
            $theloai = TheLoaiModel::find($id);
            $theloai->Ten = $request->Ten;
            $theloai->TenKhongDau = $request->TenKhongDau;
            
            $theloai->save();
            return redirect()->route('admin.theloai.danhsach');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $theloai = TheLoaiModel::findOrFail($id);
        $theloai->delete();
        return redirect()->route('admin.theloai.danhsach');
    }
}
