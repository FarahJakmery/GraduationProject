@extends('layouts.app1')

@section('title')

@section('content')
    <div class="container">
        <div class="columns is-centered">
            <div class="column is-8">
                <div class="card">
                    <div class="card-content">
                        <div class="media">
                            <div class="media-left">
                                <figure class="image is-96x96">
                                    <img src="https://bulma.io/images/placeholders/96x96.png" alt="Placeholder image">
                                </figure>
                            </div>
                            <div class="media-content">
                                <p class="title is-4">User Name</p>
                                <p class="subtitle is-6">User Email</p>
                            </div>
                        </div>
                        <div class="content">
                            Results of your test
                            <br>
                            <p>Total Results: {{ $quiz_details->quiz_result }}</p>
                            <time datetime="2016-1-1">28/6/2021</time>
                        </div>
                        <div class="button is-primary">
                            <a href="">GET DETAILS IN PDF BY EMAIL</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
