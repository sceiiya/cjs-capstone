<?php

namespace App\Models;
use Illuminate\Foundation\Auth\User as UAuthenticatable;
use App\Http\Controllers\Auth\EmployeeController as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'first_name',
        'last_name',
        'middle_name',
        'email',
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
