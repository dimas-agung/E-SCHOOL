<?php

namespace Database\Seeders;

use App\Models\ClassGroup;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClassGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $class_group = ClassGroup::create([
            'name' => 'MESIN',
            'level' => '1',
            'description' => 'Jurusan Mesin'
        ]);
    }
}
