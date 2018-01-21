<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserCarParkSession extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'car_registration', 'card', 'cvv'
    ];
}
