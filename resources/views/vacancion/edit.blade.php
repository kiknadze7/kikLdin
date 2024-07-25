@extends('layouts.app')

@section('title', 'Edit Vacancy')

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h4>Edit Vacancy</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('vacancion.update', $vacancy) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror"
                                    id="title" name="title" value="{{ old('title', $vacancy->title) }}" required>
                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" required>{{ old('description', $vacancy->description) }}</textarea>
                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <!-- Additional fields for other attributes -->

                            <div class="mb-3 form-check">
                                <input id="isactive" type="checkbox" class="form-check-input" name="isactive"
                                    {{ old('isactive', $vacancy->isactive) ? 'checked' : '' }}>
                                <label for="isactive" class="form-check-label">Is Active</label>
                            </div>


                            <div class="mb-3">
                                <label for="is_resume_required" class="form-check-label">Is Resume Required</label>
                                <input id="is_resume_required" type="checkbox" class="form-check-input"
                                    name="is_resume_required"
                                    {{ old('is_resume_required', $vacancy->is_resume_required) ? 'checked' : '' }}>
                            </div>

                            <div class="mb-3">
                                <label for="start_date" class="form-label">Start Date</label>
                                <input type="date" class="form-control @error('start_date') is-invalid @enderror"
                                    id="start_date" name="start_date"
                                    value="{{ old('start_date', $vacancy->start_date ? $vacancy->start_date->format('Y-m-d') : '') }}">
                                @error('start_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="end_date" class="form-label">End Date</label>
                                <input type="date" class="form-control @error('end_date') is-invalid @enderror"
                                    id="end_date" name="end_date"
                                    value="{{ old('end_date', $vacancy->end_date ? $vacancy->end_date->format('Y-m-d') : '') }}">
                                @error('end_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">Update Vacancy</button>
                        </form>

                        <a href="{{ route('vacancion.show', $vacancy) }}" class="btn btn-secondary mt-3">Back to
                            Details</a>
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
