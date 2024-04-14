<header>
    <nav class="navbar navbar-expand-sm ">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">
                <img src="{{ asset('images/icon.svg') }}" alt="Logo" height="50">
            </a>
            <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse"
                data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavId">
                <ul class="navbar-nav me-auto mt-2 mt-lg-0">
                    <li class="nav-item">
                        <a @class(['nav-link', 'active' => Route::currentRouteName() == 'home']) href="{{ route('home') }}" aria-current="page">Home<span
                                class="visually-hidden">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a @class([
                            'nav-link',
                            'active' => Route::currentRouteName() == 'item.index',
                        ]) href="{{ route('item.index') }}">Items</a>
                    </li>
                    @auth
                        <li class="nav-item">
                            <a @class([
                                'nav-link',
                                'active' => Route::currentRouteName() == 'characters.index',
                            ]) href="{{ route('characters.index') }}">Characters</a>
                        </li>

                        <li class="nav-item">
                            <a @class([
                                'nav-link',
                                'active' => Route::currentRouteName() == 'types.index',
                            ]) href="{{ route('types.index') }}">Types</a>
                        </li>
                    @endauth

                </ul>
                <form class="d-flex my-2 my-lg-0">
                    <input class="form-control me-sm-2" type="text" placeholder="Search">
                    <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Search</button>
                </form>


                <ul class="navbar-nav ml-auto">
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ url('dashboard') }}">{{ __('Dashboard') }}</a>
                                <a class="dropdown-item" href="{{ url('profile') }}">{{ __('Profile') }}</a>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
            </div>
        </div>
    </nav>

</header>
