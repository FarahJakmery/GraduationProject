@extends('layouts.app1')
@section('content')

    {{-- Button To Add A New professor --}}
    <div class="container ADDButton mb-3">
        <a href="{{ route('professors.create') }}">
            <button class="button">
                Add professor
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
                        <p>Name</p>
                    </th>
                    <th>
                        <p>Email</p>
                    </th>
                    <th>
                        <p>Phone</p>
                    </th>
                    <th>
                        <p>Scientific Grade</p>
                    </th>
                    <th>
                        <p>Scientific Certificate</p>
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
                @foreach ($professors as $professor)
                    <tr>
                        <th>
                            <p>{{ $professor->id }}</p>
                        </th>
                        <th>
                            <p>{{ $professor->user->full_name }}</p>
                        </th>
                        <th>
                            <p>{{ $professor->user->email }}</p>
                        </th>
                        <th>
                            <p>{{ $professor->user->phone }}</p>
                        </th>
                        <th>
                            <p>{{ $professor->scientific_grade }}</p>
                        </th>
                        <th>
                            <p>{{ $professor->scientific_certificate }}</p>
                        </th>
                        <th>
                            <p>{{ $professor->created_at }}</p>
                        </th>
                        <th>
                            <p>{{ $professor->updated_at }}</p>
                        </th>
                        <th>
                            <div class="field is-grouped">
                                <p class="control">
                                    <a href="{{ route('professors.show', $professor->id) }}">
                                        <span class="iconView"></span>
                                    </a>
                                </p>
                                <p class="control">
                                    <a href="{{ route('professors.edit', $professor->id) }}">
                                        <span class="iconEdit"></span>
                                    </a>
                                </p>
                                <p class="control">
                                <form action="{{ route('professors.destroy', $professor->id) }}" method="post">
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
