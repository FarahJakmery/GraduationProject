@extends('layouts.app1')

@section('title', 'Create semester')
@section('subtitle', 'this for create a new semester')

@section('content')
    <div class="container">
        <form action="{{ route('adminsemester.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            {{-- origin image --}}
            <figure class="image create">
                <img class="createimg" src="/images/Decoration2.png">
            </figure>
            {{-- inverse image --}}
            <figure class="image inverse">
                <img class="inverseimg" src="/images/Decoration2.png">
            </figure>

            {{-- semester Name --}}
            <div class="field">
                <label class="label inputtitle">Semester Name</label>
                <div class="control">
                    <input class="input {{ $errors->has('name') ? 'is-danger' : '' }}" type="text" name="name"
                        value="{{ old('name') }}">
                    @error('name')
                        <p class="help is-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="position">
                {{-- select year --}}
                <div class="field">
                    <label class="label inputtitle">Select year</label>
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



                {{-- semester photo --}}
                <div id="semesterphoto" class="file has-name is-fullwidth my-5 pos">
                    <label class="file-label">
                        <input class="file-input" type="file" name="photo">
                        <span class="file-cta">
                            <span class="file-icon">
                                <i class="fas fa-upload"></i>
                            </span>
                            <span class="file-label">
                                Choose a photo
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

            {{-- save button --}}
            <div class="field">
                <div class="control">
                    <button class="button">Save semester</button>
                </div>
            </div>
        </form>
    </div>
@endsection
@push('script')
    <script>
        const fileInput = document.querySelector('#semesterphoto input[type=file]');
        fileInput.onchange = () => {
            if (fileInput.files.length > 0) {
                const fileName = document.querySelector('#semesterphoto .file-name');
                fileName.textContent = fileInput.files[0].name;
            }
        }
    </script>

@endpush
