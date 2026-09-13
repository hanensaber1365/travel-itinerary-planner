@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

   <div class="main-dashboard m-3">
        <div class="boxs">
           <div class="container-fluid text-center">
                <div class="row align-items-center">
                    <div class="col-xl-3 col-md-4">
                       <div class="bg-light border shadow-sm rounded-4 p-3 d-flex align-items-center ">
                            <div class="co-icon promo-icon"><i class="bi bi-suitcase-fill"></i></div>
                            <div class="co-content text-start ms-3 ">
                                <p class="text-Secondary">Total Trips</p>
                                <h2>3</h2>
                                <p class="text-Secondary">All Your Trips</p>
                            </div>
                       </div>
                    </div>
                    <div class="col-xl-3 col-md-4">
                       <div class="bg-light border shadow-sm rounded-4 p-3 d-flex align-items-center ">
                            <div class="co-icon box-icon box-icon-yel"><i class="bi bi-clock"></i></div>
                            <div class="co-content text-start ms-3 ">
                                <p class="text-Secondary">Days To Travel</p>
                                <h2>19</h2>
                                <p class="text-Secondary">Until Next Tripe</p>
                            </div>
                       </div>
                    </div>
                    <div class="col-xl-3 col-md-4">
                       <div class="bg-light border shadow-sm rounded-4 p-3 d-flex align-items-center ">
                            <div class="co-icon box-icon box-icon-gre"><i class="bi bi-calendar-event"></i></div>
                            <div class="co-content text-start ms-3 ">
                                <p class="text-Secondary">Upcoming Trips</p>
                                <h2>1</h2>
                                <p class="text-Secondary">Next 30 Days</p>
                            </div>
                       </div>
                    </div>
                    <div class="col-xl-3 col-md-4">
                       <div class="bg-light border shadow-sm rounded-4 p-3 d-flex align-items-center ">
                            <div class="co-icon box-icon box-icon-blu"><i class="bi bi-file-earmark-text"></i></div>
                            <div class="co-content text-start ms-3 ">
                                <p class="text-Secondary">Documents</p>
                                <h2>8</h2>
                                <p class="text-Secondary">Total Uploaded</p>
                            </div>
                       </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="hero-sec my-4">
            <div class="container-fluid text-center">
                <div class="row align-items-start">
                    <div class="col-lg-8">
                        <div class="trip bg-light border shadow-sm rounded-4 p-3">
                            <div class="trip-h d-flex align-items-center text-start">
                                <div class="co-icon promo-icon"><i class="bi bi-airplane"></i></div>
                                <div class="ms-2"><h5>Your Next Trip</h5></div>                            
                            </div>
                            <div class="trip-de p-5 my-4 rounded-4">
                                <div class="row align-items-center justify-content-space-between">
                                    <div class="col-md-6 content-de text-white text-start">
                                        <h2>Paris</h2>
                                        <p>20 Sep 2026-25 Sep 2026</p>
                                        <p>Paris,France</p>
                                    </div>
                                    <div class="col-md-6 time-de bg-light border shadow-sm rounded-4 p-3">
                                        <div class="time-de-cont text-center">
                                            <p class="text-Secondary">Trip Starts in</p>
                                            <p class="h1 ">19 <br> <span class="text-Secondary h6">Days</span></p>
                                            <div class="d-flex align-items-center justify-content-center gap-5">
                                            <p class="h5 ">08 <br> <span class="text-Secondary h6">Hours</span></p>
                                            <p class="h5 ">32 <br> <span class="text-Secondary h6">Minutes</span></p>
                                            <p class="h5 ">15 <br> <span class="text-Secondary h6">Seconds</span></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="trip-btn d-flex align-items-center">
                                <div>
                                    <a href="{{ route('trips') }}" class="btn btn-primary w-100 d-flex align-items-center justify-content-center gap-2">
                                       <i class="bi bi-pencil-square"></i> View Trip Details
                                    </a>
                                </div>
                                <div>
                                    <a href="{{ route('trips') }}" class="btn logout-btn d-flex align-items-center gap-3 w-100 px-4 py-3"">
                                       <i class="bi bi-pencil-square"></i> Edit Trip
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="all-trips bg-light border shadow-sm rounded-4 p-3 mt-3">
                        <div class="all-trips-h d-flex align-items-center justify-content-space-between">
                            <div class="trip-h d-flex align-items-center text-start">
                                <div class="co-icon promo-icon"><i class="bi bi-suitcase-fill"></i></div>
                                <div class="ms-2"><h5>Your Next Trip</h5></div>
                            </div>    
                            <div class="trips-view ms-auto">
                                <a class="h3" href="{{ route('trip.trips') }}">View All Trips</a>
                            </div>                        
                            </div>
                        <div class="all-trips-view border shadow-sm rounded-4 p-3 mt-3">
                        <div class="row trip-on align-items-center p-2 justify-content-space-between border-bottom">
                            <div class="col-sm-3 all-trip-img"><img src="{{ asset('images/pais.jpg') }}" class=" rounded-4" alt="trip-img" ></div>
                            <div class="col-sm-3">
                                <p class="h3">Paris</p>
                                <p>Paris,France</p>
                            </div>
                            <div class="col-sm-3">
                                <p>20 Sep 2026</p>
                                <p>-25 Sep 2026</p>
                            </div>
                            <div class="col-sm-3">
                                <a href="{{ route('trips') }}" class="btn logout-btn  d-flex align-items-center gap-3 w-100 px-4 py-3">Detiels...</a>
                            </div>
                        </div>
                        </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                    <div class="upcoming bg-light border shadow-sm rounded-4 p-3">
                        <div class="upcoming-h d-flex align-items-start justify-content-space-between">
                            <div class="d-flex align-items-center text-start">
                                <div class="co-icon promo-icon"><i class="bi bi-calendar-event"></i></div>
                                <div class="ms-2"><h6>Upcoming Trip</h6></div>
                            </div>    
                            <div class="trips-view ms-auto">
                                <a class="text-md" href="{{ route('trip.trips') }}">View All</a>
                            </div>                        
                            </div>
                        <div class="upcoming-de mt-3 d-flex align-items-center justify-content-space-between">
                            <div class="img-upcoming"><img src="{{ asset('images/pais.jpg') }}" class=" rounded-4" alt="trip-img" ></div>
                            <div class=" text-start ms-4 ">
                                <p class="text-Secondary h4">Paris</p>
                                <div class="upcoming-dep-cont">
                                    <div class="d-flex align-items-start text-start text-body-secondary">
                                        <div class=""><i class="bi bi-calendar-event"></i></div>
                                        <div class="ms-2"><h6>From 20 Sep 2026</h6></div>
                                    </div>
                                    <div class="d-flex align-items-start text-start text-body-secondary">
                                        <div class=""><i class="bi bi-calendar-event"></i></div>
                                        <div class="ms-2"><h6>To 25 Sep 2026</h6></div>
                                    </div>
                                    <div class="d-flex align-items-start text-start text-violet">
                                        <div class=""><i class="bi bi-hourglass-split"></i></div>
                                        <div class="ms-2"><h6>19 Days Remaining</h6></div>
                                    </div>
                                </div>
                            </div>
                       </div>
                    </div>
                    <div class="Tips bg-light border shadow-sm rounded-4 p-3 mt-3">
                        <div class="tips-h d-flex align-items-center text-start">
                                <div class="co-icon promo-icon"><i class="bi bi-lightbulb"></i></div>
                                <div class="ms-2"><h5>Quick Tips</h5></div>                            
                            </div>
                            <div class="tips-de mt-4">
                            <div class="tips-item d-flex align-items-start text-start">
                                <div class="box-icon box-icon-gre rounded-4"><i class="bi bi-envelope-open"></i></div>
                                <div class="ms-2">
                                <p class="h6 text-dark">Add Activities every Day </p>
                                <p class="text-body-secondary">Plan your itinerary hour by hour</p>
                                </div>                            
                            </div>
                            <div class="tips-item d-flex align-items-start text-start">
                                <div class="box-icon box-icon-yel rounded-4"><i class="bi bi-envelope-check-fill"></i></div>
                                <div class="ms-2">
                                <p class="h6 text-dark">Upload important documents </p>
                                <p class="text-body-secondary">Plan your itinerary hour by hour</p>
                                </div>                            
                            </div>
                            <div class="tips-item d-flex align-items-start text-start">
                                <div class="box-icon box-icon-blu rounded-4"><i class="bi bi-brightness-high"></i></div>
                                <div class="ms-2">
                                <p class="h6 text-dark">Check the weather </p>
                                <p class="text-body-secondary">Plan your itinerary hour by hour</p>
                                </div>                            
                            </div>
                            <div class="tips-item d-flex align-items-start text-start">
                                <div class="co-icon promo-icon rounded-4"><i class="bi bi-box-arrow-up-right"></i></div>
                                <div class="ms-2">
                                <p class="h6 text-dark">Share your trip</p>
                                <p class="text-body-secondary">Plan your itinerary hour by hour</p>
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