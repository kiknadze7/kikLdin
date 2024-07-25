@extends('layouts.app')

@section('title', 'Vacancy Details')

@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h4>{{ $vacancy->title }}</h4>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <strong>Description:</strong>
                            <p>{{ $vacancy->description }}</p>
                        </div>
                        <div class="mb-3">
                            <strong>Status:</strong>
                            <p>{{ $vacancy->isactive ? 'Active' : 'Inactive' }}</p>
                        </div>
                        <div class="mb-3">
                            <strong>Resume Required:</strong>
                            <p>{{ $vacancy->is_resume_required ? 'Yes' : 'No' }}</p>
                        </div>
                        <div class="mb-3">
                            <strong>Start Date:</strong>
                            <p>{{ $vacancy->start_date ? $vacancy->start_date->format('M d, Y') : 'N/A' }}</p>
                        </div>
                        <div class="mb-3">
                            <strong>End Date:</strong>
                            <p>{{ $vacancy->end_date ? $vacancy->end_date->format('M d, Y') : 'N/A' }}</p>
                        </div>
                        <div class="mb-3">
                            <strong>Company:</strong>
                            @if ($vacancy->user->company_logo)
                                <div class="d-flex align-items-center">
                                    <img src="{{ asset('storage/' . $vacancy->user->company_logo) }}"
                                        alt="{{ $vacancy->user->company_name }}" class="img-fluid rounded-circle me-3"
                                        style="max-width: 50px; height: auto;">
                                    <p>{{ $vacancy->user->company_name }}</p>
                                </div>
                            @else
                                <p>{{ $vacancy->user->company_name }}</p>
                            @endif
                        </div>

                        <!-- Edit button, visible only if the current user is the owner -->
                        @if (Auth::check() && Auth::id() === $vacancy->user_id)
                            <a href="{{ route('vacancion.edit', $vacancy) }}" class="btn btn-primary">Edit Vacancy</a>
                        @endif

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <!-- Application Form -->
                        <form action="{{ route('applications.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf


                            <input type="hidden" name="vacancy_id" value="{{ $vacancy->id }}">
                            <!-- Pass the vacancy ID -->

                            <div class="mb-3">
                                <label for="resume" class="form-label">Resume (PDF, DOC, DOCX)</label>
                                <input type="file" class="form-control" id="resume" name="resume">
                            </div>

                            <button type="submit" class="btn btn-primary">Submit Application</button>
                        </form>

                        <a href="{{ route('welcome') }}" class="btn btn-secondary mt-3">Back to Vacancies</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('styles')
    @vite(['resources/css/app.css'])
@endpush

@push('scripts')
    @vite(['resources/js/app.js'])
@endpush
