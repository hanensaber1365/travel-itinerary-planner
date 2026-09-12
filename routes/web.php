<?php

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
Route::get('/dashboard', function () {

    if (!session()->has('user_id')) {
        return redirect('/login');
    }

    $user = User::find(session('user_id'));

    return view('dashboard', compact('user'));
})->name('dashboard');
//tripes
Route::get('/trips', function () {
    return 'Trips page - Coming soon';
})->name('trips');
//calendar
Route::get('/calendar', function () {
    return 'Calendar page - Coming soon';
})->name('calendar');
//app
/*Route::get('/app',function(){
     if (!session()->has('user_id')) {
        return redirect('/login');
    }

    $user = User::find(session('user_id'));

    return view('app', compact('user'));
});*/
// Logout
Route::get('/logout', function () {

    session()->forget('user_id');

    return redirect('/login');
})->name('logout');