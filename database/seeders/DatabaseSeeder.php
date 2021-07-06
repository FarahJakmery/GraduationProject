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
        Course::factory(10)->create();
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
        $professor = Professor::create([
            'description'  => 'This is the first prof',
            'user_id'      => '2',
        ]);
        $user->assignRole('Professor');



        // $firstYear = Year::create([
        //     'name'   => 'First Year',
        //     'photo'  => asset('storage/yearsPhotos/')
        // ]);

        // $secondYear = Year::create([
        //     'name'   => 'SECOND Year',
        //     'photo'  => asset('SECOND.png')
        // ]);

        // $thirdYear = Year::create([
        //     'name'   => 'THIRD Year',
        //     'photo'  => asset('THIRD.png')
        // ]);

        // $fourthYear = Year::create([
        //     'name'   => 'FOURTH Year',
        //     'photo'  => asset('FOURTH.png')
        // ]);

        // $fifthYear = Year::create([
        //     'name'   => 'FIFTH Year',
        //     'photo'  => asset('FIFTH.png')
        // ]);

        // Semesters for the First Year
        $firstsemesteryear1 = Semester::create([
            'name'                => '1th semester',
            'photo'               => asset('1 SEMSETER.png'),
            'year_id'             => '1'
        ]);
        $secondsemesteryear1 = Semester::create([
            'name'                => '2th semester',
            'photo'               => asset('2 SEMSETER.png'),
            'year_id'             => '1'
        ]);

        // Semesters for the Second Year
        $firstsemesteryear2 = Semester::create([
            'name'                => '1th semester',
            'photo'               => asset('1 SEMSETER.png'),
            'year_id'             => '2'
        ]);
        $secondsemesteryear2 = Semester::create([
            'name'                => '2th semester',
            'photo'               => asset('2 SEMSETER.png'),
            'year_id'             => '2'
        ]);

        // Semesters for the Third Year
        $firstsemesteryear3 = Semester::create([
            'name'                => '1th semester',
            'photo'               => asset('1 SEMSETER.png'),
            'year_id'             => '3'
        ]);
        $secondsemesteryear3 = Semester::create([
            'name'                => '2th semester',
            'photo'               => asset('2 SEMSETER.png'),
            'year_id'             => '3'
        ]);

        // Semesters for the Fourth Year
        $firstsemesteryear4 = Semester::create([
            'name'                => '1th semester',
            'photo'               => asset('1 SEMSETER.png'),
            'year_id'             => '4'
        ]);
        $secondsemesteryear4 = Semester::create([
            'name'                => '2th semester',
            'photo'               => asset('2 SEMSETER.png'),
            'year_id'             => '4'
        ]);

        // Semesters for the Fifth Year
        $firstsemesteryear5 = Semester::create([
            'name'                => '1th semester',
            'photo'               => asset('1 SEMSETER.png'),
            'year_id'             => '5'
        ]);
        $secondsemesteryear5 = Semester::create([
            'name'                => '2th semester',
            'photo'               => asset('2 SEMSETER.png'),
            'year_id'             => '5'
        ]);
    }
}
