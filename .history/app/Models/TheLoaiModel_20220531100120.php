<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TheLoaiModel extends Model
{
    use HasFactory;
  
    protected $table ="the_loai_models";
    protected $fillable = [
        'id',
        'Ten',
        'TenKhongDau',
       
    ];
    
    

    public function loaitin()
    {
        return $this->hasMany('App\Models\LoaiTinModel', 'idTheLoai', 'id');
    }

    public function tintuc()
    {
        return $this->hasManyThrough('App\Models\TinTucModel', 'App\Models\LoaiTinModel', 'idTheLoai','idLoaiTin','id');
    }


    // use SoftDeletes;

    // const STATUS_DRAFT = 'draft';
    // const STATUS_UNPUBLISHED = 'unpublished';
    // const STATUS_PUBLISHED = 'published';

    // public function user()
    // {
    //     return $this->belongsTo('App\Models\User');
    // }
}
