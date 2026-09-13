<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TripController extends Controller
{
    //get all trips
    function getAllTrips(){
        return view('trip');
    }
    //create operation to trip
    function createTrip(){
        return view('createTrip');
    }
}
