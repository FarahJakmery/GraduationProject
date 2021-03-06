@extends('layouts.app1')



@section('content')
    <div class="container">
        <form action="{{ route('students.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <figure class="image create">
                <img class="createimg" src="/images/Decoration2.png">
            </figure>
            {{-- inverse image --}}
            <figure class="image inverse">
                <img class="inverseimg" src="/images/Decoration2.png">
            </figure>
            {{-- Full Name --}}
            <div class="field">
                <label class="label inputtitle">Full Name</label>
                <div class="control">
                    <input class="input {{ $errors->has('full_name') ? 'is-danger' : '' }}" type="text" name="full_name"
                        value="{{ old('full_name') }}">
                    @error('full_name')
                        <p class="help is-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            {{-- email --}}
            <div class="field">
                <label class="label inputtitle">Email</label>
                <div class="control">
                    <input class="input {{ $errors->has('email') ? 'is-danger' : '' }}" type="text" name="email"
                        value="{{ old('email') }}">
                    @error('email')
                        <p class="help is-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            {{-- password --}}
            <div class="field">
                <label class="label inputtitle">Password</label>
                <div class="control">
                    <input class="input {{ $errors->has('password') ? 'is-danger' : '' }}" type="password" name="password"
                        value="{{ old('password') }}">
                    @error('password')
                        <p class="help is-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            {{-- phone --}}
            <div class="field">
                <label class="label inputtitle">Phone</label>
                <div class="control">
                    <input class="input {{ $errors->has('phone') ? 'is-danger' : '' }}" type="text" name="phone"
                        value="{{ old('phone') }}">
                    @error('phone')
                        <p class="help is-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            {{-- student number --}}
            <div class="field">
                <label class="label inputtitle">Student Number</label>
                <div class="control">
                    <input class="input {{ $errors->has('number_id') ? 'is-danger' : '' }}" name="number_id"
                        value="{{ old('number_id') }}">
                    @error('number_id')
                        <p class="help is-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="position">
                {{-- Acadimec Year --}}
                <div class="field">
                    <label class="label inputtitle">Academic Year</label>
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

                {{-- select  role --}}
                <div class="field studentrole">
                    <label class="label inputtitle">Select Role</label>
                    <div class="control">
                        <div class="select">
                            <select name="role_id">
                                @foreach ($roles as $role)
                                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('role_id')
                            <p class="help is-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
            {{-- The Student's Photo --}}

            <div id="photo_upload" class="file has-name  my-5">
                <label class="file-label">
                    <input class="file-input" type="file" name="photo">
                    <span class="file-cta">
                        <span class="file-icon">
                            <i class="fas fa-upload"></i>
                        </span>
                        <span class="file-label">
                            Student photo,Choose an Image
                        </span>
                    </span>
                    <span class="file-name">
                        No file uploaded
                    </span>
                </label>
                @error('photo')
                    <p class="help is-danger">{{ $message }}</p>
                @enderror
            </div>


            {{-- save button --}}
            <div class="field">
                <div class="control">
                    <button class="button">Save Student</button>
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
