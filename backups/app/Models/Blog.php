<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'name','description','image','slug',
        'meta_title','meta_keyword','meta_description','status'
    ];

    public function categories(){
        return $this->belongsToMany(Category::class,'category_blogs','blog_id','category_id');
    }
}
