<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ReligionsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(CastesTableSeeder::class);
        $this->call(ConsultantsTableSeeder::class);
        
        
    }
}
