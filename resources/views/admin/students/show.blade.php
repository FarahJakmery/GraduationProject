@extends('layouts.app1')

@section('title', 'The Info About ' . $student->user->full_name . ' :')
@section('content')
    <div class="columns">
        <div class="column is-4">
            <div class="card">
                <div class="card">
                    <div class="card-image">
                        <figure class="image is-4by3">
                            <img src="{{ $student->user->photo }}" alt="Placeholder image">
                        </figure>
                    </div>
                </div>
            </div>
        </div>
        <div class="column is-8">
            <div class="card-content">
                <div class="media">
                    <div class="media-content">
                        <p class="title is-3">{{ $student->user->full_name }}</p>
                        <p class="title is-4">{{ $student->year_id }}</p>
                        <p class="subtitle is-5">{{ $student->user->phone }}</p>
                        <p class="subtitle is-5">{{ $student->user->email }}</p>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection