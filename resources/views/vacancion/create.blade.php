@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Create Vacancy') }}</div>

                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form method="POST" action="{{ route('vacancion.store') }}">
                            @csrf

                            <div class="form-group">
                                <label for="title">{{ __('Title') }}</label>
                                <input id="title" type="text"
                                    class="form-control @error('title') is-invalid @enderror" name="title"
                                    value="{{ old('title') }}" required autofocus>
                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="description">{{ __('Description') }}</label>
                                <textarea id="description" class="form-control @error('description') is-invalid @enderror" name="description" required>{{ old('description') }}</textarea>
                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="start_date">{{ __('Start Date') }}</label>
                                <input id="start_date" type="date"
                                    class="form-control @error('start_date') is-invalid @enderror" name="start_date"
                                    value="{{ old('start_date') }}">
                                @error('start_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="end_date">{{ __('End Date') }}</label>
                                <input id="end_date" type="date"
                                    class="form-control @error('end_date') is-invalid @enderror" name="end_date"
                                    value="{{ old('end_date') }}">
                                @error('end_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <div class="form-check">
                                    <input type="hidden" name="is_active" value="0">
                                    <input id="is_active" type="checkbox"
                                        class="form-check-input @error('is_active') is-invalid @enderror" name="is_active"
                                        value="1" {{ old('is_active', true) ? 'checked' : '' }}>
                                    <label for="is_active" class="form-check-label">{{ __('Is Active') }}</label>
                                    @error('is_active')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="form-check">
                                    <input type="hidden" name="is_resume_required" value="0">
                                    <input id="is_resume_required" type="checkbox"
                                        class="form-check-input @error('is_resume_required') is-invalid @enderror"
                                        name="is_resume_required" value="1"
                                        {{ old('is_resume_required', true) ? 'checked' : '' }}>
                                    <label for="is_resume_required"
                                        class="form-check-label">{{ __('Is Resume Required') }}</label>
                                    @error('is_resume_required')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                            <button type="submit" class="btn btn-primary">
                                {{ __('Create') }}
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
