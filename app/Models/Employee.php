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
        'password',
        'applied_at',
        'joined_at',
        'archived_at',
        'status',
        'otp',
        'job_position',
        'job_type',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
