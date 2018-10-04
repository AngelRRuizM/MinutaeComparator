<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(ComparisonsTableSeeder::class);
        $this->call(CoincidentsTableSeeder::class);
        $this->call(MinutiasTableSeeder::class);
    }
}
