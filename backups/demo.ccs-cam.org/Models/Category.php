<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name','type','slug','description','meta_title','meta_keyword',
        'meta_description','image','status' , 'username' ,'userid','volume','date','pdf','issue'
    ];

    public function products(){
        return $this->belongsToMany(Product::class,'category_products','category_id','product_id');
    }

    public function blogs(){
        return $this->belongsToMany(Blog::class,'category_blogs','category_id','blog_id');
    }

    public function pages(){
        return $this->hasMany(Page::class);
    }

    public function galleries(){
        return $this->hasMany(Gallery::class);
    }
}
