@extends('layouts.app')

@section('title', 'Applications List')

@section('content')
    <div class="container mt-4">
        <h1>Applications</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Vacancy</th>
                    <th>User</th>
                    <th>Status</th>
                    <th>Resume</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($applications as $application)
                    <tr>
                        <td>{{ $application->id }}</td>
                        <td>{{ $application->vacancy->title }}</td>
                        <td>{{ $application->user->name }}</td>
                        <td>{{ $application->status }}</td>
                        <td>
                            @if ($application->resume)
                                <a href="{{ asset('storage/' . $application->resume) }}" target="_blank">View Resume</a>
                            @else
                                N/A
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('applications.show', $application) }}" class="btn btn-info">View</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
