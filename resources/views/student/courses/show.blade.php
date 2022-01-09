@extends('layouts.app3')

@section('content')
    <div class="container">
        <div class="columns is-multiline">
            @foreach ($lectures as $lecture)
                <div class="column is-6">
                    <button class="accordion"><b>{{ $lecture->name }}</b></button>
                    <div class="panel">
                        <h3 class="descriptionstyle">{{ $lecture->description }}</h3>
                        <p class="content postedstyle">
                            <b>Posted at:</b> {{ $lecture->created_at }}
                        </p>
                        <a href="{{ route('studentlectures.show', $lecture->id) }}">
                            <button class="buttonstyle1">
                                <span class="icon-text">
                                    <span class="icon">
                                        <i class="fas fa-video"></i>
                                    </span>
                                    <span><b>Show Video</b></span>
                                </span>
                            </button>
                        </a>

                        <a href="{{ route('downloadfile.download', $lecture->id) }}">
                            <button class="buttonstyle2">
                                <span class="icon-text">
                                    <span class="icon">
                                        <i class="fas fa-file-download"></i>
                                    </span>
                                    <span><b>Download PDF</b></span>
                                </span>
                            </button>
                        </a>
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
