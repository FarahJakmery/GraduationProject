@extends('layouts.app1')

@section('content')

    {{-- Button To Add A New Question --}}
    <div class="container ADDButton mb-3">
        <a href="{{ route('questions.create') }}">
            <button class="button">
                Add Question
            </button>
        </a>
    </div>

    {{-- the table --}}
    <div class="container">
        <table class="table is-striped is-narrow is-hoverable is-fullwidth">

            {{-- Table Header --}}
            <thead>
                <tr>
                    <th>
                        <p>ID</p>
                    </th>
                    <th>
                        <p>Question Text</p>
                    </th>
                    <th>
                        <p>Score</p>
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
                @foreach ($questions as $question)
                    <tr>
                        <th>
                            <p>{{ $question->id }}</p>
                        </th>
                        <th>
                            <p>{{ $question->question_text }}</p>
                        </th>
                        <th>
                            <p>{{ $question->score }}</p>
                        </th>
                        <th>
                            <p>{{ $question->created_at }}</p>
                        </th>
                        <th>
                            <p>{{ $question->updated_at }}</p>
                        </th>
                        <th>
                            <div class="field is-grouped">
                                <p class="control">
                                    <a href="{{ route('questions.show', $question->id) }}">
                                        <span class="iconView"></span>
                                    </a>
                                </p>
                                <p class="control">
                                    <a href="{{ route('questions.edit', $question->id) }}">
                                        <span class="iconEdit"></span>
                                    </a>
                                </p>
                                <p class="control">
                                <form action="{{ route('questions.destroy', $question->id) }}" method="post">
                                    @csrf
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button class="deletebutton" type="submit" value="Delete">
                                        <span class="iconDelete"></span>
                                    </button>
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
