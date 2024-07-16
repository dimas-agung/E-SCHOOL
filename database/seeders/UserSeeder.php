<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@email.com',
            'password' => Hash::make('admin123'),
        ]);
        $admin->assignRole(['admin']);
        // $teacher = User::create([
        //     'name' => 'Teacher',
        //     'email' => 'teacher@email.com',
        //     'password' => Hash::make('teacher123'),
        // ]);
        // $student = User::create([
        //     'name' => 'student',
        //     'email' => 'student@email.com',
        //     'password' => Hash::make('student123'),
        // ]);

        // $teacher->assignRole(['teacher']);
        // $student->assignRole(['student']);
    }
}
