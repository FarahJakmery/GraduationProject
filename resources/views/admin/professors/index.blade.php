@extends('layouts.app1')

@section('title', 'All professors')
@section('content')

    {{-- Button To Add A New professor --}}
    <div class="container mb-3">
        <a href="{{ route('professors.create') }}">
            <button class="button is-link is-primary is-hovered is-focused is-active">
                Add professor
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
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Description</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th></th>
                </tr>
            </tfoot>

            {{-- Table Body --}}
            <tbody>
                @foreach ($professors as $professor)
                    <tr>
                        <th>{{ $professor->id }}</th>
                        <th>{{ $professor->user->full_name }}</th>
                        <th>{{ $professor->user->email }}</th>
                        <th>{{ $professor->user->phone }}</th>
                        <th>{{ $professor->description }}</th>
                        <th>{{ $professor->created_at }}</th>
                        <th>{{ $professor->updated_at }}</th>
                        <th>
                            <div class="field is-grouped">
                                <p class="control">
                                    <a href="{{ route('professors.show', $professor->id) }}">
                                        <button class="button is-link is-info is-hovered is-focused is-active">
                                            View
                                        </button>
                                    </a>
                                </p>
                                <p class="control">
                                    <a href="{{ route('professors.edit', $professor->id) }}">
                                        <button class="button is-link is-warning is-hovered is-focused is-active">
                                            Edit
                                        </button>
                                    </a>
                                </p>
                                <p class="control">
                                <form action="{{ route('professors.destroy', $professor->id) }}" method="post">
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