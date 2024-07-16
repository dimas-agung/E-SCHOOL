<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $table = 'student';
    protected $fillable = [
        'user_id',
        'class_id',
        'nis',
        'nisn',
        'name',
        'birth',
        'birth_place',
        'gender',
        'religion',
        'address',
        'phone_number',
        'status',
        'is_active',
        'join_date',
    ];

    public function class(){
        return $this->hasOne(GradeClass::class, 'id', 'class_id');
    }
    public function user(){
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
