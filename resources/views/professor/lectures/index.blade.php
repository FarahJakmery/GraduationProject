@extends('layouts.app1')

@section('content')

    {{-- Button To Add A New Option --}}
    <div class="container ADDButton mb-3">
        <a href="{{ route('lectures.create') }}">
            <button class="button">
                Add Lecture
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
                        <p>Id</p>
                    </th>
                    <th>
                        <p>Course</p>
                    </th>
                    <th>
                        <p>Name</p>
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
                @foreach ($lectures as $lecture)
                    <tr>
                        <th>
                            <p>{{ $lecture->id }}</p>
                        </th>
                        <th>
                            <p>{{ $lecture->course->name }}</p>
                        </th>
                        <th>
                            <p>{{ $lecture->name }}</p>
                        </th>
                        <th>
                            <p>{{ $lecture->description }}</p>
                        </th>
                        <th>
                            <p>{{ $lecture->created_at }}</p>
                        </th>
                        <th>
                            <p>{{ $lecture->updated_at }}</p>
                        </th>
                        <th>
                            <div class="field is-grouped">
                                <p class="control">
                                    <a href="{{ route('lectures.show', $lecture->id) }}">
                                        <span class="iconView"></span>
                                    </a>
                                </p>
                                <p class="control">
                                    <a href="{{ route('lectures.edit', $lecture->id) }}">
                                        <span class="iconEdit"></span>
                                    </a>
                                </p>
                                <p class="control">
                                <form action="{{ route('lectures.destroy', $lecture->id) }}" method="post">
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
