
@extends('layouts.app')

@section('title', 'Your Trips')

@section('content')

<div class="main-dashboard m-3">

    {{-- Header --}}
    <div class="d-flex flex-wrap align-items-center justify-content-between mb-4">

        <div>
            <h2 class="fw-bold mb-1">Your Trips</h2>
            <p class="text-body-secondary mb-0">
                Manage and organize all your travel plans
            </p>
        </div>

        <a href="{{ route('trip.createTrip') }}"
           class="btn btn-primary rounded-3 px-4 py-2 mt-3 mt-md-0">
            <i class="bi bi-plus-lg me-2"></i>
            Create New Trip
        </a>

    </div>


    {{-- Statistics --}}
    <div class="container-fluid px-0 mb-4">

        <div class="row g-3">

            <div class="col-lg-4 col-md-6">

                <div class="bg-light border shadow-sm rounded-4 p-3 d-flex align-items-center">

                    <div class="co-icon promo-icon">
                        <i class="bi bi-suitcase-fill"></i>
                    </div>

                    <div class="ms-3">

                        <p class="text-body-secondary mb-1">
                            Total Trips
                        </p>

                        <h3 class="fw-bold mb-0">
                            {{ $trips->count() }}
                        </h3>

                    </div>

                </div>

            </div>


            <div class="col-lg-4 col-md-6">

                <div class="bg-light border shadow-sm rounded-4 p-3 d-flex align-items-center">

                    <div class="co-icon box-icon box-icon-gre">
                        <i class="bi bi-calendar-check"></i>
                    </div>

                    <div class="ms-3">

                        <p class="text-body-secondary mb-1">
                            Upcoming Trips
                        </p>

                        <h3 class="fw-bold mb-0">
                            {{ $trips->where('start_date', '>=', now()->toDateString())->count() }}
                        </h3>

                    </div>

                </div>

            </div>


            <div class="col-lg-4 col-md-6">

                <div class="bg-light border shadow-sm rounded-4 p-3 d-flex align-items-center">

                    <div class="co-icon box-icon box-icon-yel">
                        <i class="bi bi-calendar-event"></i>
                    </div>

                    <div class="ms-3">

                        <p class="text-body-secondary mb-1">
                            Next Trip
                        </p>

                        <h6 class="fw-bold mb-0">
                            {{ $trips->sortBy('start_date')->first()?->name ?? 'No upcoming trip' }}
                        </h6>

                    </div>

                </div>

            </div>

        </div>

    </div>


    {{-- Trips Section --}}
    <div class="bg-light border shadow-sm rounded-4 p-4">

        <div class="d-flex align-items-center justify-content-between mb-4">

            <div>

                <div class="d-flex align-items-center">

                    <div class="co-icon promo-icon">
                        <i class="bi bi-airplane"></i>
                    </div>

                    <div class="ms-3">

                        <h5 class="fw-bold mb-1">
                            All Your Trips
                        </h5>

                        <p class="text-body-secondary mb-0">
                            Your saved travel plans
                        </p>

                    </div>

                </div>

            </div>

        </div>


        {{-- Trips Cards --}}

        <div class="row g-4">

            @forelse($trips as $trip)

                <div class="col-xl-4 col-lg-6 col-md-6">

                    <div class="card border-0 shadow-sm rounded-4 overflow-hidden h-100">

                        {{-- Trip Image --}}
                        <div style="height: 210px; overflow: hidden;">

                            @if($trip->image)

                                <img
                                    src="{{ asset('storage/' . $trip->image) }}"
                                    alt="{{ $trip->name }}"
                                    class="w-100 h-100"
                                    style="object-fit: cover;"
                                >

                            @else

                                <div class="w-100 h-100 d-flex align-items-center justify-content-center bg-light">

                                    <i class="bi bi-image fs-1 text-body-secondary"></i>

                                </div>

                            @endif

                        </div>


                        {{-- Card Body --}}
                        <div class="card-body p-4">

                            <div class="d-flex align-items-start justify-content-between mb-3">

                                <div>

                                    <h5 class="fw-bold mb-1">
                                        {{ $trip->name }}
                                    </h5>

                                    <p class="text-body-secondary mb-0">
                                        <i class="bi bi-geo-alt me-1"></i>
                                        Travel Trip
                                    </p>

                                </div>

                                <span class="badge rounded-pill"
                                      style="background:#F1EDFF; color:#7C4DFF;">
                                    Trip
                                </span>

                            </div>


                            {{-- Dates --}}
                            <div class="mb-3">

                                <div class="d-flex align-items-center mb-2">

                                    <div class="box-icon box-icon-gre rounded-3">
                                        <i class="bi bi-calendar-event"></i>
                                    </div>

                                    <div class="ms-2">

                                        <small class="text-body-secondary d-block">
                                            Start Date
                                        </small>

                                        <span class="fw-semibold">
                                            {{ \Carbon\Carbon::parse($trip->start_date)->format('d M Y') }}
                                        </span>

                                    </div>

                                </div>


                                <div class="d-flex align-items-center">

                                    <div class="box-icon box-icon-yel rounded-3">
                                        <i class="bi bi-calendar-check"></i>
                                    </div>

                                    <div class="ms-2">

                                        <small class="text-body-secondary d-block">
                                            End Date
                                        </small>

                                        <span class="fw-semibold">
                                            {{ \Carbon\Carbon::parse($trip->end_date)->format('d M Y') }}
                                        </span>

                                    </div>

                                </div>

                            </div>


                            {{-- Number of Days --}}
                            <div class="bg-light rounded-3 p-3 mb-3">

                                <div class="d-flex align-items-center justify-content-between">

                                    <span class="text-body-secondary">
                                        <i class="bi bi-clock me-1"></i>
                                        Trip Duration
                                    </span>

                                    <strong style="color:#7C4DFF;">

                                        {{
                                            \Carbon\Carbon::parse($trip->start_date)
                                                ->diffInDays(
                                                    \Carbon\Carbon::parse($trip->end_date)
                                                ) + 1
                                        }}

                                        Days

                                    </strong>

                                </div>

                            </div>


                            {{-- Buttons --}}
                            <div class="d-flex gap-2">

                                <a href="{{ route('trip.tripDeti', $trip->id) }}"
                                   class="btn btn-primary flex-grow-1 rounded-3">

                                    <i class="bi bi-eye me-1"></i>
                                    View Details

                                </a>

                                <a href="#"
                                   class="btn btn-light border rounded-3">

                                    <i class="bi bi-pencil-square"></i>

                                </a>

                            </div>

                        </div>

                    </div>

                </div>

            @empty

                {{-- Empty State --}}

                <div class="col-12">

                    <div class="text-center py-5">

                        <div class="co-icon promo-icon mx-auto mb-3"
                             style="width:70px;height:70px;">

                            <i class="bi bi-airplane fs-3"></i>

                        </div>

                        <h4 class="fw-bold">
                            No Trips Yet
                        </h4>

                        <p class="text-body-secondary">
                            Start planning your next adventure.
                        </p>

                        <a href="{{ route('trip.createTrip') }}"
                           class="btn btn-primary rounded-3 px-4">

                            <i class="bi bi-plus-lg me-2"></i>
                            Create Your First Trip

                        </a>

                    </div>

                </div>

            @endforelse

        </div>

    </div>

</div>

@endsection