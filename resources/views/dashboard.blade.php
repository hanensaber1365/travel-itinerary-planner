@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

    <div class="content">
        <h1>Welcome, {{ $user->name }}! ✈️</h1>
        <p>Welcome to your Travel Planner.</p>
    </div>

@endsection