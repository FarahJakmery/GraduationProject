@extends('layouts.app1')

@section('content')

    {{-- Button To Add A New Course --}}
    <div class="container ADDButton mb-3">
        <a href="{{ route('quizzes.create') }}">
            <button class="button">
                Add Quiz
            </button>
        </a>
    </div>

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
                        <p>Title</p>
                    </th>
                    <th>
                        <p>Created At</p>
                    </th>
                    <th>
                        <p>Updated At</p>
                    </th>
                    <th>
                        <p>More Option</p>
                    </th>
                </tr>
            </thead>

            {{-- Table Body --}}
            <tbody>
                @foreach ($quiz as $quiz)
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
                            <div class="field is-grouped ">
                                <p class="control">
                                    <a href="{{ route('quizzes.show', $quiz->id) }}">
                                        <span class="iconView"></span>
                                </p>
                                <p class="control">
                                    <a href="{{ route('quizzes.edit', $quiz->id) }}">
                                        <span class="iconEdit"></span>
                                    </a>
                                </p>
                                <p class="control">
                                <form action="{{ route('quizzes.destroy', $quiz->id) }}" method="post">
                                    @csrf
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button class="deletebutton" type="submit" value="Delete">
                                        <span class="iconDelete"></span>
                                    </button>
                                </form>
                                </p>
                                <p class="control">
                                    <a href="{{ route('professorresults.index', $quiz->id) }}">
                                        <button class="button StartQuizButton">
                                            show result
                                        </button>
                                    </a>
                                </p>
                            </div>
                        </th>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
