@extends('layouts.app1')

@section('content header')
    <div class="container has-text-centered">
        <h1 class="title">
            Years
        </h1>
        <h2 class="subtitle">
            Choose year
        </h2>
        <nav class="breadcrumb" aria-label="breadcrumbs">
            <ul>
                <li><a href="#">Bulma</a></li>
                <li><a href="#">Documentation</a></li>
                <li><a href="#">Components</a></li>
                <li class="is-active"><a href="#" aria-current="page">Breadcrumb</a></li>
            </ul>
        </nav>
    </div>
@endsection

@section('content')
    <div class="container">
        <div class="columns is-mutiline">
            @foreach ($years as $year)
                <div class="column">
                    <a href="{{ route('years.show', $year->id) }}">
                        <div class="card yearcard">
                            <div class="card-image yearimg my-4">
                                <img src="{{ $year->photo }}">
                            </div>
                            <div class="media-left">
                                <figure class="image is-64x64 ml-4">
                                    <img src="/images/Decoration2.png" alt="Placeholder image">
                                </figure>
                            </div>
                            <div class="card-content ">
                                <div class="media ">
                                    <footer class="card-footer yearname">
                                        <p class="title is-3 mt-4 ">{{ $year->name }}</p>
                                    </footer>
                                </div>
                            </div>

                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
