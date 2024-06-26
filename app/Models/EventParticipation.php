<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventParticipation extends Model
{
    use HasFactory;

    protected $table = 'event_participants';

    protected $fillable = [
        'id', 'event_id', 'user_type', 'member_id', 'food_preference', 'guest_name', 'guest_phone', 'guest_email', 'timestamp', 'updated_at', 'created_at', 'remarks','guest_organization','guest_designation','guest_country','guest_province'
    ];

    /**
     * Get the user that owns the participation.
     * This defines a relationship where EventParticipation belongs to a User.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'member_id', 'membership_id');
    }

    /**
     * Get user details if user_type is 'member'.
     * This is a custom accessor that checks the user_type and fetches user details accordingly.
     */
    public function getUserDetailsAttribute()
    {
        if ($this->user_type === 'member') {
            return $this->user;
        }
        return null;
    }
}
