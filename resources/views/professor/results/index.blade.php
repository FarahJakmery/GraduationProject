@extends('layouts.app1')
@section('content')

    {{-- The Table --}}
    <div class="container">
        <table class="table is-striped is-narrow is-hoverable is-fullwidth">
            {{-- Table Header --}}
            <thead>
                {{-- Table Row --}}
                <tr>
                    <th>
                        <p>Student Name</p>
                    </th>
                    <th>
                        <p>Result</p>
                    </th>
                    <th>
                        <p>Created At</p>
                    </th>
                </tr>
            </thead>

            {{-- Table Body --}}
            <tbody>
                @foreach ($results as $result)
                    <tr>
                        <th>
                            <p>{{ $result->user->full_name }}</p>
                        </th>
                        <th>
                            <p>{{ $result->quiz_result }}</p>
                        </th>
                        <th>
                            <p>{{ $result->created_at }}</p>
                        </th>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
