@extends('layouts.app1')

@section('content')
    <div class="container">
        <form action="{{ route('lectures.update', $lecture->id) }}" method="post" enctype="multipart/form-data">
            <input name="_method" type="hidden" value="PUT">
            @csrf

            {{-- The Title of the Lecture --}}
            <div class="field">
                <label class="label">Title</label>
                <div class="control">
                    <input class="input {{ $errors->has('name') ? 'is-danger' : '' }}" type="text" name="name"
                        placeholder="Lecture Title ..." value="{{ old('name') ?? $lecture->name }}">
                    @error('name')
                        <p class="help is-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            {{-- The Name of the Course that the Lecture belongs to --}}
            <div class="field">
                <label class="label">Course</label>
                <div class="control">
                    <div class="select">
                        <select name="course_id">
                            <option>Select dropdown</option>
                            @foreach ($courses as $course)
                                <option value="{{ $course->id }}"
                                    {{ $course->id == $lecture->course_id ? 'selected' : '' }}>{{ $course->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    @error('category_id')
                        <p class="help is-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            {{-- The Description of the Lecture --}}
            <div class="field">
                <label class="label">Description</label>
                <div class="control">
                    <textarea class="textarea {{ $errors->has('description') ? 'is-danger' : '' }}" name="description"
                        placeholder="Lecture description goes here ...">{{ old('description') ?? $lecture->description }}</textarea>
                    @error('description')
                        <p class="help is-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            {{-- The Video of the Lecture --}}
            <div class="file">
                <label class="file-label">
                    <input class="file-input" type="file" name="video">
                    <span class="file-cta">
                        <span class="file-icon">
                            <i class="fas fa-upload"></i>
                        </span>
                        <span class="file-label">
                            Video URL, Choose a file…
                        </span>
                    </span>
                </label>
                @error('video')
                    <p class="help is-danger">{{ $message }}</p>
                @enderror
            </div>

            {{-- The pdf of the Lecture --}}
            <div class="file">
                <label class="file-label">
                    <input class="file-input" type="file" name="pdf">
                    <span class="file-cta">
                        <span class="file-icon">
                            <i class="fas fa-upload"></i>
                        </span>
                        <span class="file-label">
                            pdf , Choose a file…
                        </span>
                    </span>
                </label>
                @error('pdf')
                    <p class="help is-danger">{{ $message }}</p>
                @enderror
            </div>

            {{-- The Submit button --}}
            <div class="field">
                <div class="control">
                    <button class="button is-link">Save Lecture</button>
                </div>
            </div>
        </form>
    </div>
@endsection
