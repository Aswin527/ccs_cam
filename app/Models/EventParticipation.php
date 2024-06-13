<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventParticipation extends Model
{
    use HasFactory;


   protected $table = 'event_participants';

    protected $fillable = [
        'id','event_id','user_type','member_id','food_preference','guest_name','guest_phone','guest_email','timestamp','updated_at','created_at','remarks'
    ];

   
}
