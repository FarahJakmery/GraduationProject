@extends('layouts.app1')

@section('title', 'this is the student result')

@section('content')
    {{-- The Table --}}
    <div class="container">
        <table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth">
            {{-- Table Header --}}
            <thead>
                {{-- Table Row --}}
                <tr>
                    <th>Course Name</th>
                    <th>Quiz Name</th>
                    <th>Result</th>
                    <th>Created At</th>
                </tr>
            </thead>

            {{-- Table Body --}}
            <tbody>
                @foreach ($results as $result)
                    @if ($result->user_id === Auth::user()->id)
                        <tr>
                            <th>{{ $result->quiz->course->name }}</th>
                            <th>{{ $result->quiz->name }}</th>
                            <th>{{ $result->quiz_result }}</th>
                            <th>{{ $result->created_at }}</th>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
