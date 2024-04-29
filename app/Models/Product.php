<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name','description','price','image','slug','packing',
        'composition','meta_title','meta_keyword','meta_description',
        'status','username','userid'
    ];

    public function categories(){
        return $this->belongsToMany(Category::class,'category_products','product_id','category_id');
    }
}
