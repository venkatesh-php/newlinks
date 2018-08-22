<?php

use Illuminate\Database\Seeder;

class ReligionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('religions')->delete();
        $religions = array(
            array('id' => 1,'name' => 'Hindu'),
        );
        DB::table('religions')->insert($religions);
        
    }
}
