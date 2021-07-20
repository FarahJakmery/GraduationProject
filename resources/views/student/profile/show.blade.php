@extends('layouts.app1')

@section('title', 'Profile Page')
@section('content')
    <div class="container">
        <div class="columns">
            <div class="column is-12">
                <div class="card profilecard">

                    <div class="card-content">
                        <div class="media">
                            <figure class="image is-48x48">
                                <img src="{{ $user->photo }}" alt="Placeholder image">
                            </figure>
                            <div class="media-content">
                                <p class="title is-4">{{ $user->full_name }}</p>

                                <p class="title is-4">{{ $user->phone }}</p>
                                <p class="title is-4">{{ $user->email }}</p>
                                <p class="title is-4">{{ $user->password }}</p>
                                <p class="title is-4">{{ $user->student->year_id }}</p>
                                {{-- role --}}

                                {{ $role->name }}

                            </div>
                        </div>
                    </div>
                    <a href="{{ route('profile.edit', $user->id) }}">
                        <button class="button is-link is-warning is-hovered is-focused is-active">
                            Edit
                        </button>
                    </a>
                </div>

            </div>
        </div>
    </div>
@endsection
