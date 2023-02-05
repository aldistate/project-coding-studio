<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Activity;
use App\Models\Student;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

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

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $faker = Faker::create('id_ID');
        
        for ($i = 1; $i <= 5; $i++) { 
            DB::table('teachers')->insert([
                'name' => $faker->name,
            ]);
        }

        Student::create([
            'teacher_id' => 2,
            'name' => 'Aldi Putra Nawasta',
            'score' => 98,
        ]);

        for ($i = 1; $i <= 5; $i++) { 
            DB::table('students')->insert([
                'teacher_id' => $faker->randomDigitNot(0),
                'name' => $faker->name,
                'score' => $faker->numberBetween(0, 100),
            ]);
        }

        for ($i = 1; $i <= 5; $i++) { 
            DB::table('contacts')->insert([
                'student_id' => $faker->randomDigitNot(0),
                'email' => $faker->safeEmail(),
                'phone' => $faker->phoneNumber(),
                'address' => $faker->address(),
            ]);
        }

        Activity::create([
            'name' => 'Ngoding',
        ]);

        Activity::create([
            'name' => 'Multimedia',
        ]);

        Activity::create([
            'name' => 'Gaming',
        ]);
    }
}
