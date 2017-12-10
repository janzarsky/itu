<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-lg navbar-dark bg-cyan">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav">
                @if (Auth::user())
                    <li class="nav-item {{ (Request::is('tests')) ? 'active':'' }}">
                        <a href="{{ route('tests') }}"
                            class="nav-link">Testy</a></li>
                    <li class="nav-item {{ (Request::is('animals')) ? 'active':'' }}">
                        <a href="{{ route('animals') }}"
                            class="nav-link">Procvičování</a></li>
                    <li class="nav-item {{ (Request::is('stats')) ? 'active':'' }}">
                        <a href="{{ route('stats') }}"
                            class="nav-link">Moje statistiky</a></li>
                @endif
                </ul>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse"
                data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-end"
                id="navbarSupportedContent">
                <ul class="navbar-nav">
                    @if (Auth::guest())
                        <li class="nav-item"><a href="{{ route('login') }}"
                            class="nav-link">Přihlásit se</a></li>
                        <li class="nav-item"><a href="{{ route('register') }}"
                            class="nav-link">Registrovat</a></li>
                    @else
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle"
                                id="navbarDropdownMenuLink" data-toggle="dropdown"
                               aria-haspopup="true" aria-expanded="false">
                                {{ Auth::user()->name }}
                            </a>
                            <div class="dropdown-menu dropdown-menu-right"
                                aria-labelledby="navbarDropdownMenuLink">
                                <a href="{{ route('logout') }}" class="dropdown-item"
                                   onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                    Odhlásit se
                                </a>

                                <form id="logout-form"
                                    action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </div>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')

    <footer class="footer">
        <div class="container">
            <span class="text-muted">V rámci předmětu Tvorba uživatelských
                rozhraní na Fakultě informačních technologií Vysokého učení
                technického v Brně vytvořil v roce 2017 Jan Žárský
                <a href="mailto:xzarsk03@stud.fit.vutbr.cz"
                target="_blank">xzarsk03@stud.fit.vutbr.cz</a></span>
        </div>
    </footer>
</div>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
<app-scripts></app-scripts>

</body>
</html>
