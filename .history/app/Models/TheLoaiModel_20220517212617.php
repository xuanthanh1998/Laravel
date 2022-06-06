<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TheLoaiModel extends Model
{
    use HasFactory;
  
    protected $table ="the_loai_model";
    
    

    public function loaitin()
    {
        return $this->hasMany('App\LoaiTinModel', 'idTheLoai', 'id');
    }

    public function tintuc()
    {
        return $this->hasManyThrough('App\TinTucModel', 'App\LoaiTinModel', 'idTheLoai','idLoaiTin','id');
    }
}