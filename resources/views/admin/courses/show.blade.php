
@extends('layouts.app1')

@section('title', 'this course content this lectures')
@section('content')

    <div class="card">
        <div class="card-image">
            <figure class="image is-4by3">
                <img src="{{ $course->logo }}" alt="Placeholder image">
            </figure>
        </div>
        <div class="card-content">
            <div class="media-content">
                <p class="title is-3">Course Name:{{ $course->name }}</p>
                <p class="title is-4">Professor Name:{{ $course->professor->user->full_name }}</p>
                <p class="title is-4">Semester:{{ $course->semester->name }}</p>
            </div>
            <div class="content">
                Description About This course:{{ $course->description }}
                <br>
                <time datetime="2016-1-1"> {{
                    $course->created_at
                }} </time>
            </div>
        </div>
    </div>
@endsection