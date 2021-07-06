@extends('layouts.app1')

@section('content')
    <div class="container">
        <form action="{{ route('questions.update', $question->id) }}" method="post">
            <input name="_method" type="hidden" value="PUT">
            @csrf
            {{-- question_text --}}
            <div class="field">
                <label class="label">Question Text</label>
                <div class="control">
                    <input class="input {{ $errors->has('question_text') ? 'is-danger' : '' }}" type="select"
                        name="question_text" value="{{ old('question_text') ?? $question->question_text }}">
                    @error('question_text')
                        <p class="help is-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            {{-- Score --}}
            <div class="field">
                <label class="label">َQuestion Mark</label>
                <div class="control">
                    <input class="input {{ $errors->has('score') ? 'is-danger' : '' }}" name="score"
                        placeholder="score goes here ..." value="{{ old('score') ?? $question->score }}">
                    @error('score')
                        <p class="help is-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            {{-- The Submit button --}}
            <div class="field">
                <div class="control">
                    <button class="button is-link">Modify Question</button>
                </div>
            </div>
        </form>
    </div>
@endsection
