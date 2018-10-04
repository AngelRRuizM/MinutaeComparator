<?php

use Illuminate\Database\Seeder;

class MinutiasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('minutias')->insert([
            'x' => 0,
            'y' => 0,
            'angle' => 0.0,
            'coincident_id' => 1,
        ]);
    }
}
