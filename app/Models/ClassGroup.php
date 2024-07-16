<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassGroup extends Model
{
    use HasFactory;
    protected $table = 'class_group';
    protected $fillable = [
        'name',
        'level',
        'description',
        'status',
    ];
    public function class(){
            return $this->hasMany(GradeClass::class, 'class_group_id', 'id');
    }
}
