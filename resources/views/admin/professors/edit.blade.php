@extends('layouts.app1')

@section('content')
    <div class="container">
        <form action="{{ route('professors.update', $professor->id) }}" method="post" enctype="multipart/form-data">
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
            {{-- Edit Name --}}
            <div class="field">
                <label class="label inputtitle"> Full_Name</label>
                <div class="control">
                    <input class="input {{ $errors->has('full_name') ? 'is-danger' : '' }}" type="text" name="full_name"
                        placeholder=" full_name ..." value="{{ old('full_name') ?? $professor->user->full_name }}">
                    @error('full_name')
                        <p class="help is-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            {{-- Edit Email --}}
            <div class="field">
                <label class="label inputtitle"> Email</label>
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
                <label class="label inputtitle">Password</label>
                <div class="control">
                    <input class="input {{ $errors->has('password') ? 'is-danger' : '' }}" type="password"
                        name="password">
                    @error('password')
                        <p class="help is-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            {{-- Edit Phone --}}
            <div class="field">
                <label class="label inputtitle"> Phone</label>
                <div class="control">
                    <input class="input {{ $errors->has('phone') ? 'is-danger' : '' }}" type="text" name="phone"
                        value="{{ old('phone') ?? $professor->user->phone }}">
                    @error('phone')
                        <p class="help is-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            {{-- Edit Scientific Grade --}}
            <div class="field">
                <label class="label inputtitle">Scientific Grade</label>
                <div class="control">
                    <input class="input {{ $errors->has('scientific_grade') ? 'is-danger' : '' }}" type="text"
                        name="scientific_grade" placeholder="Lecture scientific_grade goes here ..."
                        value="{{ old('scientific_grade') ?? $professor->scientific_grade }}">
                    @error('scientific_grade')
                        <p class="help is-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            {{-- Edit Scientific Certificate --}}
            <div class="field">
                <label class="label inputtitle">Scientific Certificate</label>
                <div class="control">
                    <input class="input {{ $errors->has('scientific_certificate') ? 'is-danger' : '' }}" type="text"
                        name="scientific_certificate" placeholder="Lecture scientific_certificate goes here ..."
                        value="{{ old('scientific_certificate') ?? $professor->scientific_certificate }}">
                    @error('scientific_certificate')
                        <p class="help is-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            {{-- Edit role --}}
            <div class="position1">
                <div class="field selectrole">
                    <label class="label inputtitle">Role</label>
                    <div class="control">
                        <div class="select">
                            <select name="role_id">
                                @foreach ($roles as $role)
                                    <option value="{{ $role->id }}"
                                        {{ $role->id == $professor->role_id ? 'selected' : '' }}>
                                        {{ $role->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        @error('role_id')
                            <p class="help is-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                {{-- The professor's photo --}}
                <div id="photo_upload" class="file profphoto has-name ">
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
            </div>
            {{-- edit button --}}
            <div class="field">
                <div class="control">
                    <button class="button">Modify professor
                    </button>
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
