<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable as UAuthenticatable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Authenticatable implements UAuthenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'first_name',
        'last_name',
        'middle_name',
        'username',
        'email',
        'password',
        'applied_at',
        'joined_at',
        'archived_at',
        'status',
        'otp',
        'profile_pic',
        'job_position',
        'job_type',
        'country',
        'city',
        'province_state',
        'street',
        'postal_id',
        'google_id',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
}
