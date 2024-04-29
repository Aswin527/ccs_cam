<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    use HasFactory;


   protected $table = 'states_provinces';

    protected $fillable = [
        'country_id','name'
    ];

   
}
