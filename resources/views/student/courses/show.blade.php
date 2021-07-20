{{-- @extends('layouts.app1')

@section('title', 'This course Include This Lectures')
@section('content')
    <div class="container">
        <div class="columns is-multiline">
            @foreach ($lectures as $lecture)
                <div class="column is-4">
                    <a href="{{ route('studentlectures.show', $lecture->id) }}">
                        <div class="card">
                            <div class="card-content">
                                <div class="media">
                                    <div class="media-content">
                                        <p class="title is-4">{{ $lecture->name }}</p>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection --}}
@extends('layouts.app1')

@section('title', 'This course Include This Lectures')
@section('content')
    <div class="container">
        <div class="columns is-multiline">
            @foreach ($lectures as $lecture)
                <div class="column is-6">
                    <button class="accordion">{{ $lecture->name }}</button>
                    <div class="panel">
                        <p>{{ $lecture->description }}</p>
                        <button class="buttonstyle"><a class="stylelink"
                                href="{{ route('studentlectures.show', $lecture->id) }}">Show
                                Lecture</a></button>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
@push('script')
    <script>
        var acc = document.getElementsByClassName("accordion");
        var i;

        for (i = 0; i < acc.length; i++) {
            acc[i].addEventListener("click", function() {
                /* Toggle between adding and removing the "active" class,
                to highlight the button that controls the panel */
                this.classList.toggle("active");

                /* Toggle between hiding and showing the active panel */
                var panel = this.nextElementSibling;
                if (panel.style.display === "block") {
                    panel.style.display = "none";
                } else {
                    panel.style.display = "block";
                }
            });
        }
    </script>
@endpush
