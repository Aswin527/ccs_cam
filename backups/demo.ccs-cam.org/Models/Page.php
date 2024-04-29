<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_id','name','description','meta_title','slug','image',
        'meta_keyword','meta_description','status'
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }
}
