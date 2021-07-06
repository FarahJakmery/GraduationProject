@extends('layouts.app1')

@section('title', $lecture->name)

@section('content')
    <div class="container">
        <div class="columns">
            {{-- This is Video --}}
            <div class="column is-6">
                <video controls width="600" height="400" autoplay loop>
                    <source src="{{ $lecture->video }} " type="video/mp4">
                    Your Browser Dosent Support Video Tag
                </video>
            </div>
            {{-- This is Lecture Info --}}
            <div class="column is-6">
                <div class="content">
                    {{ $lecture->description }}
                </div>
                <h3 class="subtitle is-5">{{ $lecture->course->name }}</h3>
                <p class="content">
                    Posted at: {{ $lecture->created_at }}
                </p>

                {{-- Download File --}}
                <div class="button">
                    <a href="">Download File</a>
                </div>

                {{-- Quiz --}}
                {{-- <div class="button is-primary">
                    <a href="{{ route('studentquizzes.show', $lecture->id, $quiz->id) }}">Start Quiz</a>
                </div> --}}

            </div>
        </div>

    </div>

@endsection
