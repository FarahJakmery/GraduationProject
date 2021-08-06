@extends('layouts.app1')

@section('title', 'this course content this lectures')
@section('content')

    {{-- Button To Add A New Course --}}
    <div class="container ADDButton mb-3">
        <a href="{{ route('courses.create') }}">
            <button class="button">
                Add Course
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
                        <p>Semester</p>
                    </th>
                    <th>
                        <p>Professor</p>
                    </th>
                    <th>
                        <p>Course Name</p>
                    </th>
                    <th>
                        <p>Description</p>
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
                @foreach ($courses as $course)
                    <tr>
                        <th>
                            <p>{{ $course->id }}</p>
                        </th>
                        <th>
                            <p>{{ $course->semester->name }}</p>
                        </th>
                        <th>
                            <p>{{ $course->professor->user->full_name }}</p>
                        </th>
                        <th>
                            <p>{{ $course->name }}</p>
                        </th>
                        <th>
                            <p>{{ $course->description }}</p>
                        </th>
                        <th>
                            <p>{{ $course->created_at }}</p>
                        </th>
                        <th>
                            <p>{{ $course->updated_at }}</p>
                        </th>
                        <th>
                            <div class="field is-grouped">
                                <p class="control">
                                    <a href="{{ route('courses.show', $course->id) }}">
                                        <span class="iconView"></span>
                                    </a>
                                </p>
                                <p class="control">
                                    <a href="{{ route('courses.edit', $course->id) }}">
                                        <span class="iconEdit"></span>
                                    </a>
                                </p>
                                <p class="control">
                                <form action="{{ route('courses.destroy', $course->id) }}" method="post">
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
