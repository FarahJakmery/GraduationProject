@extends('layouts.app1')
@section('content')
    <div class="container ">
        <div class="titlequize">
            <b>
                Please Select The Right Answer:
            </b>
        </div>
        <div class="columns">
            <div class="column is-12 ml-2 ">
                <form action="{{ route('studentquizzes.store', $quiz->id) }}" method="POST">
                    @csrf
                    {{-- The Quiz's Questions --}}
                    @foreach ($quiz->questions as $question)
                        <b class="questionstyle">{{ $loop->iteration }}- {{ $question->question_text }}
                        </b>
                        <b class="markstyle">(Mark : {{ $question->score }})</b>
                        <div class="control">
                            @foreach ($question->options as $option)
                                <label class="radio optionstyle tdsty">
                                    <span class="radio_input">
                                        <input class="radiosize" type="radio" name="questions[{{ $question->id }}]"
                                            value="{{ $option->id }}">
                                        {{ $option->option_text }}
                                        <span class="radio_control"></span>
                                    </span>
                                </label>
                                <br>
                            @endforeach
                            <br>
                        </div>
                    @endforeach
                    {{-- Submit Button --}}
                    <div class="field ">
                        <div class="control ">
                            <button class="button is-link substyle">
                                <h2 class="submitsize">Submit</h2>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
