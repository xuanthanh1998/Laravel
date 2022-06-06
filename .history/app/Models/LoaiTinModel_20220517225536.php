<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoaiTinModel extends Model
{
    protected $table ="loai_tin_models";

    public function theloai()
    {
        return $this->belongsTo('App\Models\TheLoaiModel', 'idTheLoai', 'id');
    }

    public function tintuc(){
        return $this->hasMany('App\Models\TinTucModel','idLoaiTin','id');
    }
}
