@extends('layouts.app1')

@section('title', 'ALL Questions')

@section('content')
    <div class="container">
        <P>
        <h3 class="subtitle is-3">{{ $question->id }}. {{ $question->question_text }}</h3>
        @foreach ($question->options as $option)
            <i class="fas fa-caret-right"></i>{{ $option->option_text }}
            @if ($option->correct == 1)
                <i class="far fa-check-circle"></i>
            @endif
            <BR>
        @endforeach
        <h3 class="subtitle is-5">The question Score is :{{ $question->score }}</h3>
    </div>

@endsection
