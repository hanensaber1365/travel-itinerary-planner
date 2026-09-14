<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ActivityController extends Controller
{
    public function create()  
    {
        return view('activities.create');
    }

    public function store(Request $request)
    {
        return $request->all();
    }
}