<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'firstname','lastname','mobile','email','password','cpass','gender','department','dob',
        'photo','national_id','national_photo','norganization','porganization','status',
        'member_category','organization','membership_number','country','state','nationality',
        'qualification','membership_id','bank_name','bank_holder_name','ifsc_code','swift_code','ban_number','account_number'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
