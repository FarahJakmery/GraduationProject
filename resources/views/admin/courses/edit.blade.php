@extends('layouts.app1')

@section('title', 'Edit: ' . $course->name)

@section('content')
    <div class="container">
        <form action="{{ route('courses.update', $course->id) }}" method="post">
            <input name="_method" type="hidden" value="PUT">
            @csrf
            <div class="field">
                <label class="label">Logo</label>
                <div class="control">
                    <input class="input {{ $errors->has('logo') ? 'is-danger' : '' }}" type="text" name="logo"
                        placeholder="https://www.domain.com/test-image.jpg" value="{{ old('logo') ?? $course->logo }}">
                    @error('logo')
                        <p class="help is-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="field">
                <label class="label"> Course Name:</label>
                <div class="control">
                    <input class="input {{ $errors->has('name') ? 'is-danger' : '' }}" type="text" name="name"
                        placeholder="course name ..." value="{{ old('name') ?? $course->name }}">
                    @error('name')
                        <p class="help is-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="field">
                <label class="label">Description About This Course:</label>
                <div class="control">
                    <input class="input {{ $errors->has('description') ? 'is-danger' : '' }}" type="text"
                        name="description" placeholder="Post description ..."
                        value="{{ old('description') ?? $course->description }}">
                    @error('description')
                        <p class="help is-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="field">
                <label class="label">Professor Name:</label>
                <div class="control">
                    <div class="select">
                        <select name="professor_id">
                            @foreach ($professors as $professor)
                                <option value="{{ $professor->id }}"
                                    {{ $professor->id == $course->professor_id ? 'selected' : '' }}>
                                    {{ $professor->user->full_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    @error('professor_id')
                        <p class="help is-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="field">
                <label class="label">Semester:</label>
                <div class="control">
                    <div class="select">
                        <select name="semester_id">
                            @foreach ($semesters as $semester)
                                <option value="{{ $semester->id }}"
                                    {{ $semester->id == $course->semester_id ? 'selected' : '' }}>
                                    {{ $semester->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    @error('semester_id')
                        <p class="help is-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="field">
                <div class="control">
                    <button class="button is-link">Modify Course</button>
                </div>
            </div>
        </form>
    </div>
@endsection