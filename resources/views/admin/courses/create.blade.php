@extends('layouts.app1')

@section('title', 'Create Course')
@section('subtitle', 'this for create a new course')

@section('content')
    <div class="container">
        <form action="{{ route('courses.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <figure class="image create">
                <img class="createimg" src="/images/Decoration2.png">
            </figure>
            {{-- inverse image --}}
            <figure class="image inverse">
                <img class="inverseimg" src="/images/Decoration2.png">
            </figure>

            {{-- Course Name --}}
            <div class="field">
                <label class="label inputtitle">Course Name:</label>
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
                <label class="label  inputtitle">Description:</label>
                <div class="control">
                    <textarea class="textarea {{ $errors->has('description') ? 'is-danger' : '' }}" name="description"
                        placeholder="course description goes here ...">{{ old('description') }}</textarea>
                    @error('description')
                        <p class="help is-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>


            {{-- select semester --}}
            <div class="field">
                <label class="label inputtitle">Select Semester:</label>
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
                <label class="label inputtitle">Select Professor:</label>
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




            {{-- Course logo --}}
            <div id="logo_upload" class="file has-name is-fullwidth my-4">
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
                @error('pdf')
                    <p class="help is-danger">{{ $message }}</p>
                @enderror
            </div>

            {{-- save button --}}
            <div class="field">
                <div class="control">
                    <button class="button">Save Course</button>
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
