@extends('layouts.app1')

@section('title', 'Edit your profile')

@section('content')
    <div class="container">
        <form action="{{ route('profprofile.update', $user->id) }}" method="post" enctype="multipart/form-data">
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

            {{-- Edit Description --}}
            <div class="field">
                <label class="label inputtitle">Description </label>
                <div class="control">
                    <textarea class="textarea {{ $errors->has('description') ? 'is-danger' : '' }}" name="description"
                        placeholder="your description goes here ...">{{ old('description') ?? $user->professor->description }}</textarea>
                    @error('description')
                        <p class="help is-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="position">
                {{-- The Professor's photo --}}
                <div id="photo_upload" class="file has-name is-fullwidth">
                    <label class="file-label">
                        <input class="file-input" type="file" name="photo">
                        <span class="file-cta">
                            <span class="file-icon">
                                <i class="fas fa-upload"></i>
                            </span>
                            <span class="file-label">
                                Choose a photo…
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

                {{-- Edit button --}}
                <div class="field marginleft">
                    <div class="control">
                        <button class="button ">Modify Changes</button>
                    </div>
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
