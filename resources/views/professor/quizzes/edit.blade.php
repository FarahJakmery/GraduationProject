@extends('layouts.app1')

@section('content')
    <div class="container">
        <form action="{{ route('quizzes.update', $quiz->id) }}" method="post">
            <input name="_method" type="hidden" value="PUT">
            @csrf
            <figure class="image create">
                <img class="createimg" src="/images/Decoration2.png">
            </figure>
            {{-- inverse image --}}
            <figure class="image inverse">
                <img class="inverseimg" src="/images/Decoration2.png">
            </figure>
            {{-- quiz title --}}
            <div class="field">
                <label class="label inputtitle">Quiz Title</label>
                <div class="control">
                    <input class="input {{ $errors->has('name') ? 'is-danger' : '' }}" type="text" name="name"
                        placeholder="EX:Quiz for lecture 4" value="{{ old('name') ?? $quiz->name }}">
                    @error('name')
                        <p class="help is-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            {{-- selesct course --}}
            <div class="field">
                <label class="label inputtitle"> Select Course</label>
                <div class="control">
                    <div class="select ">
                        <select name="course_id">
                            @foreach ($courses as $course)
                                <option value="{{ $course->id }}"
                                    {{ $course->id == $quiz->course_id ? 'selected' : '' }}>{{ $course->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    @error('course_id ')
                        <p class="help is-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            {{-- select questions --}}
            <div class="field">
                <label class="label inputtitle"> Select Questions</label>
                <div class="control">
                    <div class="select is-multiple">
                        <select name="questions[]" multiple>
                            @foreach ($questions as $question)
                                <option value="{{ $question->id }}"
                                    {{ in_array($question->id, $quiz->questions->pluck('id')->toArray()) ? 'selected' : '' }}>
                                    {{ $question->question_text }}</option>
                            @endforeach
                        </select>
                    </div>
                    <p class="help subtitle is-5">Click and hold ctrl key to select multiple questions</p>
                    @error('questions')
                        <p class="help is-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="field">
                <div class="control">
                    <button class="button ">Modify Quiz</button>
                </div>
            </div>
        </form>
    </div>
@endsection
