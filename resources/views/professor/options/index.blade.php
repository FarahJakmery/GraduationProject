@extends('layouts.app1')

@section('title', 'This is All Options That You have')

@section('content')

    {{-- Button To Add A New Option --}}
    <div class="container mb-3">
        <a href="{{ route('options.create') }}">
            <button class="button is-link is-primary is-hovered is-focused is-active">
                Add Option
            </button>
        </a>
    </div>

    <div class="container">
        <table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth">
            {{-- Table Header --}}
            <thead>
                {{-- Table Row --}}
                <tr>
                    <th>Id</th>
                    <th>Question Text</th>
                    <th>Option Text</th>
                    <th>Correct</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th></th>
                </tr>
            </thead>

            {{-- Table Footer --}}
            <tfoot>
                <tr>
                    <th>Id</th>
                    <th>Question Text</th>
                    <th>Option Text</th>
                    <th>Correct</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th></th>
                </tr>
            </tfoot>

            {{-- Table Body --}}
            <tbody>
                @foreach ($options as $option)
                    <tr>
                        <th>{{ $option->id }}</th>
                        <th>{{ $option->question->question_text }}</th>
                        <th>{{ $option->option_text }}</th>
                        <th>{{ $option->correct }}</th>
                        <th>{{ $option->created_at }}</th>
                        <th>{{ $option->updated_at }}</th>
                        <th>
                            <div class="field is-grouped">
                                <p class="control">
                                    <a href="{{ route('options.show', $option->id) }}">
                                        <button class="button is-link is-info is-hovered is-focused is-active">
                                            View
                                        </button>
                                </p>
                                <p class="control">
                                    <a href="{{ route('options.edit', $option->id) }}">
                                        <button class="button is-link is-warning is-hovered is-focused is-active">
                                            Edit
                                        </button>
                                    </a>
                                </p>
                                <p class="control">
                                <form action="{{ route('options.destroy', $option->id) }}" method="post">
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
