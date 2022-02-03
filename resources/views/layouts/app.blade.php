<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'RefBook') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    @yield('beforecss')
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @yield('aftercss')
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'RefBook') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    {{-- <ul class="navbar-nav mr-auto">
                        <li class="nav-item"></li>
                    </ul> --}}

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @foreach($categories as $category)
                            <li class="nav-item d-block d-lg-none">
                                <a href="{{ url($category->slug) }}" class="nav-link border-bottom">   {{-- if active bg-muted --}}
                                    {{ $category->name }}
                                </a>
                            </li>
                        @endforeach

                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                         @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
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
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4 container">
            <div class="row">
                @if (!Route::is('home','login','register','password.request'))
                <div class="col-md-3 d-none d-lg-block">
                    {{-- build component for sidebar elements --}}
                    <div class="card">
                        <div class="card-header">Categories</div>

                        <div class="list-group list-small">
                            @foreach($categories as $category)
                            <a href="{{ url($category->slug) }}" class="list-group-item d-flex justify-content-between align-items-center list-group-item-action">{{-- if active bg-muted --}}
                                {{ $category->name }}
                                <span class="badge badge-primary badge-pill">{{ $category->posts->count() }}</span>
                            </a>
                            @endforeach
                        </div>
                    </div>

                </div>
                <!-- /.col-lg-3 -->

                <div class="col-lg-9">
                    @yield('content')
                </div>

                @else
                <div class="col-lg-12">
                    @yield('content')
                </div>
                @endif
                <!-- /.col-lg-9 -->

            </div>
            <!-- /.row -->
        </main>
    </div>
    <!-- Scripts -->
    @yield('beforejs')
    <script src="{{ asset('js/app.js') }}"></script>
    @yield('afterjs')
</body>
</html>
