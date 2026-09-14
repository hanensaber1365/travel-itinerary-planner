@extends('layouts.app')

@section('title', 'Settings')

@section('content')

<div class="container mt-5">

    <h1>Settings</h1>

    <div class="card mt-4 p-4">

        <h3>Account Settings</h3>

        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text"
                   class="form-control"
                   value="{{ $user->name }}"
                   readonly>
        </div>

        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email"
                   class="form-control"
                   value="{{ $user->email }}"
                   readonly>
        </div>

        <a href="{{ route('profile') }}" class="btn btn-primary">
            Back to Profile
        </a>

    </div>

</div>

@endsection