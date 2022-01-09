@extends('layouts.app2')
@section('content')
    <div class="container ">
        <div class="card cardadminstyle">
            <div class="columns">
                <div class="column is-5">
                    <div class="card-image">
                        <figure class="image is-4by3 hightlogo ">
                            <img src="{{ $course->logo }}" alt="Placeholder image">
                        </figure>
                    </div>
                </div>
                <div class="column is-6">
                    <div class="card-content">
                        <div class="media">
                            <div class="media-content">
                                <h1 class="title titleadmin is-3 ">{{ $course->name }}</h1>
                                <h2 class="title titleadmin is-4">{{ $course->professor->user->full_name }}</h2>
                                <h2 class="title titleadmin is-4"> {{ $course->semester->name }}</h2>
                                <h2 class="title titleadmin is-4"> description:{{ $course->description }}</h2>
                                <b><time class="titleadmin is-4" datetime="2016-1-1">{{ $course->created_at }}</time>
                                </b>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
