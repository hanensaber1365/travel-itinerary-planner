<!-- resources/views/partials/sidebar.blade.php -->
<aside class="sidebar d-flex flex-column">

    <div class="sidebar-brand">
    <img src="{{ asset('images/logo.png') }}" alt="Travel Planner" class="img-fluide">
</div>

    {{-- Navigation --}}
    <nav class="nav flex-column px-3 mt-2 gap-1">
        @php
    $navItems = [
        ['route' => 'dashboard', 'label' => 'Dashboard', 'icon' => 'bi-grid-fill'],
        ['route' => 'trip.trips',     'label' => 'My Trips',  'icon' => 'bi-suitcase-fill'],
        ['route' => 'calendar',  'label' => 'Calendar',  'icon' => 'bi-calendar-event'],
    ];
@endphp

        @foreach ($navItems as $item)
            <a href="{{ route($item['route']) }}"
               class="nav-link sidebar-link d-flex align-items-center gap-3 {{ request()->routeIs($item['route']) ? 'active' : '' }}">
                <i class="bi {{ $item['icon'] }}"></i>
                {{ $item['label'] }}
            </a>
        @endforeach
    </nav>

    {{-- Promo card --}}
    <div class="sidebar-promo mx-3 mt-auto mb-3 rounded-4 text-center p-4">
        <div class="promo-icon mx-auto mb-3">
            <i class="bi bi-suitcase2-fill"></i>
        </div>
        <p class="fw-semibold mb-1 text-dark" style="font-size: 14px;">Ready for your next adventure?</p>
        <p class="text-muted mb-3" style="font-size: 12px;">Plan, organize and enjoy your trips with ease.</p>
        <a href="{{ route('trip.createTrip') }}" class="btn btn-primary w-100 d-flex align-items-center justify-content-center gap-2">
            <i class="bi bi-plus-lg"></i> Create new trip
        </a>
    </div>

    {{-- Logout --}}
    <form method="POST" action="{{ route('logout') }}" class="border-top">
        @csrf
        <button type="submit" class="btn logout-btn d-flex align-items-center gap-3 w-100 px-4 py-3">
            <i class="bi bi-box-arrow-right"></i> Logout
        </button>
    </form>
</aside>