@extends('layouts.app')

@section('title', 'Edit Trip')

@section('content')

<div class="container-fluid mt-4">

    <div class="bg-light border shadow-sm rounded-4 p-4">

        <div class="d-flex align-items-center mb-4">
            <div class="co-icon promo-icon">
                <i class="bi bi-pencil-square"></i>
            </div>

            <div class="ms-3">
                <h3 class="mb-1">Edit Trip</h3>
                <p class="text-secondary mb-0">
                    Update your travel plan
                </p>
            </div>
        </div>

        <form action="{{ route('trip.update', $trip->id) }}"
              method="POST"
              enctype="multipart/form-data">

            @csrf
            @method('PUT')

            <div class="row g-4">

                {{-- Trip Name --}}
                <div class="col-md-6">
                    <label for="name" class="form-label">
                        Trip Name
                    </label>

                    <input
                        type="text"
                        name="name"
                        id="name"
                        class="form-control"
                        value="{{ old('name', $trip->name) }}"
                        required
                    >

                    @error('name')
                        <small class="text-danger">
                            {{ $message }}
                        </small>
                    @enderror
                </div>


                {{-- Start Date --}}
                <div class="col-md-6">
                    <label for="start_date" class="form-label">
                        Start Date
                    </label>

                    <input
                        type="date"
                        name="start_date"
                        id="start_date"
                        class="form-control"
                        value="{{ old('start_date', $trip->start_date) }}"
                        required
                    >

                    @error('start_date')
                        <small class="text-danger">
                            {{ $message }}
                        </small>
                    @enderror
                </div>


                {{-- End Date --}}
                <div class="col-md-6">
                    <label for="end_date" class="form-label">
                        End Date
                    </label>

                    <input
                        type="date"
                        name="end_date"
                        id="end_date"
                        class="form-control"
                        value="{{ old('end_date', $trip->end_date) }}"
                        required
                    >

                    @error('end_date')
                        <small class="text-danger">
                            {{ $message }}
                        </small>
                    @enderror
                </div>


                {{-- Trip Image --}}
                <div class="col-md-6">
                    <label for="image" class="form-label">
                        Trip Image
                    </label>

                    <input
                        type="file"
                        name="image"
                        id="image"
                        class="form-control"
                        accept="image/*"
                    >

                    @error('image')
                        <small class="text-danger">
                            {{ $message }}
                        </small>
                    @enderror

                    @if($trip->image)
                        <small class="text-secondary d-block mt-2">
                            Current image: {{ $trip->image }}
                        </small>
                    @endif
                </div>

            </div>


            <div class="d-flex gap-3 mt-4">

                <button type="submit" class="btn btn-primary px-4">
                    <i class="bi bi-check-circle me-2"></i>
                    Update Trip
                </button>

                <a href="{{ route('trip.trips') }}"
                   class="btn logout-btn px-4">
                    Cancel
                </a>

            </div>

        </form>

    </div>

</div>

@endsection