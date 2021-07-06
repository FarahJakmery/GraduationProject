@extends('layouts.app1')

@section('title', 'This Semester Include This Courses')
@section('content')
    <div class="container courseContainer">
        <div class="columns is-multiline">
            @foreach ($courses as $course)
                <div class="column is-6">
                    <a href="{{ route('studentcourses.show', $course->id) }}">
                        <div class="card coursercard">
                            <div class="card-image">
                                <figure class="image is-4by3">
                                    <img src="{{ $course->logo }}" alt="Placeholder image">
                                </figure>
                            </div>
                            <div class="card-content">
                                <div class="media">
                                    <div class="media-left">
                                        <figure class="image is-48x48">
                                            <img src="https://bulma.io/images/placeholders/96x96.png"
                                                alt="Placeholder image">
                                        </figure>
                                    </div>
                                    <div class="media-content">
                                        <p class="title is-4">{{ $course->name }}</p>
                                        {{-- <p class="subtitle is-6">{{ $course->professor->user->full_name }}</p> --}}
                                    </div>
                                </div>

                                <div class="content">
                                    {{ $course->description }}
                                    <br>
                                    <time datetime="2016-1-1">
                                        <b>Created At:</b> {{ $course->created_at }}
                                    </time>
                                </div>
                            </div>
                        </div>

                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
