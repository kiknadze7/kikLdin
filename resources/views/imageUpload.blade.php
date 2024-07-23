@extends('layouts.app')

@section('title', 'file upload')

@section('content')

    <div class="container">

        <div class="card mt-5">
            <h3 class="card-header p-3"><i class="fa fa-star"></i>kildin uload photo</h3>
            <div class="card-body">

                @session('success')
                    <div class="alert alert-success" role="alert">
                        {{ $value }}
                    </div>
                    <img src="images/{{ Session::get('image') }}" width="40%">
                @endsession

                <form action="{{ route('image.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label" for="inputImage">Image:</label>
                        <input type="file" name="image" id="inputImage"
                            class="form-control @error('image') is-invalid @enderror">

                        @error('image')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Upload</button>
                    </div>
                    <h2>Images Gallery</h2>
                    <div class="gallery">
                        @foreach ($images as $image)
                            <img style="height: 100px" src="{{ asset('images/' . $image->getFilename()) }}" alt="Image">
                        @endforeach
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
