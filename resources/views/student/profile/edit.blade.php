@extends('layouts.app1')

@section('title', 'Edit your profile')

@section('content')
    <div class="container">
        <form action="{{ route('profile.update', $user->id) }}" method="post" enctype="multipart/form-data">
            <input name="_method" type="hidden" value="PUT">
            @csrf
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
                        placeholder=" full_name ..." value="{{ old('full_name') ?? $user->full_name }}">
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
                        value="{{ old('email') ?? $user->email }}">
                    @error('email')
                        <p class="help is-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            {{-- password --}}
            <div class="field">
                <label class="label inputtitle">Password</label>
                <div class="control">
                    <input class="input {{ $errors->has('password') ? 'is-danger' : '' }}" type="text" name="password">
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
                        value="{{ old('phone') ?? $user->phone }}">
                    @error('phone')
                        <p class="help is-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>


            {{-- Edit year --}}
            <div class="position">
                <div class="field">
                    <label class="label inputtitle">Acadimac Year</label>
                    <div class="control">
                        <div class="select">
                            <select name="year_id">
                                @foreach ($years as $year)
                                    <option value="{{ $year->id }}"
                                        {{ $year->id == $user->student->year_id ? 'selected' : '' }}>
                                        {{ $year->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        @error('year_id')
                            <p class="help is-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                {{-- The Student's photo --}}
                <div id="photo_upload" class="file has-name is-fullwidth pos">
                    <label class="file-label">
                        <input class="file-input" type="file" name="photo">
                        <span class="file-cta">
                            <span class="file-icon">
                                <i class="fas fa-upload"></i>
                            </span>
                            <span class="file-label">
                                Choose aphoto
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

            {{-- role --}}
            <div class="field">
                <label class="checkbox checkrole">
                    <input type="hidden" name="role_id" value="0">
                    <input type="checkbox" name="role_id" value="{{ $role->id }}">
                    {{ $role->name }}
                </label>
            </div>

            {{-- Edit button --}}
            <div class="field">
                <div class="control">
                    <button class="button ">Modify Student</button>
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
