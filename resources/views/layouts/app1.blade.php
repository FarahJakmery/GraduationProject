<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> @yield('title')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.1/css/bulma.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('css/herostyle.css') }}">
    <link rel="stylesheet" href="{{ asset('css/StudentStyle/yearstyle.css') }}">
    <link rel="stylesheet" href="{{ asset('css/StudentStyle/semesterstyle.css') }}">
    <link rel="stylesheet" href="{{ asset('css/StudentStyle/coursestyle.css') }}">
    <link rel="stylesheet" href="{{ asset('css/Admin&Prof/createandeditstyle.css') }}">
    <link rel="stylesheet" href="{{ asset('css/Admin&Prof/showstyle.css') }}">
    <link rel="stylesheet" href="{{ asset('css/StudentStyle/showcoursestyle.css') }}">
    <link rel="stylesheet" href="{{ asset('css/StudentStyle/lecturestyle.css') }}">
    <link rel="stylesheet" href="{{ asset('css/StudentStyle/quizstyle.css') }}">
    <link rel="stylesheet" href="{{ asset('css/profilestyle.css') }}">
    <link rel="stylesheet" href="{{ asset('css/Admin&Prof/indexstyle.css') }}">
    @yield('style')
</head>

<body>
    @include('partials.hero')

    <section class="section back">
        @yield('content header')
    </section>

    @include('partials.messages')

    <section class="section back">
        @yield('content')
    </section>

    @stack('script')
</body>

</html>
