@extends('layouts.app1')

@section('title', 'this course content this lectures')
@section('content')

    {{-- The Table --}}
    <div class="container">
        <table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth">
            {{-- Table Header --}}
            <thead>
                {{-- Table Row --}}
                <tr>
                    <th>Id</th>
                    <th>Course</th>
                    <th>Quiz Name</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th></th>
                </tr>
            </thead>

            {{-- Table Footer --}}
            <tfoot>
                <tr>
                    <th>Id</th>
                    <th>Course</th>
                    <th>Quiz Name</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th></th>
                </tr>
            </tfoot>

            {{-- Table Body --}}
            <tbody>
                @foreach ($quizzes as $quiz)
                    <tr>
                        <th>{{ $quiz->id }}</th>
                        <th>{{ $quiz->course->name }}</th>
                        <th>{{ $quiz->name }}</th>
                        <th>{{ $quiz->created_at }}</th>
                        <th>{{ $quiz->updated_at }}</th>
                        <th>
                            <div class="field is-grouped">
                                <p class="control">
                                    <a href="{{ route('studentquizzes.show', $quiz->id) }}">
                                        <button class="button is-link is-info is-hovered is-focused is-active">
                                            Start Quiz
                                        </button>
                                </p>
                            </div>
                        </th>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
