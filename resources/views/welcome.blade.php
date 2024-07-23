@extends('layouts.app')

@section('title', 'Main Page')

@section('content')
    <div class="swiper mySwiperClass" style='width:90%; height:230px;'>
        <div class="swiper-wrapper">

            <!-- Slides -->
            @for ($i = 0; $i < 10; $i++)
                <div class="swiper-slide">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Company {{ $i }}</h5>
                            <div style="display:flex">
                                <p class="card-text">
                                    DescriptionDescriptionDescription
                                    DescriptionDescriptionDescriptionDescri
                                    ptionDescriptionDescriptionDescription
                                    ptionDescriptionDescriptionDescription
                                    {{ $i }}
                                </p>
                                <img style="width:100px; height:100px;" src="https://via.placeholder.com/150"
                                    class="card-img-top" alt="Company {{ $i }}" />
                            </div>
                        </div>
                    </div>
                </div>
            @endfor
        </div>
        <div class="swiper-pagination"></div>
    </div>

    <!-- Grid Job Cart -->
    <div class="container mt-5">
        <div class="row">
            @for ($j = 0; $j < 26; $j++)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Job {{ $j }}</h5>
                            <p class="card-text">
                                Job Description {{ $j }}
                            </p>
                        </div>
                    </div>
                </div>
            @endfor
        </div>
    </div>
@endsection

@push('styles')
    @vite(['resources/css/app.css'])
@endpush

@push('scripts')
    @vite(['resources/js/app.js'])
@endpush
