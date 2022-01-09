@extends('layouts.app1')

@section('content')
    <div class="container">
        <form action="{{ route('options.update', $option->id) }}" method="post">
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
            {{-- The Name of the Question that the option belongs to --}}
            <div class="field">
                <label class="label inputtitle">Question</label>
                <div class="control">
                    <div class="select">
                        <select name="question_id">
                            <option>Select Question</option>
                            @foreach ($questions as $question)
                                <option value="{{ $question->id }}"
                                    {{ $question->id == $option->question_id ? 'selected' : '' }}>{{ $question->name }}
                                </option>
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
                <label class="label inputtitle">Option Text</label>
                <div class="control">
                    <input class="input {{ $errors->has('option_text') ? 'is-danger' : '' }}" type="text"
                        name="option_text" placeholder="Option Text ..."
                        value="{{ old('option_text') ?? $option->option_text }}">
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
                    <button class="button mt-3">Modify Option</button>
                </div>
            </div>

        </form>
    </div>
@endsection
