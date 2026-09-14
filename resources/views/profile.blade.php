@extends('layouts.app')

@section('title', 'Profile')

@section('content')

<div class="container py-5">

```
<!-- Page Header -->
<div class="mb-4">
    <h1 class="fw-bold mb-1">My Profile</h1>
    <p class="text-muted mb-0">
        Manage and view your personal account information.
    </p>
</div>

<!-- Profile Card -->
<div class="card border-0 shadow-sm rounded-4 overflow-hidden">

    <!-- Profile Header -->
    <div class="p-4 text-white"
         style="background: linear-gradient(135deg, #0d6efd, #0dcaf0);">

        <div class="d-flex align-items-center gap-3">

            <!-- Avatar -->
            <div class="rounded-circle bg-white text-primary d-flex align-items-center justify-content-center fw-bold"
                 style="width: 75px; height: 75px; font-size: 28px;">
                {{ strtoupper(substr($user->name, 0, 1)) }}
            </div>

            <div>
                <h3 class="mb-1 fw-bold">{{ $user->name }}</h3>
                <p class="mb-0 opacity-75">
                    Travel Planner Member
                </p>
            </div>

        </div>

    </div>

    <!-- User Information -->
    <div class="p-4">

        <h5 class="fw-bold mb-4">
            Account Information
        </h5>

        <div class="row g-4">

            <!-- Name -->
            <div class="col-md-6">
                <div class="p-3 bg-light rounded-3 h-100">
                    <small class="text-muted d-block mb-1">
                        Full Name
                    </small>

                    <span class="fw-semibold">
                        {{ $user->name }}
                    </span>
                </div>
            </div>

            <!-- Email -->
            <div class="col-md-6">
                <div class="p-3 bg-light rounded-3 h-100">
                    <small class="text-muted d-block mb-1">
                        Email Address
                    </small>

                    <span class="fw-semibold">
                        {{ $user->email }}
                    </span>
                </div>
            </div>

            <!-- User ID -->
            <div class="col-md-6">
                <div class="p-3 bg-light rounded-3 h-100">
                    <small class="text-muted d-block mb-1">
                        User ID
                    </small>

                    <span class="fw-semibold">
                        #{{ $user->id }}
                    </span>
                </div>
            </div>

            <!-- Account -->
            <div class="col-md-6">
                <div class="p-3 bg-light rounded-3 h-100">
                    <small class="text-muted d-block mb-1">
                        Account Status
                    </small>

                    <span class="badge bg-success-subtle text-success px-3 py-2">
                        Active
                    </span>
                </div>
            </div>

        </div>

        <!-- Actions -->
        <div class="mt-4 pt-4 border-top d-flex gap-2">

            <a href="{{ route('settings') }}"
               class="btn btn-primary px-4 rounded-3">
                Settings
            </a>

            <a href="{{ route('dashboard') }}"
               class="btn btn-outline-secondary px-4 rounded-3">
                Back to Dashboard
            </a>

        </div>

    </div>

</div>
```

</div>

@endsection
