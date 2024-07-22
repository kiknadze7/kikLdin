@extends('layouts.app')

@section('title', 'Main Page')

@section('content')
    <div class="swiper mySwiperClass" style='
    width:90% ;
    height:230px
    '>
        <div class="swiper-wrapper">
            <!-- Slides -->

            @for ($i = 0; $i < 10; $i++)
                <div class="swiper-slide">
                    <div class="card ">
                        <div class="card-body">
                            <h5 class="card-title
                            ">Company {{ $i }}</h5>
                            <div style="display:flex">
                                <p class="card-text">
                                    DescriptionDescriptionDescription
                                    DescriptionDescriptionDescriptionDescri
                                    ptionDescriptionDescriptionDescription
                                    ptionDescriptionDescriptionDescription
                                    {{ $i }}</p>
                                <img style="
                                width:100px;
                                height:100px;"
                                    src="https://via.placeholder.com/150" class="card-img-top"
                                    alt="Company {{ $i }}" />
                            </div>
                        </div>
                    </div>
                </div>
            @endfor

        </div>
        <div class="swiper-pagination"></div>
    </div>
@endsection

@push('styles')
    @vite(['resources/css/app.css'])
@endpush

@push('scripts')
    @vite(['resources/js/app.js'])
@endpush
