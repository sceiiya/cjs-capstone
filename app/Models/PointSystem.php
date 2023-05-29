<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PointSystem extends Model
{
    use HasFactory;
    protected $table ='point_system';

    protected $fillable =[
        'employee_id',
        'total_points',
        'unused_points',
        'converted_at',
    ];
}
