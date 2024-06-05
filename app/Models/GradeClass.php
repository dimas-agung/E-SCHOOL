<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GradeClass extends Model
{
    use HasFactory;
    protected $table = 'class';
    protected $fillable = [
        'name',
        'teacher_id',
        'class_group_id',
        'description',
        'status',
        'is_active',
        'join_date',
    ];
}
