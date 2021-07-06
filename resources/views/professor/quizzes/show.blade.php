@extends('layouts.app1')

@section('title', $quiz->name)

@section('content')

    <div class="container">
        <table class="table">
            <tr>
                <th>Course</th>
                <td>{{ $quiz->course->name }}</td>
            </tr>
            <tr>
                <th>Title</th>
                <td>{{ $quiz->name }}</td>
            </tr>

            <tr>
                <th>Questions</th>
                <td>
                    @foreach ($quiz->questions as $question)
                        {{ $question->question_text }}
                        @foreach ($question->options as $option)
                            <i class="fas fa-caret-right"></i> {{ $option->option_text }}
                            @if ($option->correct == 1)
                                <i class="far fa-check-circle"></i>
                            @endif
                            <BR>
                        @endforeach
                    @endforeach
                </td>
            </tr>
            <tr>
                <td><a href="{{ route('quizzes.index') }}">Back To List</a></td>
            </tr>
        </table>
    </div>
@endsection
