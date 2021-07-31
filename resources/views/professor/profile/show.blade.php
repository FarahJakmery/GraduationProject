@extends('layouts.app1')

@section('title', 'Professor Profile Page')
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
                                <p class="title is-4">{{ $user->professor->description }}</p>

                                {{-- role --}}
                                {{ $roles }}

                            </div>
                        </div>
                    </div>
                    <a href="{{ route('profprofile.edit', $user->id) }}">
                        <button class="button is-link ">
                            Edit
                        </button>
                    </a>
                </div>

            </div>
        </div>
    </div>
@endsection
