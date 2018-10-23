<?php

use Illuminate\Database\Seeder;

class ComparisonsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comparisons')->insert([
            'template' => '/image1',
            'image' => '/image2',
            'hand' => 'derecha',
            'region' => 'pulgar',
            'match' => True,
            'user_id' => 1,
        ]);
    }
}