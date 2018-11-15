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
            'template' => 'storage/images/placeholder.png',
            'image' => 'storage/images/placeholder.png',
            'hand' => 'derecha',
            'region' => 'pulgar',
            'match' => True,
            'user_id' => 1,
        ]);
    }
}
