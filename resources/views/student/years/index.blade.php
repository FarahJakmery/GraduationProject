@extends('layouts.app3')

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
                                <figure class="image ml-4">
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
