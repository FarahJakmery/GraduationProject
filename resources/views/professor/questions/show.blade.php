@extends('layouts.app1')

@section('content')
    <div class="container showcontainer">
        {{-- origin image --}}
        <figure class="image show">
            <img class="showimg" src="/images/Decoration2.png">
        </figure>
        {{-- inverse image --}}
        <figure class="image showinverse">
            <img class="inverseshow" src="/images/Decoration2.png">
        </figure>
        <div class="columns is-centered ">
            <div class="column is-6 colpadding marg">

                <label class="label labelsize mt-3">a). {{ $question->question_text }}</label>
                <br>
                @foreach ($question->options as $option)


                    <p class="content optionfont mb-0 ml-3">{{ $option->id }} . {{ $option->option_text }}

                        @if ($option->correct == 1)
                            <i class="far fa-check-circle"></i>
                        @endif
                    </p>
                    <BR>
                @endforeach


                <div class="score">
                    <h3 class="subtitle is-5">The question Score is :{{ $question->score }}</h3>
                </div>

            </div>
        </div>
    </div>

@endsection
