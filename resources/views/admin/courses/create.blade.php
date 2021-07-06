@extends('layouts.app1')

@section('title', 'Create Course')
@section('subtitle', 'this for create a new course')

@section('content')
    <div class="container">
        <form action="{{ route('courses.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            {{-- select semester --}}
            <div class="field">
                <label class="label">Select Semester</label>
                <div class="control">
                    <div class="select">
                        <select name="semester_id">
                            @foreach ($semesters as $semester)
                                <option value="{{ $semester->id }}">{{ $semester->name }}.{{ $semester->year->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    @error('semester_id')
                        <p class="help is-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            {{-- select  professor --}}
            <div class="field">
                <label class="label">Select Professor</label>
                <div class="control">
                    <div class="select">
                        <select name="professor_id">
                            @foreach ($professors as $professor)
                                <option value="{{ $professor->id }}">{{ $professor->user->full_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('professor_id')
                        <p class="help is-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            {{-- Course Name --}}
            <div class="field">
                <label class="label">Course Name</label>
                <div class="control">
                    <input class="input {{ $errors->has('name') ? 'is-danger' : '' }}" type="text" name="name"
                        value="{{ old('name') }}">
                    @error('name')
                        <p class="help is-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            {{-- Course description --}}
            <div class="field">
                <label class="label">Course Description</label>
                <div class="control">
                    <input class="input {{ $errors->has('description') ? 'is-danger' : '' }}" type="text"
                        name="description" value="{{ old('description') }}">
                    @error('description')
                        <p class="help is-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>


            {{-- Course logo --}}

            <div class="file">
                <label class="file-label">
                    <input class="file-input" type="file" name="logo">
                    <span class="file-cta">
                        <span class="file-icon">
                            <i class="fas fa-upload"></i>
                        </span>
                        <span class="file-label">
                            Course Logo, Choose an Image…
                        </span>
                    </span>
                </label>
                @error('logo')
                    <p class="help is-danger">{{ $message }}</p>
                @enderror
            </div>

            {{-- save button --}}
            <div class="field">
                <div class="control">
                    <button class="button is-link">Save Course</button>
                </div>
            </div>
        </form>
    </div>
@endsection
