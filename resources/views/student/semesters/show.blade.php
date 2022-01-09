@extends('layouts.app3')

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
                                {{-- course name --}}
                                <span class="icon-text">
                                    <span class="icon iconColor1 is-medium">
                                        <i class="fas fa-book"></i>
                                    </span>
                                    <span class="subtitle coursename">{{ $course->name }}</span>
                                </span><br>

                                {{-- professor name --}}
                                <span class="icon-text">
                                    <span class="icon iconColor1 is-medium">
                                        <i class="fas fa-user-tie"></i>
                                    </span>
                                    <span class="subtitle professorname">{{ $course->professor->user->full_name }}</span>
                                </span><br>

                                {{-- course name --}}
                                <span class="icon-text">
                                    <span class="icon iconColor1 is-medium">
                                        <i class="fas fa-list-ul"></i>
                                    </span>
                                    <span class="subtitle description">
                                        {{ $course->description }}
                                    </span>
                                </span><br>

                            </div>
                        </div>

                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
