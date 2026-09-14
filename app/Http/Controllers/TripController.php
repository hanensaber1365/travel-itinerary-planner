<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Trip;

class TripController extends Controller
{
    //get all trips
    public function getAllTrips()
{
    $trips = Trip::where('user_id', session('user_id'))->get();

    return view('trip', compact('trips'));
}
    //create operation to trip
    function createTrip(){
        return view('createTrip');
    }
    //store trip
    public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'start_date' => 'required|date',
        'end_date' => 'required|date|after_or_equal:start_date',
        'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
    ]);

    $imagePath = null;

    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('trips', 'public');
    }

    Trip::create([
        'user_id' => session('user_id'),
        'name' => $request->name,
        'start_date' => $request->start_date,
        'end_date' => $request->end_date,
        'image' => $imagePath,
    ]);

    return redirect()
        ->route('trip.trips')
        ->with('success', 'Trip created successfully!');
}
//update operation to trip
public function edit($id)
{
    $trip = Trip::findOrFail($id);

    return view('editTrip', compact('trip'));
}
public function update(Request $request, $id)
{
    $trip = Trip::findOrFail($id);

    $request->validate([
        'name' => 'required|string|max:255',
        'start_date' => 'required|date',
        'end_date' => 'required|date|after_or_equal:start_date',
        'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
    ]);

    $trip->name = $request->name;
    $trip->start_date = $request->start_date;
    $trip->end_date = $request->end_date;

    if ($request->hasFile('image')) {
        $trip->image = $request->file('image')->store('trips', 'public');
    }

    $trip->save();

    return redirect()
        ->route('trip.trips')
        ->with('success', 'Trip updated successfully!');
}
//Delete operation to trip
public function delete($id)
{
    $trip = Trip::findOrFail($id);

    $trip->delete();

    return redirect()
        ->route('trip.trips')
        ->with('success', 'Trip deleted successfully!');
}
    //get details one trip
    public function getTrip($id)
{
    $trip = Trip::findOrFail($id);

    return view('tripDeti', compact('trip'));
}
}