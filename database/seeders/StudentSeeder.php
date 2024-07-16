<?php

namespace Database\Seeders;

use App\Models\Student;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $user = User::create([
            'name' => 'student',
            'email' => 'student@email.com',
            'password' => Hash::make('student123'),
        ]);
        $user->assignRole(['student']);
        $student = Student::create([
            'user_id' => $user->id,
            'class_id' => 1,
            'nis'  => '676767676',
            'nisn' => '676767676',
            'name'  => 'Danang Gunawan',
            'birth'  => '2003-01-07',
            'birth_place'  => 'Jombang',
            'gender'  => 'L',
            'religion'  => 'Islam',
            'address'  => 'Ploso, Jombang',
            'phone_number'  => '0811111111',
            'status'  => '1',
            'is_active'  => '1',
            'join_date'  => '2023-01-01',
        ]);
    }
}
