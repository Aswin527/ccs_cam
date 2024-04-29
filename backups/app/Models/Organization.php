<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    use HasFactory;


   protected $table = 'organization';

    protected $fillable = [
        'user_id','organization_name','country','organizaion_category','organization_email',
        'organizaton_phone','website','authorize_person','authorize_phone','organization_regidtartioin_number','organization_registration_certificate','state','authorize_email'
    ];

   
}
