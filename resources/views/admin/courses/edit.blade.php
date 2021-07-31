@extends('layouts.app1')

@section('title', 'Edit Course')

@section('content')
    <div class="container">
        <form action="{{ route('courses.update', $course->id) }}" method="post">
            <input name="_method" type="hidden" value="PUT">
            @csrf
            {{-- origin image --}}
            <figure class="image create">
                <img class="createimg" src="/images/Decoration2.png">
            </figure>
            {{-- inverse image --}}
            <figure class="image inverse">
                <img class="inverseimg" src="/images/Decoration2.png">
            </figure>

            {{-- course name --}}
            <div class="field">
                <label class="label inputtitle"> Course Name</label>
                <div class="control">
                    <input class="input {{ $errors->has('name') ? 'is-danger' : '' }}" type="text" name="name"
                        placeholder="course name ..." value="{{ old('name') ?? $course->name }}">
                    @error('name')
                        <p class="help is-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            {{-- course description --}}
            <div class="field">
                <label class="label inputtitle">Description About This Course</label>
                <div class="control">
                    <textarea class="textarea {{ $errors->has('description') ? 'is-danger' : '' }}" name="description"
                        placeholder="Lecture description goes here ...">{{ old('description') ?? $course->description }}</textarea>
                    @error('description')
                        <p class="help is-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>


            <div class="position">
                {{-- select semester --}}
                <div class="field">
                    <label class="label inputtitle"> Select Semester</label>
                    <div class="control">
                        <div class="select">
                            <select name="semester_id">
                                @foreach ($semesters as $semester)
                                    <option value="{{ $semester->id }}"
                                        {{ $semester->id == $course->semester_id ? 'selected' : '' }}>
                                        {{ $semester->name }} .{{ $semester->year->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        @error('semester_id')
                            <p class="help is-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                {{-- select professor --}}
                <div class="field selectprof">
                    <label class="label inputtitle">Professor Name</label>
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
            </div>
            {{-- course logo --}}
            <div id="logo_upload" class="file has-name is-fullwidth my-5">
                <label class="file-label">
                    <input class="file-input" type="file" name="logo">
                    <span class="file-cta">
                        <span class="file-icon">
                            <i class="fas fa-upload"></i>
                        </span>
                        <span class="file-label">
                            Course logo,Choose an Image
                        </span>
                    </span>
                    <span class="file-name">
                        No file uploaded
                    </span>
                </label>
                @error('logo')
                    <p class="help is-danger">{{ $message }}</p>
                @enderror
            </div>


            {{-- button edit --}}
            <div class="field">
                <div class="control">
                    <button class="button">Modify Course</button>
                </div>
            </div>
        </form>
    </div>
@endsection
@push('script')
    <script>
        const fileInput1 = document.querySelector('#logo_upload input[type=file]');
        fileInput1.onchange = () => {
            if (fileInput1.files.length > 0) {
                const fileName = document.querySelector('#logo_upload .file-name');
                fileName.textContent = fileInput1.files[0].name;
            }
        }
    </script>
@endpush
