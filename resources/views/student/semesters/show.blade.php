@extends('layouts.app1')

@section('title', 'This Semester Include This Courses')
@section('content')
    <div class="container courseContainer">
        <div class="columns is-multiline">
            @foreach ($courses as $course)
                <div class="column is-4">
                    <a href="{{ route('studentcourses.show', $course->id) }}">
                        <div class="card coursercard">
                            <div class="card-image">
                                <figure class="image is-4by3">
                                    <img src="{{ $course->logo }}" alt="Placeholder image">
                                </figure>
                            </div>
                            <div class="card-content">
                                <h1 class="title coursename is-6">Course Name:<span class="subtitle is-6">
                                        {{ $course->name }}</span>
                                </h1>
                                <h1 class="title professorname is-6">professor Name:<span class="subtitle is-6">
                                        {{ $course->professor->user->full_name }}</span>
                                </h1>
                                <h1 class="title description is-6">Description:<span class="subtitle is-6">
                                        {{ $course->description }}</span>
                                </h1>
                                {{-- <b>Created At:</b> {{ $course->created_at }} --}}


                            </div>
                        </div>

                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
