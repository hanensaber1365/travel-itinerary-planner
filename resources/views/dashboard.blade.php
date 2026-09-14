```blade
@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

<div class="main-dashboard m-3">

    <div class="boxs">

        <div class="container-fluid text-center">

            <div class="row align-items-center">

                {{-- Total Trips --}}
                <div class="col-xl-3 col-md-4">

                    <div class="bg-light border shadow-sm rounded-4 p-3 d-flex align-items-center">

                        <div class="co-icon promo-icon">
                            <i class="bi bi-suitcase-fill"></i>
                        </div>

                        <div class="co-content text-start ms-3">

                            <p class="text-Secondary">Total Trips</p>

                            <h2>{{ $trips->count() }}</h2>

                            <p class="text-Secondary">All Your Trips</p>

                        </div>

                    </div>

                </div>


                {{-- Days To Travel --}}
                <div class="col-xl-3 col-md-4">

                    <div class="bg-light border shadow-sm rounded-4 p-3 d-flex align-items-center">

                        <div class="co-icon box-icon box-icon-yel">
                            <i class="bi bi-clock"></i>
                        </div>

                        <div class="co-content text-start ms-3">

                            <p class="text-Secondary">Days To Travel</p>

                            <h2>
                                @if($nextTrip)
                                    {{ \Carbon\Carbon::today()->diffInDays(\Carbon\Carbon::parse($nextTrip->start_date)) }}
                                @else
                                    0
                                @endif
                            </h2>

                            <p class="text-Secondary">Until Next Trip</p>

                        </div>

                    </div>

                </div>


                {{-- Upcoming Trips --}}
                <div class="col-xl-3 col-md-4">

                    <div class="bg-light border shadow-sm rounded-4 p-3 d-flex align-items-center">

                        <div class="co-icon box-icon box-icon-gre">
                            <i class="bi bi-calendar-event"></i>
                        </div>

                        <div class="co-content text-start ms-3">

                            <p class="text-Secondary">Upcoming Trips</p>

                            <h2>
                                {{
                                    $trips
                                        ->filter(function ($trip) {
                                            return \Carbon\Carbon::parse($trip->start_date)->between(
                                                \Carbon\Carbon::today(),
                                                \Carbon\Carbon::today()->addDays(30)
                                            );
                                        })
                                        ->count()
                                }}
                            </h2>

                            <p class="text-Secondary">Next 30 Days</p>

                        </div>

                    </div>

                </div>


                {{-- Documents --}}
                <div class="col-xl-3 col-md-4">

                    <div class="bg-light border shadow-sm rounded-4 p-3 d-flex align-items-center">

                        <div class="co-icon box-icon box-icon-blu">
                            <i class="bi bi-file-earmark-text"></i>
                        </div>

                        <div class="co-content text-start ms-3">

                            <p class="text-Secondary">Documents</p>

                            <h2>8</h2>

                            <p class="text-Secondary">Total Uploaded</p>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>


    {{-- Hero Section --}}
    <div class="hero-sec my-4">

        <div class="container-fluid text-center">

            <div class="row align-items-start">

                <div class="col-lg-8">

                    <div class="trip bg-light border shadow-sm rounded-4 p-3">

                        <div class="trip-h d-flex align-items-center text-start">

                            <div class="co-icon promo-icon">
                                <i class="bi bi-airplane"></i>
                            </div>

                            <div class="ms-2">
                                <h5>Your Next Trip</h5>
                            </div>

                        </div>


                        {{-- If there is an upcoming trip --}}
                        @if($nextTrip)

                            <div class="trip-de p-5 my-4 rounded-4"
                                 style="background-image: url('{{ asset('storage/' . $nextTrip->image) }}');">

                                <div class="row align-items-center justify-content-space-between">

                                    <div class="col-md-6 content-de text-white text-start">

                                        <h2>{{ $nextTrip->name }}</h2>

                                        <p>
                                            {{ \Carbon\Carbon::parse($nextTrip->start_date)->format('d M Y') }}
                                            -
                                            {{ \Carbon\Carbon::parse($nextTrip->end_date)->format('d M Y') }}
                                        </p>

                                        <p>Paris,France</p>

                                    </div>


                                    <div class="col-md-6 time-de bg-light border shadow-sm rounded-4 p-3">

                                        <div class="time-de-cont text-center">

                                            <p class="text-Secondary">
                                                Trip Starts in
                                            </p>


                                            {{-- Days --}}
                                            <p class="h1">

                                                {{ \Carbon\Carbon::today()->diffInDays(\Carbon\Carbon::parse($nextTrip->start_date)) }}

                                                <br>

                                                <span class="text-Secondary h6">
                                                    Days
                                                </span>

                                            </p>


                                            {{-- Hours / Minutes / Seconds --}}
                                            <div class="d-flex align-items-center justify-content-center gap-5">

                                                <p class="h5">

                                                    {{ now()->diffInHours(\Carbon\Carbon::parse($nextTrip->start_date)->startOfDay()) % 24 }}

                                                    <br>

                                                    <span class="text-Secondary h6">
                                                        Hours
                                                    </span>

                                                </p>


                                                <p class="h5">

                                                    {{ now()->diffInMinutes(\Carbon\Carbon::parse($nextTrip->start_date)->startOfDay()) % 60 }}

                                                    <br>

                                                    <span class="text-Secondary h6">
                                                        Minutes
                                                    </span>

                                                </p>


                                                <p class="h5">

                                                    {{ now()->diffInSeconds(\Carbon\Carbon::parse($nextTrip->start_date)->startOfDay()) % 60 }}

                                                    <br>

                                                    <span class="text-Secondary h6">
                                                        Seconds
                                                    </span>

                                                </p>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>


                            {{-- Buttons --}}
                            <div class="trip-btn d-flex align-items-center">

                                <div>

                                    <a href="{{ route('trip.tripDeti', $nextTrip->id) }}"
                                       class="btn btn-primary w-100 d-flex align-items-center justify-content-center gap-2">

                                        <i class="bi bi-pencil-square"></i>

                                        View Trip Details

                                    </a>

                                </div>


                                <div>

                                    <a href="{{ route('trip.edit', $nextTrip->id) }}"
                                       class="btn logout-btn d-flex align-items-center gap-3 w-100 px-4 py-3">

                                        <i class="bi bi-pencil-square"></i>

                                        Edit Trip

                                    </a>

                                </div>

                            </div>


                        @else

                            {{-- No Upcoming Trip --}}
                            <div class="trip-de p-5 my-4 rounded-4">

                                <div class="row align-items-center justify-content-space-between">

                                    <div class="col-md-6 content-de text-white text-start">

                                        <h2>No Upcoming Trip</h2>

                                        <p>No upcoming trip available</p>

                                        <p>---</p>

                                    </div>

                                </div>

                            </div>

                        @endif

                    </div>


                    {{-- All Trips --}}
                    <div class="all-trips bg-light border shadow-sm rounded-4 p-3 mt-3">

                        <div class="all-trips-h d-flex align-items-center justify-content-space-between">

                            <div class="trip-h d-flex align-items-center text-start">

                                <div class="co-icon promo-icon">
                                    <i class="bi bi-suitcase-fill"></i>
                                </div>

                                <div class="ms-2">
                                    <h5>Your Next Trip</h5>
                                </div>

                            </div>


                            <div class="trips-view ms-auto">

                                <a class="h3" href="{{ route('trip.trips') }}">
                                    View All Trips
                                </a>

                            </div>

                        </div>


                        <div class="all-trips-view border shadow-sm rounded-4 p-3 mt-3">

                            @forelse($trips as $trip)

                                <div class="row trip-on align-items-center p-2 justify-content-space-between border-bottom">

                                    {{-- Image --}}
                                    <div class="col-sm-3 all-trip-img">

                                        @if($trip->image)

                                            <img src="{{ asset('storage/' . $trip->image) }}"
                                                 class="rounded-4"
                                                 alt="trip-img">

                                        @endif

                                    </div>


                                    {{-- Trip Name --}}
                                    <div class="col-sm-3">

                                        <p class="h3">
                                            {{ $trip->name }}
                                        </p>

                                        <p>
                                            Paris,France
                                        </p>

                                    </div>


                                    {{-- Dates --}}
                                    <div class="col-sm-3">

                                        <p>
                                            {{ \Carbon\Carbon::parse($trip->start_date)->format('d M Y') }}
                                        </p>

                                        <p>
                                            -{{ \Carbon\Carbon::parse($trip->end_date)->format('d M Y') }}
                                        </p>

                                    </div>


                                    {{-- Buttons --}}
                                    <div class="col-sm-3">

                                        <div class="d-flex gap-2">

                                            {{-- View --}}
                                            <a href="{{ route('trip.tripDeti', $trip->id) }}"
                                               class="btn btn-primary d-flex align-items-center justify-content-center"
                                               title="View Trip">

                                                <i class="bi bi-eye"></i>

                                            </a>


                                            {{-- Edit --}}
                                            <a href="{{ route('trip.edit', $trip->id) }}"
                                               class="btn logout-btn d-flex align-items-center justify-content-center"
                                               title="Edit Trip">

                                                <i class="bi bi-pencil-square"></i>

                                            </a>


                                            {{-- Delete --}}
                                            <form action="{{ route('trip.delete', $trip->id) }}"
                                                  method="POST"
                                                  onsubmit="return confirm('Are you sure you want to delete this trip?');">

                                                @csrf

                                                @method('DELETE')

                                                <button type="submit"
                                                        class="btn btn-danger d-flex align-items-center justify-content-center"
                                                        title="Delete Trip">

                                                    <i class="bi bi-trash"></i>

                                                </button>

                                            </form>

                                        </div>

                                    </div>

                                </div>

                            @empty

                                <div class="text-center p-4">

                                    <p class="text-body-secondary">
                                        No trips found.
                                    </p>

                                </div>

                            @endforelse

                        </div>

                    </div>

                </div>


                {{-- Right Side --}}
                <div class="col-lg-4">


                    {{-- Upcoming Trip --}}
                    <div class="upcoming bg-light border shadow-sm rounded-4 p-3">

                        <div class="upcoming-h d-flex align-items-start justify-content-space-between">

                            <div class="d-flex align-items-center text-start">

                                <div class="co-icon promo-icon">
                                    <i class="bi bi-calendar-event"></i>
                                </div>

                                <div class="ms-2">
                                    <h6>Upcoming Trip</h6>
                                </div>

                            </div>


                            <div class="trips-view ms-auto">

                                <a class="text-md" href="{{ route('trip.trips') }}">
                                    View All
                                </a>

                            </div>

                        </div>


                        @if($nextTrip)

                            <div class="upcoming-de mt-3 d-flex align-items-center justify-content-space-between">

                                <div class="img-upcoming">

                                    @if($nextTrip->image)

                                        <img src="{{ asset('storage/' . $nextTrip->image) }}"
                                             class="rounded-4"
                                             alt="trip-img">

                                    @endif

                                </div>


                                <div class="text-start ms-4">

                                    <p class="text-Secondary h4">
                                        {{ $nextTrip->name }}
                                    </p>


                                    <div class="upcoming-dep-cont">

                                        <div class="d-flex align-items-start text-start text-body-secondary">

                                            <div>
                                                <i class="bi bi-calendar-event"></i>
                                            </div>

                                            <div class="ms-2">

                                                <h6>
                                                    From
                                                    {{ \Carbon\Carbon::parse($nextTrip->start_date)->format('d M Y') }}
                                                </h6>

                                            </div>

                                        </div>


                                        <div class="d-flex align-items-start text-start text-body-secondary">

                                            <div>
                                                <i class="bi bi-calendar-event"></i>
                                            </div>

                                            <div class="ms-2">

                                                <h6>
                                                    To
                                                    {{ \Carbon\Carbon::parse($nextTrip->end_date)->format('d M Y') }}
                                                </h6>

                                            </div>

                                        </div>


                                        <div class="d-flex align-items-start text-start text-violet">

                                            <div>
                                                <i class="bi bi-hourglass-split"></i>
                                            </div>

                                            <div class="ms-2">

                                                <h6>
                                                    {{ \Carbon\Carbon::today()->diffInDays(\Carbon\Carbon::parse($nextTrip->start_date)) }}
                                                    Days Remaining
                                                </h6>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        @else

                            <div class="text-center p-4">

                                <p class="text-body-secondary">
                                    No upcoming trips.
                                </p>

                            </div>

                        @endif

                    </div>


                    {{-- Quick Tips --}}
                    <div class="Tips bg-light border shadow-sm rounded-4 p-3 mt-3">

                        <div class="tips-h d-flex align-items-center text-start">

                            <div class="co-icon promo-icon">
                                <i class="bi bi-lightbulb"></i>
                            </div>

                            <div class="ms-2">
                                <h5>Quick Tips</h5>
                            </div>

                        </div>


                        <div class="tips-de mt-4">


                            <div class="tips-item d-flex align-items-start text-start">

                                <div class="box-icon box-icon-gre rounded-4">
                                    <i class="bi bi-envelope-open"></i>
                                </div>

                                <div class="ms-2">

                                    <p class="h6 text-dark">
                                        Add Activities every Day
                                    </p>

                                    <p class="text-body-secondary">
                                        Plan your itinerary hour by hour
                                    </p>

                                </div>

                            </div>


                            <div class="tips-item d-flex align-items-start text-start">

                                <div class="box-icon box-icon-yel rounded-4">
                                    <i class="bi bi-envelope-check-fill"></i>
                                </div>

                                <div class="ms-2">

                                    <p class="h6 text-dark">
                                        Upload important documents
                                    </p>

                                    <p class="text-body-secondary">
                                        Plan your itinerary hour by hour
                                    </p>

                                </div>

                            </div>


                            <div class="tips-item d-flex align-items-start text-start">

                                <div class="box-icon box-icon-blu rounded-4">
                                    <i class="bi bi-brightness-high"></i>
                                </div>

                                <div class="ms-2">

                                    <p class="h6 text-dark">
                                        Check the weather
                                    </p>

                                    <p class="text-body-secondary">
                                        Plan your itinerary hour by hour
                                    </p>

                                </div>

                            </div>


                            <div class="tips-item d-flex align-items-start text-start">

                                <div class="co-icon promo-icon rounded-4">
                                    <i class="bi bi-box-arrow-up-right"></i>
                                </div>

                                <div class="ms-2">

                                    <p class="h6 text-dark">
                                        Share your trip
                                    </p>

                                    <p class="text-body-secondary">
                                        Plan your itinerary hour by hour
                                    </p>

                                </div>

                            </div>


                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection
```
