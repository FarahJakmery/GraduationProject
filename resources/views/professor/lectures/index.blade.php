@extends('layouts.app1')

@section('title', 'this course content this lectures')
@section('content')

    {{-- Button To Add A New Option --}}
    <div class="container mb-3">
        <a href="{{ route('lectures.create') }}">
            <label class="label is-uppercase has-text-weight-bold has-text-primary">Add Lecture</label>
            <button class="button is-link is-primary is-hovered is-focused is-active">
                Add Lecture
            </button>
        </a>
    </div>


    {{-- The Table --}}
    <div class="container">
        <table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth">
            {{-- Table Header --}}
            <thead>
                {{-- Table Row --}}
                <tr>
                    <th>Id</th>
                    <th>Course</th>
                    <th>Name</th>
                    <th>Description</th>
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
                    <th>Name</th>
                    <th>Description</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th></th>
                </tr>
            </tfoot>

            {{-- Table Body --}}
            <tbody>
                @foreach ($lectures as $lecture)
                    <tr>
                        <th>{{ $lecture->id }}</th>
                        <th>{{ $lecture->course->name }}</th>
                        <th>{{ $lecture->name }}</th>
                        <th>{{ $lecture->description }}</th>
                        <th>{{ $lecture->created_at }}</th>
                        <th>{{ $lecture->updated_at }}</th>
                        <th>
                            <div class="field is-grouped">
                                <p class="control">
                                    <a href="{{ route('lectures.show', $lecture->id) }}">
                                        <button class="button is-link is-info is-hovered is-focused is-active">
                                            View
                                        </button>
                                </p>
                                <p class="control">
                                    <a href="{{ route('lectures.edit', $lecture->id) }}">
                                        <button class="button is-link is-warning is-hovered is-focused is-active">
                                            Edit
                                        </button>
                                    </a>
                                </p>
                                <p class="control">
                                <form action="{{ route('lectures.destroy', $lecture->id) }}" method="post">
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
