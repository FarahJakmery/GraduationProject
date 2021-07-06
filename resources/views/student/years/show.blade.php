@extends('layouts.app1')
@section('')

@endsection
@section('title', 'Sermesters')
@section('subtitle', 'Choose .........')

@section('content')
    <div class="container mr-2">
        <div class="columns is-centered ">
            @foreach ($semesters as $semester)
                <div class="column is-6">
                    <a href="{{ route('semesters.show', $semester->id) }}">
                        <div class="card semestercard">
                            <figure class="image is-96x96 ml-4 smallfigure1">
                                <img src="/images/Decoration2.png" alt="Placeholder image">
                            </figure>
                            <div class="card-image mt-5 semesterimg">
                                <img src="{{ $semester->photo }}">
                            </div>
                            <div class="media-left">
                                <figure class="image is-64x64 ml-4 smallfigure2">
                                    <img src="/images/Decoration2.png" alt="Placeholder image">
                                </figure>
                            </div>
                            <div class="card-content border1 my-6">
                                <div class="media">
                                    <div class="card-footer semestername">
                                        <p class="title is-3">{{ $semester->name }}</p>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
