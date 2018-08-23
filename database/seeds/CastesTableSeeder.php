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
            array('name' => 'Reddy','religion_id'=> '1'),
            array('name' => 'Kamma','religion_id'=> '1'),
            array('name' => 'Kapu','religion_id'=> '1'),
            array('name' => 'Thogata Veera Kshatriya','religion_id'=> '1'),
            array('name' => 'Padma Sali','religion_id'=> '1'),
            array('name' => 'Brahmins','religion_id'=> '1'),
            array('name' => 'Vaishyas ','religion_id'=> '1'),
            array('name' => 'Yadavas','religion_id'=> '1'),
            array('name' => 'Hindu-Mala','religion_id'=> '1'),
            array('name' => 'Hindu-Madiga','religion_id'=> '1'),
            array('name' => 'Pathans ','religion_id'=> '2'),
            array('name' => 'Shaiks','religion_id'=> '2'),
            array('name' => 'Dudekula','religion_id'=> '2'),
            array('name' => 'Muhammad','religion_id'=> '2'),
            array('name' => 'Sayyids','religion_id'=> '2'),
            array('name' => 'Baptists','religion_id'=> '3'),
            array('name' => 'Catholics','religion_id'=> '3'),
            array('name' => 'Lutherans','religion_id'=> '3'),
            array('name' => 'Christians-Mala','religion_id'=> '3'),
            array('name' => 'Christians-Madiga','religion_id'=> '3'),
        );
        DB::table('castes')->insert($castes);
    }
}
