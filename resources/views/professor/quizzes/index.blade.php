@extends('layouts.app1')

@section('title', 'All Quizzes')

@section('content')

    <div class="container">
        <div class="field">
            <div class="control">

                <a class="navbar-item " href="{{ route('quizzes.create') }}"
                    style="background-color: royalblue ;color:rgb(220, 213, 223);border:solid 2px;width:100px">Add Quiz</a>
            </div>
        </div>
        <table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth">

            {{-- Table Header --}}
            <thead>
                {{-- Table Row --}}
                <tr>
                    <th>Id</th>
                    <th>Course</th>
                    <th>Title</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>More Option</th>
                </tr>
            </thead>

            {{-- Table Footer --}}
            <tfoot>
                <tr>
                    <th>Id</th>
                    <th>Course</th>
                    <th>Title</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>More Option</th>
                </tr>
            </tfoot>

            {{-- Table Body --}}
            <tbody>
                @foreach ($quiz as $quiz)
                    <tr>
                        <th>{{ $quiz->id }}</th>
                        <th>{{ $quiz->course->name }}</th>
                        <th>{{ $quiz->name }}</th>
                        <th>{{ $quiz->created_at }}</th>
                        <th>{{ $quiz->updated_at }}</th>
                        <th>
                            <div class="field is-grouped">
                                <p class="control">
                                    <a href="{{ route('quizzes.show', $quiz->id) }}">
                                        <button class="button is-link is-info is-hovered is-focused is-active">
                                            View
                                        </button>
                                </p>
                                <p class="control">
                                    <a href="{{ route('quizzes.edit', $quiz->id) }}">
                                        <button class="button is-link is-warning is-hovered is-focused is-active">
                                            Edit
                                        </button>
                                    </a>
                                </p>
                                <p class="control">
                                <form action="{{ route('quizzes.destroy', $quiz->id) }}" method="post">
                                    @csrf
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input class="button is-danger is-hovered is-focused is-active" type="submit"
                                        value="Delete">
                                </form>
                                </p>
                            </div>
                        </th>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
