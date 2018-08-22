<?php

use Illuminate\Database\Seeder;

class ConsultantsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('consultants')->delete();
        $consultants = array(
            array('id' => 1,'name' => 'SivaLinks','phone_number' => '98480411750','address' => 'Narasaraopet'),
            array('id' => 2,'name' => 'Pedda Sivaiah Dande','phone_number' => '9866697426','address' => 'Narasaraopet'),
        );
        DB::table('consultants')->insert($consultants);
    }
}
