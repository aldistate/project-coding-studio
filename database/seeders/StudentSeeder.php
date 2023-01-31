<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['id' => 1, 'name' => 'Aldi', 'score' => 80],
            ['id' => 2, 'name' => 'Putra', 'score' => 85],
            ['id' => 3, 'name' => 'Nawasta', 'score' => 90],
        ];

        DB::table('students')->insert($data);
    }
}
