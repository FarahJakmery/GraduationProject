<section class="hero is-heroColor is-height">
    <!-- Hero head: will stick at the top -->
    <div class="hero-head">
        <nav class="navbar">
            <div class="container">
                {{-- Navbar Brand --}}
                <div class="navbar-brand">
                    {{-- logo --}}
                    <a class="navbar-item" href="#">
                        <img class="logoImage" src="/images/logo.png">
                    </a>
                    {{-- navbar-burger --}}
                    <span class="navbar-burger" data-target="navbarMenuHeroA">
                        <span></span>
                        <span></span>
                        <span></span>
                    </span>
                </div>

                {{-- Navbar Menu --}}
                <div id="navbarMenuHeroA" class="navbar-menu">
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
                                            <input class="input searchwidth is-rounded" type="text" name="q"
                                                placeholder="Search ..." value="{{ old('q') }}">
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


                            <a class="navbar-item tab-color{{ Route::currentRouteName() == 'years.index' ? 'is-active' : '' }}"
                                href="{{ route('years.index') }}">
                                Years
                            </a>

                            <a class="navbar-item  tab-color{{ Route::currentRouteName() == 'studentquizzes.index' ? 'is-active' : '' }}"
                                href="{{ route('studentquizzes.index') }}">َ Quizzes</a>

                            <a class="navbar-item tab-color {{ Route::currentRouteName() == 'results.index' ? 'is-active' : '' }}"
                                href="{{ route('results.index') }}">Result</a>

                            @endrole

                            {{-- Professor NavBar --}}
                            @role('Professor')
                            <a class="navbar-item tab-color {{ Route::currentRouteName() == 'lectures.index' ? 'is-active' : '' }}"
                                href="{{ route('lectures.index') }}">Lecture</a>
                            <a class="navbar-item  tab-color{{ Route::currentRouteName() == 'quizzes.index' ? 'is-active' : '' }}"
                                href="{{ route('quizzes.index') }}">Quiz</a>
                            <a class="navbar-item tab-color{{ Route::currentRouteName() == 'questions.index' ? 'is-active' : '' }}"
                                href="{{ route('questions.index') }}">Question Bank</a>
                            <a class="navbar-item tab-color {{ Route::currentRouteName() == 'options.index' ? 'is-active' : '' }}"
                                href="{{ route('options.index') }}">Option</a>

                            <a class="navbar-item tab-color{{ Route::currentRouteName() == 'professorresults.index' ? 'is-active' : '' }}"
                                href="{{ route('professorresults.index') }}">Result</a>
                            @endrole

                            {{-- Admin NavBar --}}
                            @role('Admin')
                            <a class="navbar-item tab-color{{ Route::currentRouteName() == 'courses.index' ? 'is-active' : '' }}"
                                href="{{ route('courses.index') }}">Courses</a>
                            <a class="navbar-item tab-color{{ Route::currentRouteName() == 'professors.index' ? 'is-active' : '' }}"
                                href="{{ route('professors.index') }}">Professor</a>
                            <a class="navbar-item tab-color{{ Route::currentRouteName() == 'studentss.index' ? 'is-active' : '' }}"
                                href="{{ route('students.index') }}">Students</a>
                            @endrole

                        @endif
                        <figure class="image usernavimage navbar-item has-dropdown is-hoverable">
                            <img class="is-rounded image1" src="{{ Auth::user()->photo }}">
                            <div class="navbar-dropdown">
                                <a class="navbar-item tab-color"
                                    href="{{ route('profile.show', Auth::user()->id) }}">{{ Auth::user()->full_name }}</a>
                                <a class="navbar-item tab-color" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form tab-color" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </div>
                        </figure>
                    </div>
                </div>
            </div>
        </nav>
    </div>

    <!-- Hero content: will be in the middle -->
    <div class="hero-body">
        <div class="container has-text-centered">
            <h1 class="title titlecolor">
                @yield('title')
                <h2 class="subtitle subtitlecolor">
                    @yield('subtitle')
                </h2>
        </div>
    </div>

</section>


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
