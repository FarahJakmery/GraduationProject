@extends('layouts.app1')
@section('title', 'Create Question with options')
@section('content')
    <div class="container">
        <form action="{{ route('questions.store') }}" method="post">
            @csrf
            <figure class="image create">
                <img class="createimg" src="/images/Decoration2.png">
            </figure>
            {{-- inverse image --}}
            <figure class="image inverse">
                <img class="inverseimg" src="/images/Decoration2.png">
            </figure>
            {{-- question_text --}}
            <div class="field">
                <label class="label  inputtitle">Question Text:</label>
                <div class="control">
                    <textarea class="textarea {{ $errors->has('question_text') ? 'is-danger' : '' }}" name="question_text"
                        placeholder=" question_text goes here ...">{{ old('question_text') }}</textarea>
                    @error('question_text')
                        <p class="help is-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            {{-- Score --}}
            <div class="field">
                <label class="label  inputtitle">Question Mark:</label>
                <div class="control">
                    <input class="input {{ $errors->has('score') ? 'is-danger' : '' }}" name="score"
                        placeholder="score goes here ..." {{ old('score') }}>
                    @error('score')
                        <p class="help is-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            {{-- options --}}
            @for ($option = 1; $option <= 4; $option++)
                {{-- The Text of the Option --}}
                <div class="field">
                    <label class="label  inputtitle">Option Text:</label>
                    <div class="control">
                        <input class="input {{ $errors->has('option_text') ? 'is-danger' : '' }}" type="text"
                            name="option_text{{ $option }}" placeholder="Option Text ..."
                            value="{{ old('option_text') }}">
                        @error('option_text' . $option)
                            <p class="help is-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                {{-- This field to determine if the option is true or not --}}
                <label class="checkbox ">
                    <input type="hidden" name="correct{{ $option }}" value="0">
                    <input type="checkbox" name="correct{{ $option }}" value="1"
                        {{ old('correct', isset($options) ? 'checked' : '') }}>
                    Correct
                </label>
            @endfor
            {{-- The Submit button --}}
            <div class="field">
                <div class="control">
                    <button class="button ">Save Question</button>
                </div>
            </div>
        </form>
    </div>
@endsection
