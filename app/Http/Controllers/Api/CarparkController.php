<?php

namespace App\Http\Controllers\Api;

use App\CarPark;
use App\User;
use App\UserCarParkSession;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

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

        $carPark = CarPark::where('has_beacon', 1)->where('beacon_major', $beaconMajor)->where('beacon_minor', $beaconMinor)->first();

        return $carPark;
    }

    function startSession(CarPark $carPark)
    {
        $currentUserId = Auth::user()->id;

        $currentUser = User::where('id', $currentUserId)->firstOrFail();

        $newSession = new UserCarParkSession();

        $newSession->start_time = Carbon::now();
        $newSession->user_id = $currentUserId;
        $newSession->carpark_id = $carPark->id;

        $newSession->save();

        $carPark->available_spaces = $carPark->available_spaces - 1;
        $carPark->save();
    }

}
