
@extends('layouts.app1')

@section('title', 'ALL Questions')

@section('content')

    {{-- Button To Add A New Question --}}
    <div class="container mb-3">
        <a href="{{ route('questions.create') }}">
            <button class="button is-link is-primary is-hovered is-focused is-active">
                Add Question
            </button>
        </a>
    </div>

    {{-- the table --}}
    <div class="container">
        <table class="table is-fullwidth is-striped is-hoverable is-bordered ">

            {{-- Table Header --}}
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Question Text</th>
                    <th>Score</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>More Option</th>
                </tr>
            </thead>

            {{-- Table Footer --}}
            <tfoot>
                <tr>
                    <th>Id</th>
                    <th>Question Text</th>
                    <th>Score</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>More Option</th>
                </tr>
            </tfoot>

            {{-- Table Body --}}
            <tbody>
                @foreach ($questions as $question)
                    <tr>
                        <td>{{ $question->id }}</td>
                        <td>{{ $question->question_text }}</td>
                        <td>{{ $question->score }}</td>
                        <td>{{ $question->created_at }}</td>
                        <td>{{ $question->updated_at }}</td>
                        <td>
                            <div class="buttons">
                                <a href="{{ route('questions.show', $question->id) }}" class="button is-info">view</a>
                                <a href="{{ route('questions.edit', $question->id) }}" class="button is-warning">Edit</a>
                                <form action="{{ route('questions.destroy', $question->id) }}" method="post">
                                    @csrf
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input class="button is-danger" type="submit" value="Delete">
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
