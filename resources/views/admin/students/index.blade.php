@extends('layouts.app1')

@section('content')

    {{-- Button To Add A New student --}}
    <div class="container ADDButton mb-3">
        <a href="{{ route('students.create') }}">
            <button class="button">
                Add Student
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
                        <p>Name</p>
                    </th>
                    <th>
                        <p>Email</p>
                    </th>
                    <th>
                        <p>Phone</p>
                    </th>
                    <th>
                        <p>Year</p>
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
                @foreach ($students as $student)
                    <tr>
                        <th>
                            <p>{{ $student->id }}</p>
                        </th>
                        <th>
                            <p>{{ $student->user->full_name }}</p>
                        </th>
                        <th>
                            <p>{{ $student->user->email }}</p>
                        </th>
                        <th>
                            <p>{{ $student->user->phone }}</p>
                        </th>
                        <th>
                            <p>{{ $student->year_id }}</p>
                        </th>
                        <th>
                            <p>{{ $student->created_at }}</p>
                        </th>
                        <th>
                            <p>{{ $student->updated_at }}</p>
                        </th>
                        <th>
                            <div class="field is-grouped">
                                <p class="control">
                                    <a href="{{ route('students.show', $student->id) }}">
                                        <span class="iconView"></span>
                                    </a>
                                </p>
                                <p class="control">
                                    <a href="{{ route('students.edit', $student->id) }}">
                                        <span class="iconEdit"></span>
                                    </a>
                                </p>
                                <p class="control">
                                <form action="{{ route('students.destroy', $student->id) }}" method="post">
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
