@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>
                    @auth
                        <div class="card-body">
                            <h1>Hi, {{ Auth::user()->name }}</h1>
                            <p>Your email is: {{ Auth::user()->email }}</p>
                            <p>Your role is: {{ Auth::user()->role }}</p>
                            <p>Your created at: {{ Auth::user()->created_at }}</p>
                        </div>

                    @endauth
                    <img src="{{ asset('storage/' . Auth::user()->company_logo) }}" alt="Company Logo">

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <a class="nav-link" href="{{ route('welcome') }}">jobs</a>
                        <a class="nav-link" href="{{ route('welcome') }}">create company</a>
                        <a class="nav-link" href="{{ route('welcome') }}">create jobs</a>
                        <a class="nav-link" href="{{ route('image.index') }}">image upload</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
