@extends('layouts.app2')

@section('content')
    <div class="container profileContainer">

        {{-- User Image --}}
        <div class="profileimage mb-4">
            <img src="{{ $user->photo }}">
        </div>

        <div class="card profilecard ">

            <div class="card-content">
                {{-- Professor Name --}}
                <h5 class="title is-3 username has-text-centered">{{ $user->full_name }}</h5>

                <div class="media">
                    <div class="media-content has-text-left">

                        {{-- Scientific Grade --}}
                        <span class="icon-text">
                            <span class="icon icon-color">
                                <i class="fas fa-user-tie"></i>
                            </span>
                            <span class="profileSubtitle is-5">{{ $user->professor->scientific_grade }}</span>
                        </span><br><br>

                        {{-- Email --}}
                        <span class="icon-text">
                            <span class="icon icon-color">
                                <i class="far fa-envelope-open"></i>
                            </span>
                            <span class="subtitle profileSubtitle is-5">{{ $user->email }}</span>
                        </span><br><br>

                        {{-- Phone number --}}
                        <span class="icon-text">
                            <span class="icon icon-color">
                                <i class="fas fa-mobile-alt"></i>
                            </span>
                            <span class="subtitle profileSubtitle is-5">{{ $user->phone }}</span>
                        </span><br><br>

                        {{-- scientific_certificate --}}
                        <span class="icon-text">
                            <span class="icon icon-color">
                                <i class="fas fa-plus-circle"></i>
                            </span>
                            <span class="profileSubtitle is-5">{{ $user->professor->scientific_certificate }}</span>
                        </span>
                    </div>
                </div>
            </div>
            {{-- Edit Button --}}
            <a href="{{ route('profprofile.edit', $user->id) }}">
                <button class="button profile-button">
                    Edit your Info
                </button>
            </a>
        </div>
    </div>

@endsection
