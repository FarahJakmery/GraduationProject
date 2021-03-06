<x-guest-layout>
    <x-auth-card>
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <h1 class="tilte signup is-3"> Sign Up</h1>
        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data" class="authform ">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Full Name')" />
                <x-input id="name" class="block  authinput  " type="text" name="full_name" :value="old('full_name')"
                    required autofocus />
            </div><br>

            {{-- Acadimec Year --}}
            <div class="field authyear ml-5">
                <label class="label authtitle ">Academic Year</label>
                <div class="control ">
                    <div class="select ">
                        <select name="year_id" class="authinput">
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

            {{-- phone lable --}}
            <div class="mt-4">
                <x-label for="phone" :value="__('Phone')" />

                <x-input id="phone" class="block   authinput" type="text" name="phone" :value="old('phone')" required />
            </div>
            <!-- Email Address -->
            <div class="mt-4 authyear">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block  authinput" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Password -->

            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block  authinput " type="password" name="password" required
                    autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4 authyear">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class="block authinput" type="password" name="password_confirmation"
                    required />
            </div>
            <!-- Student Number -->
            <div class="mt-4">
                <x-label for="name" :value="('University ID')" />
                <x-input id="name" class="block  authinput  " type="text" name="number_id" :value="old('number_id')"
                    required autofocus />
            </div><br>

            {{-- photo --}}
            <div class="mt-4 picture ">
                <x-label for="name" :value="('Select Photo')" />
                <label class=" flex flex-col items-center authinput  authphoto border border-blue  ">

                    <span class="mt-2  authtitle text-base leading-normal">Upload a Photo</span>
                    <input type='file' class="hidden" name="photo" />
                </label>
            </div>
            {{-- role --}}
            <div class="field authrole mt-6">
                <label class="checkbox authtitle ">
                    <input type="hidden" name="role_id" value="0">
                    <input type="checkbox" name="role_id" value="{{ $role->id }}">
                    I am a {{ $role->name }}
                </label>
            </div>


            <div class="regbutton">
                <a class="underline alreadyreg authtitle" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>
                <x-button class=" reg authtitle">
                    {{ __('Register') }}
                </x-button>


            </div>

            </div>
        </form>

    </x-auth-card>
</x-guest-layout>

<script>
    const fileInput = document.querySelector('#file-js-example input[type=file]');
    fileInput.onchange = () => {
        if (fileInput.files.length > 0) {
            const fileName = document.querySelector('#file-js-example .file-name');
            fileName.textContent = fileInput.files[0].name;
        }
    }
</script>
