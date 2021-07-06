
@extends('layouts.app1')

@section('title', 'Create Option')
@section('content')
    <div class="container">
        <form action="{{ route('options.store') }}" method="post">
            @csrf

            {{-- The Name of the Question that the option belongs to --}}
            <div class="field">
                <label class="label">Question</label>
                <div class="control">
                    <div class="select is-large">
                        <select name="question_id">

                            @foreach ($questions as $question)
                                <option value="{{ $question->id }}">{{ $question->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('question_id')
                        <p class="help is-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>


            {{-- The Text of the Option --}}
            <div class="field">
                <label class="label">Option Text</label>
                <div class="control">
                    <input class="input {{ $errors->has('option_text') ? 'is-danger' : '' }}" type="text"
                        name="option_text" placeholder="Option Text ..." value="{{ old('option_text') }}">
                    @error('option_text')
                        <p class="help is-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>


            {{-- This field to determine if the option is true or not --}}
            <label class="checkbox">
                <input type="hidden" name="correct" value="0">
                <input type="checkbox" name="correct" value="1" {{ old('correct', isset($options) ? 'checked' : '') }}>
                Correct
            </label>


            {{-- The Submit Button --}}
            <div class="field">
                <div class="control">
                    <button class="button is-link">Submit</button>
                </div>
            </div>

        </form>
    </div>
@endsection
