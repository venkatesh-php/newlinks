<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Consultants extends Model
{
    protected $fillable = [
        'name','phone_number','address'
    ];
}
