@extends('layouts.app1')

@section('title', 'Create Professor')

@section('content')
    <div class="container">
        <form action="{{ route('users.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            {{-- Full Name --}}
            <div class="field">
                <label class="label">Full Name</label>
                <div class="control">
                    <input class="input {{ $errors->has('full_name') ? 'is-danger' : '' }}" type="text" name="full_name"
                        value="{{ old('full_name') }}">
                    @error('full_name')
                        <p class="help is-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            {{-- photo --}}
            <div class="file">
                <label class="file-label">
                  <input class="file-input" type="file" name="photo">
                  <span class="file-cta">
                    <span class="file-icon">
                      <i class="fas fa-upload"></i>
                    </span>
                    <span class="file-label">
                       Choose an Image…
                    </span>
                  </span>
                </label>
                @error('photo')
                    <p class="help is-danger">{{ $message }}</p>
                @enderror
            </div>
            {{-- email --}}
            <div class="field">
                <label class="label">Email</label>
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
            <label class="label">PassWord</label>
            <div class="control">
                <input class="input {{ $errors->has('password') ? 'is-danger' : '' }}" type="text" name="password"
                    value="{{ old('password') }}">
                @error('password')
                    <p class="help is-danger">{{ $message }}</p>
                @enderror
            </div>
        </div>
       {{-- phone --}}
         <div class="field">
            <label class="label">Phone</label>
            <div class="control">
                <input class="input {{ $errors->has('phone') ? 'is-danger' : '' }}" type="text" name="phone"
                    value="{{ old('phone') }}">
                @error('phone')
                    <p class="help is-danger">{{ $message }}</p>
                @enderror
            </div>
        </div>
            {{--select  role --}}
            <div class="field">
                <label class="label">Select Role</label>
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
            {{-- professor description --}}
            <div class="field">
                <label class="label">Professor Description</label>
                <div class="control">
                    <input class="input {{ $errors->has('description') ? 'is-danger' : '' }}" type="text" name="description"
                        value="{{ old('description') }}">
                    @error('description')
                        <p class="help is-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>
           {{-- save button --}}
            <div class="field">
                <div class="control">
                    <button class="button is-link">save</button>
                </div>
            </div>
        </form>
    </div>
@endsection
