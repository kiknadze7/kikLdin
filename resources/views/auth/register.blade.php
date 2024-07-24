@extends('layouts.app')

@section('title', 'Register Page')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Register') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="row mb-3">
                                <label for="name"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password-confirm"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-4 col-form-label text-md-end">{{ __('Register as Company') }}</div>

                                <div class="col-md-6">
                                    <input id="is_company" type="checkbox" class="form-check-input" name="is_company"
                                        value="1" {{ old('is_company') ? 'checked' : '' }}>
                                    <label for="is_company" class="form-check-label">{{ __('Yes') }}</label>
                                </div>
                            </div>

                            <div id="company-fields" style="display: {{ old('is_company') ? 'block' : 'none' }}">
                                <div class="row mb-3">
                                    <label for="company_name"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Company Name') }}</label>

                                    <div class="col-md-6">
                                        <input id="company_name" type="text"
                                            class="form-control @error('company_name') is-invalid @enderror"
                                            name="company_name" value="{{ old('company_name') }}"
                                            autocomplete="company_name">

                                        @error('company_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="company_email"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Company Email') }}</label>

                                    <div class="col-md-6">
                                        <input id="company_email" type="email"
                                            class="form-control @error('company_email') is-invalid @enderror"
                                            name="company_email" value="{{ old('company_email') }}"
                                            autocomplete="company_email">

                                        @error('company_email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="company_logo"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Company Logo') }}</label>

                                    <div class="col-md-6">
                                        <input id="company_logo" type="file"
                                            class="form-control @error('company_logo') is-invalid @enderror"
                                            name="company_logo">

                                        @error('company_logo')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="company_website"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Company Website') }}</label>

                                    <div class="col-md-6">
                                        <input id="company_website" type="text"
                                            class="form-control @error('company_website') is-invalid @enderror"
                                            name="company_website" value="{{ old('company_website') }}"
                                            autocomplete="company_website">

                                        @error('company_website')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const isCompanyCheckbox = document.getElementById('is_company');
            const companyFields = document.getElementById('company-fields');

            isCompanyCheckbox.addEventListener('change', function() {
                if (this.checked) {
                    companyFields.style.display = 'block';
                } else {
                    companyFields.style.display = 'none';
                }
            });
        });
    </script>
@endsection
