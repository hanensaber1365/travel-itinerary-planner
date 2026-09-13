<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Travel Planner')</title>

    {{-- Bootstrap 5 --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    {{-- Bootstrap Icons --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    {{-- Custom theme --}}
    @vite('resources/css/travel-planner.css')

    @stack('styles')
    {{-- عشان ال vite مش راضي يتعرف علي url الصوره الي في dashboard --}}
    <style>
    .trip-de {
        background-image: url("{{ asset('images/pais.jpg') }}") !important;
        background-position: center bottom;
        background-size: cover;
        
    }
</style>
</head>
<body>

    <div class="app-shell d-flex">

        @include('partials.sidebar')

        <div class="main-column flex-grow-1 d-flex flex-column">

            @include('partials.header')

            <main class="page-content flex-grow-1 px-4 pb-4">
                @yield('content')
            </main>

        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>
</html>