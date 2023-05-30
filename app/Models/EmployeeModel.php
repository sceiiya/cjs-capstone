<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeModel extends Model
{
    use HasFactory;

    protected $table = 'employees';
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



// {{$employee->id}}
// {{$employee->first_name}}
// {{$employee->last_name}}
// {{$employee->middle_name}}
// {{$employee->username}}
// {{$employee->email}}
// {{$employee->password}}
// {{$employee->applied_at}}
// {{$employee->joined_at}}
// {{$employee->archived_at}}
// {{$employee->status}}
// {{$employee->otp}}
// {{$employee->profile_pic}}
// {{$employee->job_position}}
// {{$employee->job_type}}
// {{$employee->country}}
// {{$employee->city}}
// {{$employee->province_state}}
// {{$employee->street}}
// {{$employee->postal_id}}
// {{$employee->google_id}}