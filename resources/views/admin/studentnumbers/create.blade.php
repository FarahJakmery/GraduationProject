@extends('layouts.app1')
@section('content')
    <div class="container">
        <form action="{{ route('studentnumbers.store') }}" method="post">
            @csrf
            {{-- origin image --}}
            <figure class="image create">
                <img class="createimg" src="/images/Decoration2.png">
            </figure>
            {{-- inverse image --}}
            <figure class="image inverse">
                <img class="inverseimg" src="/images/Decoration2.png">
            </figure>

            {{-- Create StudentNumber --}}
            <div class="field">
                <label class="label inputtitle">Student Number</label>
                <div class="control">
                    <input class="input {{ $errors->has('student_number') ? 'is-danger' : '' }}" name="student_number"
                        value="{{ old('student_number') }}">
                    @error('student_number')
                        <p class="help is-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            {{-- save button --}}
            <div class="field">
                <div class="control">
                    <button class="button">Save The Number</button>
                </div>
            </div>
        </form>
    </div>
@endsection
