@extends('layouts.app3')

@section('content')
    <div class="container">
        <div class="columns is-multiline">
            @foreach ($courses as $course)
                <div class="column is-6">
                    <a href="{{ route('studentcourses.show', $course->id) }}">
                        <div class="card">
                            <div class="card-content">
                                <div class="media">
                                    <div class="media-content">
                                        <p class="title is-4">{{ $course->semester->name }}</p>
                                        <p class="title is-4">{{ $course->name }}</p>
                                        <p class="title is-4">{{ $course->description }}</p>
                                        <figure class="image is-4by3">
                                            <img src="{{ $course->logo }}" alt="Placeholder logo">
                                        </figure>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
