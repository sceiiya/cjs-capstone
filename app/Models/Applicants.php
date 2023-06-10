<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Applicants extends Model
{
    use HasFactory;

    protected $table = 'applicants';

    protected $fillable = [
        'employee_id',
        'first_name',
        'last_name',
        'middle_name',
        'job_position',
        'job_type',
        'country',
        'status',
        'highest_ed',
        'highest_ed_attended',
        'last_occupation',
        'last_occupation_attended',
        'about_me',
    ];
}
