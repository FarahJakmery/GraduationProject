@extends('layouts.app1')

@section('title', 'Create Quiz')
@section('subtitle', 'this for create a new quiz')

@section('content')
    <div class="container">
        <form action="{{ route('quizzes.store') }}" method="post">
            @csrf
            <div class="field">
                <label class="label">Course</label>
                <div class="control">
                    <div class="select">
                        <select name="course_id">
                            @foreach ($courses as $course)
                                <option value="{{ $course->id }}">{{ $course->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('lecture_id')
                        <p class="help is-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            {{-- quiz title --}}
            <div class="field">
                <label class="label"> Quiz Title</label>
                <div class="control">
                    <input class="input {{ $errors->has('name') ? 'is-danger' : '' }}" type="text" name="name"
                        placeholder="EX:First Quiz " value="{{ old('name') }}">
                    @error('name')
                        <p class="help is-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>



            {{-- questions --}}
            <div class="field">
                <label class="label">Questions</label>
                <div class="control">
                  <div class="select is-multiple">
                    <select name="questions[]" multiple>
                        @foreach ($questions as $question)
                            <option value="{{ $question->id }}">{{ $question->question_text }}</option>
                        @endforeach
                    </select>
                  </div>
                  <p class="help">Click and hold ctrl key to select multiple questions</p>
                  @error('questions')
                        <p class="help is-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>


            <div class="field">
                <div class="control">
                    <button class="button is-link">Save</button>
                </div>
            </div>
        </form>

    </div>

@endsection
