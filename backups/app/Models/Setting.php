<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    protected $fillable = [
        'name','value','aboutus_title','aboutus_description','about_us_image','our_mission','our_mission_description','our_vission',
        'our_vission_description',
        'email',
        'phone',
        'address','green_title','green_image','president_name','president_image','president_description','objective_title','objective_description'
    ];
}
