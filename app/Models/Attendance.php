<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    protected $table = 'attendances';

    protected $fillable = [
        'event_id','member_id','event_id','user_type','member_id','member_remarks','guest_name','guest_phone','guest_email','guest_remarks','timestamp','updated_at','created_at',
    ];


}
