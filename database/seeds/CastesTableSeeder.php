<?php

use Illuminate\Database\Seeder;

class CastesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('castes')->delete();
        $castes = array(
            array('id' => 1,'name' => 'Reddy','religion_id'=> '1'),
            array('id' => 2,'name' => 'Kamma','religion_id'=> '1'),
            array('id' => 3,'name' => 'Kapu','religion_id'=> '1'),
            array('id' => 4,'name' => 'Thogata Veera Kshatriya','religion_id'=> '1'),
        );
        DB::table('castes')->insert($castes);
    }
}
