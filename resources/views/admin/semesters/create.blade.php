@extends('layouts.app1')

@section('title', 'Create semester')
@section('subtitle', 'this for create a new semester')

@section('content')
    <div class="container">
        <form action="{{ route('adminsemester.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            {{-- select year --}}
            <div class="field">
                <label class="label">Select year</label>
                <div class="control">
                    <div class="select">
                        <select name="year_id">
                            @foreach ($years as $year)
                                <option value="{{ $year->id }}">{{ $year->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('year_id')
                        <p class="help is-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            {{-- semester Name --}}
            <div class="field">
                <label class="label">semester Name</label>
                <div class="control">
                    <input class="input {{ $errors->has('name') ? 'is-danger' : '' }}" type="text" name="name"
                        value="{{ old('name') }}">
                    @error('name')
                        <p class="help is-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            {{-- semester photo --}}
            <div class="file">
                <label class="file-label">
                    <input class="file-input" type="file" name="photo">
                    <span class="file-cta">
                        <span class="file-icon">
                            <i class="fas fa-upload"></i>
                        </span>
                        <span class="file-label">
                            semester photo, Choose an Image…
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
                    <button class="button is-link">Save semester</button>
                </div>
            </div>
        </form>
    </div>
@endsection
