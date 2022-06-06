<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'slug',
        
       ];
       public function sluggable()
       {
           return [
               'slug' => [
                   'source' => 'title'
               ]
           ];
        }
}
