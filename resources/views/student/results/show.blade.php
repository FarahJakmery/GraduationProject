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
                                    <img src="{{ $quiz_details->user->photo }}" alt="Placeholder image">
                                </figure>
                            </div>
                            <div class="media-content">
                                <p class="title is-4">{{ $quiz_details->user->full_name }}</p>
                                <p class="subtitle is-6">{{ $quiz_details->user->email }}</p>
                            </div>
                        </div>
                        <div class="content">
                            <b>Result of your test</b>
                            <br>
                            <p>Total Results: {{ $quiz_details->quiz_result }}/{{ $full_mark }}</p>
                            <p>
                                <b>Date :</b>
                            <p id="date"></p>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        n = new Date();
        y = n.getFullYear();
        m = n.getMonth() + 1;
        d = n.getDate();
        document.getElementById("date").innerHTML = d + "/" + m + "/" + y;
    </script>
@endpush
