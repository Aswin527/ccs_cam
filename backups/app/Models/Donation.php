<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    use HasFactory;


   protected $table = 'donations';

    protected $fillable = [
        'user_id','amount','donation_type','status','remark','currency','transection','type','bank','being'
    ];

   
}
