@extends('layouts.app1')

@section('content')
    <div class="container">
        <div class="columns is-centered">
            <div class="column is-4">
                <div class="card showResultCard">
                    <div class="card-content">
                        <div class="media">
                            <div class="showResultImage">
                                <img src="{{ $quiz_details->user->photo }}">
                            </div>
                            <div class="media-content ">
                                <p class="subtitle username is-4 ml-2 mt-6">{{ $quiz_details->user->full_name }}</p>
                            </div>
                        </div>
                        <div class="content">
                            <p class="subtitle profileSubtitle1"><b>The Result of your test</b></p>

                            <p class="subtitle profileSubtitle1">
                            <p class="subtitle profileSubtitle2">Total Results:
                                {{ $quiz_details->quiz_result }}/{{ $full_mark }}</p>
                            </p>
                            {{-- <p>
                                <b>Date :</b>
                            <p id=" date"></p>
                            </p> --}}
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
