<?php

namespace Database\Seeders;

use App\Models\ClassGroup;
use App\Models\GradeClass;
use App\Models\Teacher;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $teacher = Teacher::first();
        $class_group = ClassGroup::first();
        $class = GradeClass::create([
            'class_group_id' => $class_group->id,
            'teacher_id' => $teacher->id,
            'name' => 'X Mesin I',
            'status' => 'X Mesin I',
            'description' => 'Jurusan Mesin',
        ]);
    }
}
