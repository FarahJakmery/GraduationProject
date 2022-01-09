<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Lecture;
use App\Models\Professor;
use App\Models\Quiz;
use App\Models\Year;
use App\Models\Semester;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        // Course::factory(10)->create();
        $role = Role::create(['name' => 'Student']);
        $role = Role::create(['name' => 'Admin']);
        $role = Role::create(['name' => 'Professor']);
        // admin
        $user = User::create([
            'full_name'  => 'Farah Jakmery',
            'phone'      => '0936159408',
            'photo'      => 'null',
            'email'      => 'super@admin.com',
            'password'   => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        ]);
        $user->assignRole('Admin');
        // professor
        $user = User::create([
            'full_name'  => 'Rafaah Khazeem',
            'phone'      => '0936159400',
            'photo'      => 'null',
            'email'      => 'professor@gmail.com',
            'password'   => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        ]);
        $user->assignRole('Professor');
    }
}
