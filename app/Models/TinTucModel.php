<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TinTucModel extends Model
{
    protected $table ="tin_tuc_models";


    public function loaitin(){
        return $this->belongsTo('App\Models\LoaiTinModel','idLoaiTin', 'id');
    }
}
