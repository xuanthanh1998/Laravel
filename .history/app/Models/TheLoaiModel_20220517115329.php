<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TheLoaiModel extends Model
{
    use HasFactory;
  
    protected $fillable = [
        'Ten',
        'TenKhongDau'
    ];
    
    

    // public function loaitin()
    // {
    //     return $this->hasMany('App\LoaiTinModel', 'idTheLoai', 'id');
    // }

    // public function tintuc()
    // {
    //     return $this->hasManyThrough('App\TinTucModel', 'App\LoaiTinModel', 'idTheLoai','idLoaiTin','id');
    // }
}
