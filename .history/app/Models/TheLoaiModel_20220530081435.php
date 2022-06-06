<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TheLoaiModel extends Model
{
    use HasFactory;
  
    protected $table ="the_loai_models";
    
    

    public function loaitin()
    {
        return $this->hasMany('App\Models\LoaiTinModel', 'idTheLoai', 'id');
    }

    public function tintuc()
    {
        return $this->hasManyThrough('App\Models\TinTucModel', 'App\Models\LoaiTinModel', 'idTheLoai','idLoaiTin','id');
    }
    return (
        $theloai->status == TheLoaiModel::STATUS_PUBLISHED ||
        ($user && (
            $user->id == $theloai->user_id
            || $user->hasPermission('review_post')
        ))
    );
}
