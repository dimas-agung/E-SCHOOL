<?php

namespace Database\Seeders;

use App\Models\Teacher;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $user = User::create([
            'name' => 'Teacher',
            'email' => 'teacher@email.com',
            'password' => Hash::make('teacher123'),
        ]);
        $user->assignRole(['teacher']);
        $teacher = Teacher::create([
            'user_id' => $user->id,
            'nip' => '12345678',
            'nuptk' => '12345678',
            'name' => 'Ahmad Wahid Pambudi',
            'birth' => '1978-04-01',
            'birth_place' => 'Jombang',
            'gender' => 'L',
            'religion' => 'Islam',
            'address' => 'Jombang, Jln Pahlawan no 12',
            'phone_number' => '08234578191',
            'status' => '1',
            // 'is_active' => $request->input(''),
            'join_date' => '2020-01-01',
        ]);
    }
}
