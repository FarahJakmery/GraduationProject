{{-- @extends('layouts.app1')

@section('title', "Join The Course You Want To Follow")

@section('content')
    <div class="container">

        <div class="columns is-multiline">
            <div class="column is-6">
                <div class="card">
                    <div class="card-content">
                      <div class="media">
                        <div class="media-content">
                          <p class="title is-4">{{ $course->name }}</p>
                          <p class="title is-4">{{ $course->description }}</p>

                        </div>
                      </div>
                    </div>
                    <figure class="image is-4by3">
                        <img src="{{$course->logo }}" alt="Placeholder logo"><br>
                    </figure>
                    {{-- <a href="{{ route('enrolls.create', $course->id) }}" class="btn_1 d-block">Enroll the course</a> --}}
                  {{-- </div>
            </div>
        </div>
    </div>
@endsection  --}}

@extends('layouts.app1')

@section('title', 'This course Include This Lectures')
@section('content')
<div class="container">
  <div class="columns is-multiline">
    @foreach ($lectures as $lecture)
    <div class="column is-4">
         <a href="{{ route('studentlectures.show',$lecture->id) }}">
        <div class="card">
          <div class="card-content">
            <div class="media">
              <div class="media-content">
                <p class="title is-4">{{$lecture->name }}</p>
              </div>
            </div>
          </div>

        </div>
        </a>
    </div>
    @endforeach
</div>
</div>
@endsection






