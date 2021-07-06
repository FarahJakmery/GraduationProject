@extends('layouts.app1')

@section('title', 'Create year')
@section('subtitle', 'this for create a new year')

@section('content')
    <div class="container">
        <form action="{{ route('adminyear.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            {{-- year Name --}}
            <div class="field">
                <label class="label">Year Name</label>
                <div class="control">
                    <input class="input {{ $errors->has('name') ? 'is-danger' : '' }}" type="text" name="name"
                        value="{{ old('name') }}">
                    @error('name')
                        <p class="help is-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            {{-- year photo --}}
            <div class="file">
                <label class="file-label">
                    <input class="file-input" type="file" name="photo">
                    <span class="file-cta">
                        <span class="file-icon">
                            <i class="fas fa-upload"></i>
                        </span>
                        <span class="file-label">
                            year photo, Choose an Image…
                        </span>
                    </span>
                </label>
                @error('photo')
                    <p class="help is-danger">{{ $message }}</p>
                @enderror
            </div>

            {{-- save button --}}
            <div class="field">
                <div class="control">
                    <button class="button is-link">Save year</button>
                </div>
            </div>
        </form>
    </div>
@endsection
