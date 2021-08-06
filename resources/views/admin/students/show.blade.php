@extends('layouts.app2')

@section('content')
    <div class="container profileContainer">

        {{-- User Image --}}
        <div class="profileimage mb-4">
            <img src="{{ $student->user->photo }}">
        </div>

        {{-- User Info Card --}}
        <div class="card profilecard">

            <div class="card-content">
                {{-- Student Name --}}
                <h5 class="title is-3 username has-text-centered">{{ $student->user->full_name }}</h5>

                <div class="media">
                    <div class="media-content has-text-left">
                        {{-- Acadimac Year --}}
                        <span class="icon-text">
                            <span class="icon icon-color">
                                <i class="far fa-calendar-alt"></i>
                            </span>
                            @if ($student->year_id == 1)
                                <span class="profileSubtitle is-5">First Year</span>
                            @elseif ($student->year_id == 2)
                                <span class="profileSubtitle is-5">Second Year</span>
                            @elseif ($student->year_id == 3)
                                <span class="profileSubtitle is-5">Third Year</span>
                            @elseif ($student->year_id == 4)
                                <span class="profileSubtitle is-5">Fourth Year</span>
                            @elseif ($student->year_id == 5)
                                <span class="profileSubtitle is-5">Fifth Year</span>
                            @endif
                        </span><br><br>

                        {{-- Role --}}
                        <span class="icon-text">
                            <span class="icon icon-color">
                                <i class="fas fa-user-graduate"></i>
                            </span>
                            <span class="profileSubtitle is-5">{{ $role->name }}</span>
                        </span><br><br>


                        {{-- Email --}}
                        <span class="icon-text">
                            <span class="icon icon-color">
                                <i class="far fa-envelope-open"></i>
                            </span>
                            <span class="profileSubtitle is-5">{{ $student->user->email }}</span>
                        </span><br><br>

                        {{-- Phone number --}}
                        <span class="icon-text">
                            <span class="icon icon-color">
                                <i class="fas fa-mobile-alt"></i>
                            </span>
                            <span class="profileSubtitle is-5">{{ $student->user->phone }}</span>
                        </span>

                    </div>
                </div>
            </div>

            {{-- Edit Button --}}
            <a href="{{ route('students.edit', $student->user->id) }}">
                <button class="button profile-button">
                    Edit your Info
                </button>
            </a>
        </div>

    </div>
@endsection
