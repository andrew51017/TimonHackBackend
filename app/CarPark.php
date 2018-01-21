<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CarPark extends Model
{
    public $fillable = [
        'name', 'postcode', 'geo_lat', 'geo_lng', 'charged', 'tariff', 'charged_hours', 'non_charging_days', 'season_ticket_info', 'total_spaces', 'available_spaces', 'family_spaces', 'motorcycle_spaces', 'electric_spaces', 'disabled_spaces'
    ];

    public function sessions()
    {
        return $this->hasMany('App\UserCarParkSession');
    }


}
