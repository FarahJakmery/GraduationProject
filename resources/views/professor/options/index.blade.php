@extends('layouts.app1')

@section('content')

    {{-- Button To Add A New Option --}}
    <div class="container ADDButton mb-3">
        <a href="{{ route('options.create') }}">
            <button class="button">
                Add Option
            </button>
        </a>
    </div>

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
                        <p>Question Text</p>
                    </th>
                    <th>
                        <p>Option Text</p>
                    </th>
                    <th>
                        <p>Correct</p>
                    </th>
                    <th>
                        <p>Created At</p>
                    </th>
                    <th>
                        <p>Updated At</p>
                    </th>
                    <th>
                        <p></p>
                    </th>
                </tr>
            </thead>

            {{-- Table Body --}}
            <tbody>
                @foreach ($options as $option)
                    <tr>
                        <th>
                            <p>{{ $option->id }}</p>
                        </th>
                        <th>
                            <p>{{ $option->question->question_text }}</p>
                        </th>
                        <th>
                            <p>{{ $option->option_text }}</p>
                        </th>
                        <th>
                            <p>{{ $option->correct }}</p>
                        </th>
                        <th>
                            <p>{{ $option->created_at }}</p>
                        </th>
                        <th>
                            <p>{{ $option->updated_at }}</p>
                        </th>
                        <th>
                            <div class="field is-grouped">
                                <p class="control">
                                    <a href="{{ route('options.show', $option->id) }}">
                                        <span class="iconView"></span>
                                </p>
                                <p class="control">
                                    <a href="{{ route('options.edit', $option->id) }}">
                                        <span class="iconEdit"></span>
                                    </a>
                                </p>
                                <p class="control">
                                <form action="{{ route('options.destroy', $option->id) }}" method="post">
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
