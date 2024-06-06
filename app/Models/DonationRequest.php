<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DonationRequest extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'donation_request';

    protected $fillable = [
        'name', 'email', 'mobile', 'country', 'organization', 'designation', 'remarks'
    ];
}
