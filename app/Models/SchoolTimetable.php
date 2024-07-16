<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolTimetable extends Model
{
    use HasFactory;
    protected $table = 'school_timetable';
    protected $fillable = [
        'name',
        'course_id',
        'teacher_id',
        'class_id',
        'day',
        'time_sequence',
        'start_time',
        'end_time',
        'semester',
        'year',
        'status',
        'is_active',
    ];
    public function class(){
        return $this->hasOne(GradeClass::class, 'id', 'class_id');
    }
    public function teacher(){
        return $this->hasOne(Teacher::class, 'id', 'teacher_id');
    }
    public function cource(){
        return $this->hasOne(Course::class, 'id', 'course_id');
    }
}
