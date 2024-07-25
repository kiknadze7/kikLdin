@extends('layouts.app')

@section('title', 'Application Details')

@section('content')
    <div class="container mt-4">
        <h1>Application Details</h1>
        <div class="card">
            <div class="card-header">
                <h4>Application #{{ $application->id }}</h4>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <strong>Vacancy Title:</strong>
                    <p>{{ $application->vacancy->title }}</p>
                </div>
                <div class="mb-3">
                    <strong>User:</strong>
                    <p>{{ $application->user->name }}</p>
                </div>
                <div class="mb-3">
                    <strong>Status:</strong>
                    <p>{{ $application->status }}</p>
                </div>
                <div class="mb-3">
                    <strong>Resume:</strong>
                    @if ($application->resume)
                        <a href="{{ asset('storage/' . $application->resume) }}" target="_blank">View Resume</a>
                    @else
                        N/A
                    @endif
                </div>
                <a href="{{ route('applications.index') }}" class="btn btn-secondary">Back to Applications</a>
            </div>
        </div>
    </div>
@endsection
