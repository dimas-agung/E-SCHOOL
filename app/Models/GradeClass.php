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

    public function class_group(){
        return $this->hasOne(ClassGroup::class, 'id', 'class_group_id');
    }
    public function teacher(){
        return $this->hasOne(Teacher::class, 'id', 'teacher_id');
    }

}
