<?php

namespace Database\Seeders;

use App\Models\GradeClass;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Contracts\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(ClassGroupSeeder::class);
        $this->call(TeacherSeeder::class);
        $this->call(ClassSeeder::class);
        $this->call(StudentSeeder::class);

    }
}
