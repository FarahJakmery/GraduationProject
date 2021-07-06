<section class="hero is-heroColor ">
    <!-- Hero head: will stick at the top -->
    <div class="hero-head">
        <nav class="navbar">
            <div class="container">
                {{-- Navbar Brand --}}
                <div class="navbar-brand">
                    {{-- logo --}}
                    <a class="navbar-item">
                        <img src="/images/logo.png" alt="Logo">
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
                    <div class="navbar-end">
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
                        @if (Auth::guest())
                            <a class="navbar-item " href="{{ route('login') }}">Login</a>
                            <a class="navbar-item " href="{{ route('register') }}">Register</a>
                        @else
                            @role('Student')
                            <a class="navbar-item tab-color{{ Route::currentRouteName() == 'years.index' ? 'is-active' : '' }}"
                                href="{{ route('years.index') }}">Years</a>
                            <a class="navbar-item tab-color" href="">Result</a>
                            <a class="navbar-item {{ Route::currentRouteName() == 'studentquizzes.index' ? 'is-active' : '' }}"
                                href="{{ route('studentquizzes.index') }}">َQuizzes</a>
                            @endrole
                            <div class="navbar-item has-dropdown is-hoverable">
                                <a class="navbar-link tab-color" href="#">{{ Auth::user()->full_name }}</a>

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
                        @endif
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
            </h1>
            <h2 class="subtitle subtitlecolor">
                @yield('subtitle')
            </h2>
        </div>
    </div>

</section>
