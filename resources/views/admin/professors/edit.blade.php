@extends('layouts.app1')

@section('title', 'Edit The Info About professor: ' . $professor->user->full_name)

@section('content')
    <div class="container">
        <form action="{{ route('professors.update', $professor->id) }}" method="post">
            <input name="_method" type="hidden" value="PUT">
            @csrf
            {{-- Edit Name --}}
            <div class="field">
                <label class="label"> Full_Name:</label>
                <div class="control">
                    <input class="input {{ $errors->has('full_name') ? 'is-danger' : '' }}" type="text" name="full_name"
                        placeholder=" full_name ..." value="{{ old('full_name') ?? $professor->user->full_name }}">
                    @error('full_name')
                        <p class="help is-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            {{-- The professor's photo --}}
            <div id="photo_upload" class="file has-name is-fullwidth">
                <label class="file-label">
                    <input class="file-input" type="file" name="photo">
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
                @error('photo')
                    <p class="help is-danger">{{ $message }}</p>
                @enderror
            </div>

            {{-- Edit Email --}}
            <div class="field">
                <label class="label"> Email:</label>
                <div class="control">
                    <input class="input {{ $errors->has('email') ? 'is-danger' : '' }}" type="text" name="email"
                        value="{{ old('email') ?? $professor->user->email }}">
                    @error('email')
                        <p class="help is-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            {{-- password --}}
            <div class="field">
                <label class="label">Password</label>
                <div class="control">
                    <input class="input {{ $errors->has('password') ? 'is-danger' : '' }}" type="text" name="password"
                        value="{{ old('password') ?? $professor->user->password }}">
                    @error('password')
                        <p class="help is-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            {{-- Edit Phone --}}
            <div class="field">
                <label class="label"> Phone:</label>
                <div class="control">
                    <input class="input {{ $errors->has('phone') ? 'is-danger' : '' }}" type="text" name="phone"
                        value="{{ old('phone') ?? $professor->user->phone }}">
                    @error('phone')
                        <p class="help is-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            {{-- Edit Description --}}
            <div class="field">
                <label class="label">Description</label>
                <div class="control">
                    <input class="input {{ $errors->has('description') ? 'is-danger' : '' }}" type="text"
                        name="description" value="{{ old('description') ?? $professor->description }}">
                    @error('description')
                        <p class="help is-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="field">
                <div class="control">
                    <button class="button is-link">Modify professor
                        :{{ $professor->user->full_name }}</button>
                </div>
            </div>
        </form>
    </div>
@endsection

@push('script')
    <script>
        const fileInput = document.querySelector('#photo_upload input[type=file]');
        fileInput.onchange = () => {
            if (fileInput.files.length > 0) {
                const fileName = document.querySelector('#photo_upload .file-name');
                fileName.textContent = fileInput.files[0].name;
            }
        }

    </script>
@endpush