@extends('layouts.app1')
@section('title', 'Edit Question')

@section('content')
    <div class="container">
        <form action="{{ route('questions.update', $question->id) }}" method="post">
            <input name="_method" type="hidden" value="PUT">
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
                <label class="label inputtitle">Question Text</label>
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
                <label class="label inputtitle">َQuestion Mark</label>
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
                    <button class="button ">Modify Question</button>
                </div>
            </div>
        </form>
    </div>
@endsection
