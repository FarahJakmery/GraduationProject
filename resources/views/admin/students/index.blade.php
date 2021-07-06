@extends('layouts.app1')

@section('title', 'All Students')
@section('content')

    {{-- Button To Add A New student --}}
    <div class="container mb-3">
        <a href="{{ route('students.create') }}">
            <button class="button is-link is-primary is-hovered is-focused is-active">
                Add Student
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
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Year</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th></th>
                </tr>
            </thead>

            {{-- Table Footer --}}
            <tfoot>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Year</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th></th>
                </tr>
            </tfoot>

            {{-- Table Body --}}
            <tbody>
                @foreach ($students as $student)
                    <tr>
                        <th>{{ $student->id }}</th>
                        <th>{{ $student->user->full_name }}</th>
                        <th>{{ $student->user->email }}</th>
                        <th>{{ $student->user->phone }}</th>
                        <th>{{ $student->year_id }}</th>
                        <th>{{ $student->created_at }}</th>
                        <th>{{ $student->updated_at }}</th>
                        <th>
                            <div class="field is-grouped">
                                <p class="control">
                                    <a href="{{ route('students.show', $student->id) }}">
                                        <button class="button is-link is-info is-hovered is-focused is-active">
                                            View
                                        </button>
                                    </a>
                                </p>
                                <p class="control">
                                    <a href="{{ route('students.edit', $student->id) }}">
                                        <button class="button is-link is-warning is-hovered is-focused is-active">
                                            Edit
                                        </button>
                                    </a>
                                </p>
                                <p class="control">
                                <form action="{{ route('students.destroy', $student->id) }}" method="post">
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