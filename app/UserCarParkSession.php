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
        'start_time', 'end_time', 'user_id', 'carpark_id'
    ];
}
