@extends('layouts.app1')

@section('title', 'The Info About ' . $professor->user->full_name . ' :')
@section('content')
    <div class="columns">
        <div class="column is-4">
            <div class="card">
                <div class="card">
                    <div class="card-image">
                        <figure class="image is-4by3">
                            <img src="{{ $professor->user->photo }}" alt="Placeholder image">
                        </figure>
                    </div>
                </div>
            </div>
        </div>
        <div class="column is-8">
            <div class="card-content">
                <div class="media">
                    <div class="media-content">
                        <p class="title is-3">{{ $professor->user->full_name }}</p>
                        <p class="title is-4">{{ $professor->description }}</p>
                        <p class="subtitle is-5">{{ $professor->user->phone }}</p>
                        <p class="subtitle is-5">{{ $professor->user->email }}</p>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection