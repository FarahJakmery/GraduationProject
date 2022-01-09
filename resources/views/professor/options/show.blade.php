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
            <div class="column is-6 colpadding">
                <label class="label labelsize">Question:</label>
                <p class="content contentfont">{{ $option->question->question_text }}</p>
                <hr class="gold">
                <label class="label labelsize ">Option Text:</label>
                <p class="content contentfont">{{ $option->option_text }}</p>
                <hr class="gold">
                <label class="label labelsize">Correct or Not:</label>
                @if ($option->correct == 1)
                    <p class="content contentfont">
                        This Option is <span class="has-text-info">Correct</span>
                    </p>
                    <hr class="gold">
                @else
                    <p class="content contentfont">
                        This Option is <span class="has-text-danger">Not Correct</span>
                    </p>
                    <hr class="gold">
                @endif
                <label class="label labelsize ">Posted at:</label>
                <p class="content contentfont"> {{ $option->created_at }}</p>
                <hr class="gold">
            </div>
        </div>
    </div>
@endsection
