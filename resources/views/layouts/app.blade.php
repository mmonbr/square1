<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    @stack('styles-before')
    <link href="//cdnjs.cloudflare.com/ajax/libs/bulma/0.4.0/css/bulma.min.css" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
@stack('styles-after')

<!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body>
<div id="app">
    <!-- navigation -->
    <nav class="nav has-shadow">
        <div class="container">
            <div class="nav-left">
                <a class="nav-item" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
            </div>
            <span class="nav-toggle">
              <span></span>
              <span></span>
              <span></span>
            </span>
            <div class="nav-right nav-menu">
                @stack('right-nav-menu')
                @if (Auth::guest())
                    <a class="nav-item is-tab" href="{{ url('/login') }}">Login</a>
                    <a class="nav-item is-tab" href="{{ url('/register') }}">Register</a>
                @else
                    <a class="nav-item is-tab" href="{{ url('/logout') }}"
                       onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                        Logout</a>

                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                @endif
            </div>
        </div>
    </nav>

    @if(auth()->check())
        <section class="hero is-primary">
            <div class="hero-body">
                <div class="container">
                    <h1 class="title">
                        Share your WishList with your friends
                    </h1>
                    <h2 class="subtitle">
                        <a href="{{ url(route('wishlist.show', auth()->user()->id)) }}"
                           class="subtitle">{{ url(route('wishlist.show', auth()->user()->id)) }}</a>
                    </h2>
                </div>
            </div>
        </section>
    @endif

    <!-- main content -->
    <section class="section">
        <div class="container ">
            @yield('content')
        </div>
    </section>
</div>

<!-- Scripts -->
@stack('scripts-before')
<script src="{{ asset('js/app.js') }}"></script>
@stack('scripts-after')
</body>
</html>