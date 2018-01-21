<?php

namespace App\Http\Controllers\Api;

use App\CarPark;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CarparkController extends Controller
{
    function getAll()
    {
        $carParks = CarPark::all();

        return $carParks;
    }

    function getSingle(CarPark $carPark)
    {
        return $carPark;
    }

    function getByBeacon(Request $request)
    {
        $beaconMajor = $request->get("beacon_major");
        $beaconMinor = $request->get("beacon_minor");

        var_dump($beaconMajor);
        var_dump($beaconMinor);

        $carPark = CarPark::where('has_beacon', 1)->where('beacon_major', $beaconMajor)->where('beacon_minor', $beaconMinor)->first();

        return $carPark;
    }

}
