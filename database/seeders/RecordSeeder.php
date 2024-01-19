<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;

class RecordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('posts')->insert([
                'user_id' => '1',
                'breakfast' => 'Apple',
                'lunch'=>'banana',
                'dinner'=>'orenge',
                'price'=>'250',
                'calorie'=>'200',
                'is_achieved'=>'1',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ]);
    }
}
