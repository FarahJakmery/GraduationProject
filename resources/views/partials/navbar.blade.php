<nav class="navbar is-navColor" role="navigation" aria-label="main navigation">
    <div class="navbar-brand">
        {{-- logo --}}
        <a class="navbar-item" href="#">
            <img class="logoImage" src="/images/logo.png">
        </a>
        {{-- navbar-burger --}}
        <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
        </a>
    </div>
    {{-- Navbar Menu --}}
    <div id="navbarBasicExample" class="navbar-menu">
        <div class="navbar-start">

        </div>

        {{-- User Name --}}
        <div class="navbar-end">
            @if (Auth::guest())
                <div class="buttons">
                    <a class="button is-primary" href="{{ route('register') }}">
                        <strong>Sign up</strong>
                    </a>
                    <a class="button is-light" href="{{ route('login') }}">
                        Log in
                    </a>
                </div>
            @else
                {{-- Student NavBar --}}
                @role('Student')
                {{-- Search --}}
                <div class="navbar-item">
                    <form action="{{ route('search') }}" method="get">
                        <div class="field">
                            <div class="control has-icons-left">
                                <input class="input is-rounded" type="text" name="q" placeholder="Search ..."
                                    value="{{ old('q') }}">
                                <span class="icon has-text-success is-small is-left">
                                    <i class="fas fa-search"></i>
                                </span>
                                @error('q')
                                    <p class="help is-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </form>
                </div>

                <div class="navbar-item has-dropdown is-hoverable">
                    <a class="navbar-link tab-color{{ Route::currentRouteName() == 'years.index' ? 'is-active' : '' }}"
                        href="{{ route('years.index') }}">
                        Years
                    </a>
                    <div class="navbar-dropdown">
                        <a class="navbar-item">
                            About
                        </a>
                        <a class="navbar-item">
                            Jobs
                        </a>
                        <a class="navbar-item">
                            Contact
                        </a>
                        <hr class="navbar-divider">
                        <a class="navbar-item">
                            Report an issue
                        </a>
                    </div>
                </div>
                <a class="navbar-item {{ Route::currentRouteName() == 'studentquizzes.index' ? 'is-active' : '' }}"
                    href="{{ route('studentquizzes.index') }}">َQuizzes</a>
                <a class="navbar-item {{ Route::currentRouteName() == 'results.index' ? 'is-active' : '' }}"
                    href="{{ route('results.index') }}">Result</a>

                @endrole

                {{-- Professor NavBar --}}
                @role('Professor')
                <a class="navbar-item {{ Route::currentRouteName() == 'lectures.index' ? 'is-active' : '' }}"
                    href="{{ route('lectures.index') }}">Lecture</a>
                <a class="navbar-item {{ Route::currentRouteName() == 'quizzes.index' ? 'is-active' : '' }}"
                    href="{{ route('quizzes.index') }}">Quiz</a>
                <a class="navbar-item {{ Route::currentRouteName() == 'questions.index' ? 'is-active' : '' }}"
                    href="{{ route('questions.index') }}">Question Bank</a>
                <a class="navbar-item {{ Route::currentRouteName() == 'options.index' ? 'is-active' : '' }}"
                    href="{{ route('options.index') }}">Option</a>
                <a class="navbar-item {{ Route::currentRouteName() == 'options.index' ? 'is-active' : '' }}"
                    href="{{ route('options.index') }}">Option</a>
                <a class="navbar-item {{ Route::currentRouteName() == 'professorresults.index' ? 'is-active' : '' }}"
                    href="{{ route('professorresults.index') }}">Result</a>
                {{-- <a class="navbar-item {{ Route::currentRouteName() == 'posts.index' ? 'is-active' : '' }}"
                    href="{{ route('posts.index') }}">Post</a> --}}
                @endrole

                {{-- Admin NavBar --}}
                @role('Admin')
                <a class="navbar-item {{ Route::currentRouteName() == 'courses.index' ? 'is-active' : '' }}"
                    href="{{ route('courses.index') }}">Courses</a>
                <a class="navbar-item {{ Route::currentRouteName() == 'professors.index' ? 'is-active' : '' }}"
                    href="{{ route('professors.index') }}">Professor</a>
                <a class="navbar-item {{ Route::currentRouteName() == 'studentss.index' ? 'is-active' : '' }}"
                    href="{{ route('students.index') }}">Students</a>
                @endrole

            @endif

            <div class="navbar-item">
                <div class="navbar-item has-dropdown is-hoverable">
                    <a class="navbar-link tab-color" href="#">{{ Auth::user()->full_name }}</a>
                    <figure class="image is-64x64 ">
                        <img class="is-rounded" src="{{ Auth::user()->photo }}">
                    </figure>
                    <div class="navbar-dropdown">
                        <a class="navbar-item tab-color" href="{{ route('logout') }}"
                            onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                            Logout
                        </a>

                        <form id="logout-form tab-color" action="{{ route('logout') }}" method="POST"
                            style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</nav>

<script>
    document.addEventListener('DOMContentLoaded', () => {

        // Get all "navbar-burger" elements
        const $navbarBurgers = Array.prototype.slice.call(document.querySelectorAll('.navbar-burger'), 0);

        // Check if there are any navbar burgers
        if ($navbarBurgers.length > 0) {

            // Add a click event on each of them
            $navbarBurgers.forEach(el => {
                el.addEventListener('click', () => {

                    // Get the target from the "data-target" attribute
                    const target = el.dataset.target;
                    const $target = document.getElementById(target);

                    // Toggle the "is-active" class on both the "navbar-burger" and the "navbar-menu"
                    el.classList.toggle('is-active');
                    $target.classList.toggle('is-active');

                });
            });
        }

    });
</script>
