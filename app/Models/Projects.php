<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projects extends Model
{
    use HasFactory;


   protected $table = 'projects';

    protected $fillable = [
        'project_name','project_category', 'project_location', 'about_project','project_image','date','iframe'
    ];

   
}
