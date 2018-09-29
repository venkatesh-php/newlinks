<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();
	$users = array(
        array('id' => 1,'fullname' => 'Venkateswarlu Dande' ,'email' => "venkatesh.cse.tec@gmail.com",'password' => bcrypt('09ne1a0508'),'phone_number' => '9848041175','gender' => 'male','religion' => '1','caste' => '4','consultant_id' => '1'),
    );
    DB::table('users')->insert($users);
    }
}
