@extends('layouts.app2')

@section('content')
    <div class="container profileContainer">
        <div class="columns">
            <div class="column is-12">
                {{-- User Image --}}
                <div class="profileimage mb-4">
                    <img src="{{ $professor->user->photo }}">
                </div>

                <div class="card profilecard ">

                    <div class="card-content">
                        {{-- Professor Name --}}
                        <h5 class="title is-3 username has-text-centered">{{ $professor->user->full_name }}</h5>

                        <div class="media">
                            <div class="media-content has-text-left">

                                {{-- Role --}}
                                <span class="icon-text">
                                    <span class="icon icon-color">
                                        <i class="fas fa-user-tie"></i>
                                    </span>
                                    <span class="profileSubtitle is-5">{{ $roles }}</span>
                                </span><br><br>

                                {{-- Email --}}
                                <span class="icon-text">
                                    <span class="icon icon-color">
                                        <i class="far fa-envelope-open"></i>
                                    </span>
                                    <span class="profileSubtitle is-5">{{ $professor->user->email }}</span>
                                </span><br><br>

                                {{-- Phone number --}}
                                <span class="icon-text">
                                    <span class="icon icon-color">
                                        <i class="fas fa-mobile-alt"></i>
                                    </span>
                                    <span class="profileSubtitle is-5">{{ $professor->user->phone }}</span>
                                </span><br><br>

                                {{-- Description --}}
                                <span class="icon-text">
                                    <span class="icon icon-color">
                                        <i class="fas fa-plus-circle"></i>
                                    </span>
                                    <span class="profileSubtitle is-5">{{ $professor->description }}</span>
                                </span>
                            </div>
                        </div>
                    </div>
                    {{-- Edit Button --}}
                    <a href="{{ route('professors.edit', $professor->id) }}">
                        <button class="button profile-button">
                            Edit prof. Info
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
