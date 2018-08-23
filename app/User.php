<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fullname','fathername','mothername','email', 'password','dob','time','height','weight','phone_number','gender','photo','qualification','job','job_location','salary','religion','caste','sub_caste','gothram','permanent_address','present_address','remarks','description','consultant_id','payment','status'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
