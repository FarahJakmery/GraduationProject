@extends('layouts.app1')

@section('title', 'this course content this lectures')
@section('content')

    {{-- The Table --}}
    <div class="container">
        <table class="table is-striped is-narrow is-hoverable is-fullwidth">
            {{-- Table Header --}}
            <thead>
                {{-- Table Row --}}
                <tr>
                    <th>
                        <p>ID</p>
                    </th>
                    <th>
                        <p>Course</p>
                    </th>
                    <th>
                        <p>Quiz Name</p>
                    </th>
                    <th>
                        <p>Created At</p>
                    </th>
                    <th>
                        <p>Updated At</p>
                    </th>
                    <th>
                        <p>Options</p>
                    </th>
                </tr>
            </thead>

            {{-- Table Body --}}
            <tbody>
                @foreach ($quizzes as $quiz)
                    <tr>
                        <th>
                            <p>{{ $quiz->id }}</p>
                        </th>
                        <th>
                            <p>{{ $quiz->course->name }}</p>
                        </th>
                        <th>
                            <p>{{ $quiz->name }}</p>
                        </th>
                        <th>
                            <p>{{ $quiz->created_at }}</p>
                        </th>
                        <th>
                            <p>{{ $quiz->updated_at }}</p>
                        </th>
                        <th>
                            <a href="{{ route('studentquizzes.show', $quiz->id) }}">
                                <button class="button StartQuizButton">
                                    Start Quiz
                                </button>
                            </a>
                        </th>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
