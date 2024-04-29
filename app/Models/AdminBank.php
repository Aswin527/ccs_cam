<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminBank extends Model
{
    use HasFactory;


   protected $table = 'admin_bank';

    protected $fillable = [
        'bank_name','holder_name','account_number','ifsc_code','iban_number','swift_code'
    ];

   
}
