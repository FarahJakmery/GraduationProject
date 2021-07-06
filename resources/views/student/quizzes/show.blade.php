@extends('layouts.app1')

@section('title', $quiz->name)

@section('content')
    <div class="container">
        <div class="columns">
            <div class="column is-8 is-centered">
                <form action="{{ route('studentquizzes.store', $quiz->id) }}" method="POST">
                    @csrf

                    {{-- The Quiz's Questions --}}
                    @foreach ($quiz->questions as $question)
                        <div>
                            <b>{{ $loop->iteration }}. {{ $question->question_text }} </b>
                            <b>(Mark : {{ $question->score }})</b>
                        </div>

                        {{-- The Question's Options --}}
                        <div class="control">
                            @foreach ($question->options as $option)
                                <label class="radio">
                                    <input type="radio" name="questions[{{ $question->id }}]" value="{{ $option->id }}">
                                    {{ $option->option_text }}
                                </label>
                                <br>
                            @endforeach
                            <br>
                        </div>

                    @endforeach

                    {{-- Submit Button --}}
                    <div class="field">
                        <div class="control">
                            <button class="button is-link">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
