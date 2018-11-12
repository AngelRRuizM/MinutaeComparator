<?php

use Illuminate\Database\Seeder;

class CoincidentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        Schema::disableForeignKeyConstraints();
        DB::table('coincidents')->insert([
            'percentage' => 99.99,
            'type' => "Diverge",
            'comparison_id' => 1,
        ]);
        Schema::enableForeignKeyConstraints();
    }
}
