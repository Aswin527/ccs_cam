<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    use HasFactory;


   protected $table = 'vouchers';

    protected $fillable = [
        'beneficery','payment_category','currency','bank','amount','type','remarks','date','category'
    ];

   
}
