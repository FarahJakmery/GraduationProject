@extends('layouts.app1')
@section('content')
    <div class="container">

        <div class="columns">
            <div class="column is-12 ml-2">
                @foreach ($quiz->questions as $question)
                    <b class="questionstyle">{{ $loop->iteration }}-{{ $question->question_text }}</b>
                    <b class="markstyle">(Mark : {{ $question->score }})</b> <br>
                    @foreach ($question->options as $option)
                        <span class="icon-text">
                            <span>
                                <b class="optionprof"><i class="fas fa-caret-right buttomss ">
                                        {{ $option->option_text }}</i></b>
                            </span>
                            @if ($option->correct == 1)
                                <span class="icon">
                                    <i class="far fa-check-circle"></i>
                                </span>
                            @endif
                        </span>
                        <br>
                    @endforeach
                @endforeach
                <a href="{{ route('quizzes.index') }}">
                    <button class="backstyle">
                        <h1 class="backsize">Back To List</h1>
                    </button>
                </a>
            </div>
        </div>
    </div>
@endsection
