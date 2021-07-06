@extends('layouts.app1')

@section('title', 'This is Option show page')

@section('content')
    <div class="container">
        <div class="columns">
            <div class="column is-6 is-centered">
                <label class="label is-uppercase has-text-weight-bold has-text-primary">Question</label>
                <p class="content">{{ $option->question->question_text }}</p>
                <label class="label is-uppercase has-text-weight-bold has-text-primary">Option Text</label>
                <p class="content">{{ $option->option_text }}</p>
                <label class="label is-uppercase has-text-weight-bold has-text-primary">Correct or Not</label>
                @if ($option->correct == 1)
                    <p class="content">
                        This Option is <span class="has-text-info">Correct</span>
                    </p>
                @else
                    <p class="content">
                        This Option is <span class="has-text-danger">Not Correct</span>
                    </p>

                @endif
                <label class="label is-uppercase has-text-weight-bold has-text-primary">Posted at</label>
                <p class="content">Posted at: {{ $option->created_at }}</p>
            </div>
        </div>
    </div>
@endsection
