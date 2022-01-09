@extends('layouts.app3')

@section('content')
    <div class="container">
        <div class="columns">
            {{-- This is Video --}}
            <div class="column is-12">
                <div class="styless has-text-left">
                    <span class="icon-text">
                        <b class="title is-3">{{ $lecture->course->name }}</b><span class="icon iconColor px-4"><i
                                class="fas fa-arrow-right"></i></span><b
                            class="title is-3">{{ $lecture->name }}</b></span>
                </div>
                <video class="videostyle" controls autoplay loop width="1500" height="420">
                    <source src="{{ $lecture->video }} " type="video/mp4">
                    Your Browser Dosent Support Video Tag
                </video>
            </div>
        </div>
    </div>
@endsection
