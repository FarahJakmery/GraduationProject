@extends('layouts.app1')

@section('content')
    <div class="container">
        <form action="{{ route('lectures.update', $lecture->id) }}" method="post" enctype="multipart/form-data">
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

            {{-- The Title of the Lecture --}}
            <div class="field">
                <label class="label inputtitle">Title</label>
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
                <label class="label inputtitle">Course</label>
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
                <label class="label inputtitle">Description</label>
                <div class="control">
                    <textarea class="textarea {{ $errors->has('description') ? 'is-danger' : '' }}" name="description"
                        placeholder="Lecture description goes here ...">{{ old('description') ?? $lecture->description }}</textarea>
                    @error('description')
                        <p class="help is-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>


            {{-- The Video of the Lecture --}}
            <div class="position mt-5">
                <div id="video-upload" class="file has-name ">
                    <label class="file-label">
                        <input class="file-input" type="file" name="video">
                        <span class="file-cta">
                            <span class="file-icon">
                                <i class="fas fa-upload"></i>
                            </span>
                            <span class="file-label">
                                Choose a video
                            </span>
                        </span>
                        <span class="file-name">
                            No file uploaded
                        </span>
                    </label>
                    @error('video')
                        <p class="help is-danger">{{ $message }}</p>
                    @enderror
                </div>
                {{-- upload pdf --}}
                <div id="pdf-upload" class="file has-name pdffile">
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
                            No file uploaded
                        </span>
                    </label>
                    @error('pdf')
                        <p class="help is-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>


            {{-- The Submit button --}}
            <div class="field">
                <div class="control">
                    <button class="button ">Modify Lecture</button>
                </div>
            </div>
        </form>
    </div>
@endsection
@push('script')
    <script>
        const fileInput = document.querySelector('#video-upload input[type=file]');
        fileInput.onchange = () => {
            if (fileInput.files.length > 0) {
                const fileName = document.querySelector('#video-upload .file-name');
                fileName.textContent = fileInput.files[0].name;
            }
        }

        const fileInput1 = document.querySelector('#pdf-upload input[type=file]');
        fileInput1.onchange = () => {
            if (fileInput1.files.length > 0) {
                const fileName = document.querySelector('#pdf-upload .file-name');
                fileName.textContent = fileInput1.files[0].name;
            }
        }
    </script>
@endpush
