@extends('layouts.app1')

@section('title', 'Create Lecture')

@section('content')
    <div class="container">
        <form action="{{ route('lectures.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            {{-- The Name of the Course that the Lecture belongs to --}}
            <div class="field">
                <label class="label">Course</label>
                <div class="control">
                    <div class="select">
                        <select name="course_id">
                            @foreach ($courses as $course)
                                <option value="{{ $course->id }}">{{ $course->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('category_id')
                        <p class="help is-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>


            {{-- The Title of the Lecture --}}
            <div class="field">
                <label class="label">Title</label>
                <div class="control">
                    <input class="input {{ $errors->has('name') ? 'is-danger' : '' }}" type="text" name="name"
                        placeholder="Lecture Title ..." value="{{ old('name') }}">
                    @error('name')
                        <p class="help is-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>




            {{-- The Description of the Lecture --}}
            <div class="field">
                <label class="label">Description</label>
                <div class="control">
                    <textarea class="textarea {{ $errors->has('description') ? 'is-danger' : '' }}" name="description"
                        placeholder="Lecture description goes here ...">{{ old('description') }}</textarea>
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
           <div class="file has-name is-fullwidth">
            <label class="file-label">
                <input class="file-input" type="file" name="pdf">
                <span class="file-cta">
                    <span class="file-icon">
                        <i class="fas fa-upload"></i>
                    </span>
                    <span class="file-label">
                        Choose a file…
                    </span>
                </span>
                <span class="file-name">
                    File-Name
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

@section('script')

<script>
   @section('script')
    <script>
        const fileInput = document.querySelector('#file-js-example input[type=file]');
        fileInput.onchange = () => {
            if (fileInput.files.length > 0) {
                const fileName = document.querySelector('#file-js-example .file-name');
                fileName.textContent = fileInput.files[0].name;
            }
        }

    </script>
@endsection
  </script>
@endsection
