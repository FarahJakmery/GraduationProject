@extends('layouts.app1')
@section('content')
    <div class="container">
        <div class="card profcard">
            <div class="columns">
                {{-- This is Video --}}
                <div class="column is-6">
                    <video controls width="600" autoplay loop class="ved">
                        <source src="{{ $lecture->video }} " type="video/mp4">
                        Your Browser Dosent Support Video Tag
                    </video>
                </div>
                <div class="column is-6">
                    <h1 class="title titleprof is-2 ">{{ $lecture->course->name }}</h1>
                    <h2 class="title titleprof is-4"> {{ $lecture->description }}</h2>
                    <b><time class="titleprof is-4" datetime="2016-1-1">{{ $lecture->created_at }}</time></b>
                </div>
            </div>
        </div>
    </div>
@endsection
