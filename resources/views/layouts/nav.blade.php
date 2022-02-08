<nav class="navbar navbar-expand-lg navbar-light">
    <div class="container">
        <a href="{{ url('/') }}" class="d-flex align-items-center navbar-brand">
            <x-fab-laravel height="24" class="text-primary me-1"/> {{ config('app.name') }}
        </a>

        <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbar-nav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div id="navbar-nav" class="collapse navbar-collapse">
            @guest
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a href="{{ route('login') }}"
                            class="nav-link {{ Request::routeIs('login') ? 'active' : '' }}">
                            {{ __('Login') }}
                        </a>
                    </li>

                    @if(Route::has('register'))
                        <li class="nav-item">
                            <a href="{{ route('register') }}"
                                class="nav-link {{ Request::routeIs('register') ? 'active' : '' }}">
                                {{ __('Register') }}
                            </a>
                        </li>
                    @endif
                </ul>
            @else
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="{{ route('home') }}"
                            class="nav-link {{ Request::routeIs('home') ? 'active' : '' }}">
                            {{ __('Home') }}
                        </a>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="{{ route('clients') }}"
                            class="nav-link {{ Request::routeIs('clients') ? 'active' : '' }}">
                            {{ __('Clients') }}
                        </a>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="{{ route('category') }}"
                            class="nav-link {{ Request::routeIs('category') ? 'active' : '' }}">
                            {{ __('Categories') }}
                        </a>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="{{ route('cars') }}"
                            class="nav-link {{ Request::routeIs('cars') ? 'active' : '' }}">
                            {{ __('Cars') }}
                        </a>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="{{ route('services') }}"
                            class="nav-link {{ Request::routeIs('services') ? 'active' : '' }}">
                            {{ __('Services') }}
                        </a>
                    </li>
                </ul>

                <ul class="navbar-nav ms-auto">
                    <form class="d-flex" method="get" action="{{url('/search')}}">
                        <input class="form-control me-2" name="query" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                      </form>
                    <li class="nav-item dropdown">
                        <a href="#" class="d-flex align-items-center nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <x-fas-user-circle height="16" class="me-1"/> {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li>
                                <button type="button" class="dropdown-item"
                                    wire:click="$emit('showModal', 'auth.profile-update')">
                                    {{ __('Update Profile') }}
                                </button>
                            </li>
                            <li>
                                <button type="button" class="dropdown-item"
                                    wire:click="$emit('showModal', 'auth.password-change')">
                                    {{ __('Change Password') }}
                                </button>
                            </li>
                            <li>
                                <a href="{{ route('logout') }}" class="dropdown-item">
                                    {{ __('Logout') }}
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            @endguest
        </div>
    </div>
</nav>
