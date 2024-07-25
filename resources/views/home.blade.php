@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>
                    @auth
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <div>
                                    @if (Auth::user()->is_company)
                                        <h5>Company Name: {{ Auth::user()->company_name }}</h5>
                                        <p>Email: {{ Auth::user()->company_email }}</p>
                                        <p>Website: <a href="{{ Auth::user()->company_website }}"
                                                target="_blank">{{ Auth::user()->company_website }}</a></p>
                                    @else
                                        <p>Welcome, {{ Auth::user()->name }}!</p>
                                    @endif
                                </div>
                                @if (Auth::user()->company_logo)
                                    <div>
                                        <img src="{{ asset('storage/' . Auth::user()->company_logo) }}" alt="Company Logo"
                                            class="img-fluid rounded-circle" style="max-width: 100px; height: auto;">
                                    </div>
                                @endif
                            </div>

                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif

                            @if (Auth::user()->is_company)
                                <div class="mt-4 d-flex flex-column flex-md-row justify-content-around">
                                    <a class="btn btn-primary mb-2 mb-md-0" href="{{ route('welcome') }}">Jobs</a>
                                    <a class="btn btn-info mb-2 mb-md-0" href="{{ route('vacancion.create') }}">Create Jobs</a>
                                    <a class="btn btn-success mb-2 mb-md-0"
                                        href="{{ route('applications.index') }}">Applications</a>
                                    {{-- <a class="btn btn-warning mb-2 mb-md-0" href="{{ route('image.index') }}">Image Upload</a> --}}
                                </div>
                            @else
                                <div class="mt-4 d-flex flex-column flex-md-row justify-content-around">
                                    <a class="btn btn-primary mb-2 mb-md-0" href="{{ route('welcome') }}">Find Jobs</a>
                                    <a class="btn btn-info mb-2 mb-md-0" href="{{ route('applications.index') }}">My
                                        Applications</a>
                                </div>
                            @endif
                        </div>
                    @endauth
                </div>
            </div>
        </div>
    </div>
@endsection
