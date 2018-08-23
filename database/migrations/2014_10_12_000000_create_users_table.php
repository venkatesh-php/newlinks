<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('fullname');
            $table->string('fathername')->nullable();;
            $table->string('mothername')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('gender');
            $table->date('dob')->nullable();
            $table->string('time')->nullable();
            $table->string('height')->nullable();
            $table->string('weight')->nullable();
            $table->string('phone_number')->unique();
            $table->string('photo')->nullable();
            $table->string('qualification')->nullable();
            $table->string('job')->nullable();
            $table->string('job_location')->nullable();
            $table->string('salary')->nullable();
            $table->string('religion')->nullable();
            $table->string('caste')->nullable();
            $table->string('sub_caste')->nullable();
            $table->string('gothram')->nullable();
            $table->longText('present_address')->nullable();
            $table->longText('permanent_address')->nullable();
            $table->longText('remarks')->nullable();
            $table->longText('description')->nullable();
            $table->integer('consultant_id');
            $table->integer('status')->nullable();
            $table->integer('payment')->nullable();

            

            
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
