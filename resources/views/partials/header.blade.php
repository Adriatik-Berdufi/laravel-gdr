<header>
    <nav class="navbar navbar-expand-sm ">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">
                <img src="{{ asset('images/icon.svg') }}" alt="Logo" height="50">
            </a>
            <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavId"
                aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavId">
                <ul class="navbar-nav me-auto mt-2 mt-lg-0">
                    <li class="nav-item">
                        <a @class([
                            'nav-link',
                            'active' => Route::currentRouteName() == 'home',
                        ]) href="{{ route('home') }}" aria-current="page">Home<span
                                class="visually-hidden">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a @class([
                            'nav-link',
                            'active' => Route::currentRouteName() == 'item.index',
                        ]) href="{{ route('item.index') }}">Items</a>
                    </li>
                </ul>
                <form class="d-flex my-2 my-lg-0">
                    <input class="form-control me-sm-2" type="text" placeholder="Search">
                    <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>
    
</header>