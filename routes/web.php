<?php

use App\Http\Controllers\TripController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

Route::get('/', function () {
    return view('login');
});


// Login Page
Route::get('/login', function () {
    return view('login');
});


// Login
Route::post('/login', function (Request $request) {

    $user = User::where('email', $request->email)->first();

    if ($user && Hash::check($request->password, $user->password)) {

        session(['user_id' => $user->id]);

        return redirect('/dashboard');
    }

    return back()->with('error', 'Email or password is incorrect');
});


// Register Page
Route::get('/register', function () {
    return view('register');
});


// Register
Route::post('/register', function (Request $request) {

    $request->validate([
        'name' => 'required',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:6|confirmed',
    ]);

    User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
    ]);

    return redirect('/login');
});


// Dashboard
/*Route::get('/dashboard', function () {

    if (!session()->has('user_id')) {
        return redirect('/login');
    }

    $trips = \App\Models\Trip::where('user_id', session('user_id'))
        ->get();

    $nextTrip = $trips
        ->where('start_date', '>=', now()->toDateString())
        ->sortBy('start_date')
        ->first();

    return view('dashboard', compact('trips', 'nextTrip'));

})->name('dashboard');*/
Route::get('/dashboard', function () {
    if (!session()->has('user_id')) {
        return redirect('/login');
    }

    $trips = \App\Models\Trip::where('user_id', session('user_id'))
        ->get();

    $nextTrip = $trips
        ->where('start_date', '>=', now()->toDateString())
        ->sortBy('start_date')
        ->first();

    return view('dashboard', compact('trips', 'nextTrip'));
})->name('dashboard');
//tripes
Route::prefix('trips/')->controller(TripController::class)->name('trip.')->group(function(){
    Route::get('/trip','getAllTrips')->name('trips');
    Route::get('/createTrip','createTrip')->name('createTrip');
    Route::post('/store', 'store')->name('store');
    Route::get('/edit/{id}', 'edit')->name('edit');
    Route::put('/update/{id}', 'update')->name('update');
    Route::delete('/delete/{id}', 'delete')->name('delete');
    Route::get('/tripDeti/{id}','getTrip')->where('id','[0-9]+')->name('tripDeti');
});
Route::get('/trips', function () {
    return 'Trips page - Coming soon';
})->name('trips');
//profile
Route::get('/profile', function () {

    if (!session()->has('user_id')) {
        return redirect('/login');
    }

    $user = User::findOrFail(session('user_id'));

    return view('profile', compact('user'));

})->name('profile');
//settings
Route::get('/settings', function () {

    if (!session()->has('user_id')) {
        return redirect('/login');
    }

    $user = User::findOrFail(session('user_id'));

    return view('settings', compact('user'));

})->name('settings');
// Logout
Route::post('/logout', function () {

    session()->forget('user_id');

    return redirect('/login');
})->name('logout');