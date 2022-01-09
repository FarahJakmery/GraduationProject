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
                        <p>Course Name</p>
                    </th>
                    <th>
                        <p>Quiz Name</p>
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
                    @if ($result->user_id === Auth::user()->id)
                        <tr>
                            <th>
                                <p>{{ $result->quiz->course->name }}</p>
                            </th>
                            <th>
                                <p>{{ $result->quiz->name }}</p>
                            </th>
                            <th>
                                <p>{{ $result->quiz_result }}</p>
                            </th>
                            <th>
                                <p>{{ $result->created_at }}</p>
                            </th>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
