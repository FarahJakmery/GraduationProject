@extends('layouts.app1')

@section('title', 'this course content this lectures')
@section('content')

    {{-- Button To Add A New Course --}}
    <div class="container mb-3">
        <a href="{{ route('courses.create') }}">
            <button class="button is-link is-primary is-hovered is-focused is-active">
                Add Course
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
                    <th>Semester</th>
                    <th>Professor</th>
                    <th>Course Name</th>
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
                    <th>Semester</th>
                    <th>Professor</th>
                    <th>Course Name</th>
                    <th>Description</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th></th>
                </tr>
            </tfoot>

            {{-- Table Body --}}
            <tbody>
                @foreach ($courses as $course)
                    <tr>
                        <th>{{ $course->id }}</th>
                        <th>{{ $course->semester->name }}</th>
                        {{-- <th>{{ $course->professor->user->full_name }}</th> --}}
                        <th>{{ $course->name }}</th>
                        <th>{{ $course->description }}</th>
                        <th>{{ $course->created_at }}</th>
                        <th>{{ $course->updated_at }}</th>
                        <th>
                            <div class="field is-grouped">
                                <p class="control">
                                    <a href="{{ route('courses.show', $course->id) }}">
                                        <button class="button is-link is-info is-hovered is-focused is-active">
                                            View
                                        </button>
                                </p>
                                <p class="control">
                                    <a href="{{ route('courses.edit', $course->id) }}">
                                        <button class="button is-link is-warning is-hovered is-focused is-active">
                                            Edit
                                        </button>
                                    </a>
                                </p>
                                <p class="control">
                                <form action="{{ route('courses.destroy', $course->id) }}" method="post">
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
