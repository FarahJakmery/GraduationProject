@extends('layouts.app1')

@section('title')

@section('content')
    <div class="container ">
        <div class="columns ">
            <div class="column ">
                <form action="{{ route('studentquizzes.store', $quiz->id) }}" method="POST">
                    @csrf
                    {{-- The Quiz's Questions --}}
                    @foreach ($quiz->questions as $question)
                        <table class="table tablestyle">
                            <thead>
                                <tr>
                                    <th>
                                        <b class="questionstyle">{{ $loop->iteration }}- {{ $question->question_text }}
                                        </b>
                                        <b class="markstyle">(Mark : {{ $question->score }})</b>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="control">
                                            @foreach ($question->options as $option)
                                                <label class="radio radion optionstyle">
                                                    <span class="radio_input">
                                                        <input class="radiosize" type="radio"
                                                            name="questions[{{ $question->id }}]"
                                                            value="{{ $option->id }}">
                                                        {{ $option->option_text }}
                                                        <span class="radio_control"></span>
                                                    </span>
                                                </label>
                                                <br>
                                            @endforeach
                                            <br>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    @endforeach
                    <tfoot>
                        {{-- Submit Button --}}
                        <tr>
                            <th>
                                <div class="field ">
                                    <div class="control ">
                                        <button class="button is-link substyle">
                                            <div>Submit</div>
                                        </button>
                                    </div>
                                </div>
                            </th>
                        </tr>
                    </tfoot>
                </form>
            </div>
        </div>
    </div>
@endsection
