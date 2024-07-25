@extends('layouts.app')

@section('title', 'Main Page')

@section('content')
    <!-- Swiper Slider -->
    <div class="swiper mySwiperClass" style='width:90%; height:230px;'>
        <div class="swiper-wrapper">
            <!-- Slides -->
            @foreach ($vacancies as $vacancy)
                <div class="swiper-slide" onclick="window.location.href='{{ route('vacancion.show', $vacancy) }}'">
                    <div class="card">
                        <div class="card-body d-flex align-items-center">
                            <!-- Text content -->
                            <div class="text-content me-3">
                                <h5 class="card-title">{{ $vacancy->title }}</h5>
                                <p class="card-text">
                                    {{ Str::limit($vacancy->description, 150) }}
                                </p>
                            </div>
                            <!-- Image -->
                            @if ($vacancy->user->company_logo)
                                <img src="{{ asset('storage/' . $vacancy->user->company_logo) }}"
                                    alt="{{ $vacancy->user->company_name }}" class="img-fluid rounded-circle"
                                    style="max-width: 100px; height: auto;">
                            @else
                                <img src="https://via.placeholder.com/150" alt="Placeholder"
                                    class="img-fluid rounded-circle" style="max-width: 100px; height: auto;">
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="swiper-pagination"></div>
    </div>

    <!-- Grid Job Cards -->
    <div class="container mt-5">
        <div class="row">
            @foreach ($vacancies as $vacancy)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body d-flex align-items-center">
                            <!-- Job Title -->
                            <div class="text-content me-3">
                                <h5 class="card-title">{{ $vacancy->title }}</h5>
                                <p class="card-text">
                                    {{ Str::limit($vacancy->description, 100) }}
                                </p>
                                <a href="{{ route('vacancion.show', $vacancy) }}" class="btn btn-primary">View Details</a>
                            </div>
                            <!-- Company Logo -->
                            @if ($vacancy->user->company_logo)
                                <img src="{{ asset('storage/' . $vacancy->user->company_logo) }}"
                                    alt="{{ $vacancy->user->company_name }}" class="img-fluid rounded-circle"
                                    style="max-width: 100px; height: auto;">
                            @else
                                <img src="https://via.placeholder.com/150" alt="Placeholder"
                                    class="img-fluid rounded-circle" style="max-width: 100px; height: auto;">
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

@push('styles')
    @vite(['resources/css/app.css'])
@endpush

@push('scripts')
    @vite(['resources/js/app.js'])
@endpush
