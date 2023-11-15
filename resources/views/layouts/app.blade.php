<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tu06 - @yield('title')</title>
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    @vite('resources/css/app.css')
</head>
<body>

    <nav class="site-nav site-nav-2">
        <div class="site-col-6">
            <a href="/"><img style="display: inline" src="{{asset('icon/logo.png')}}" alt="Tu06.com"></a>
            <ul class="ul-1">
                <li class="border-bottom border-black"><a href="{{ route('main') }}">Freunde finden</a></li>
                @guest
                    <li class="border-bottom border-black"><a href="{{ route('login') }}">Anmelden</a></li>
                    <li class="border-bottom border-black">Neuer Benutzer? Starte <a href="{{ route('register') }}">hier</a></li>
                @endguest
                @auth 
                    <li class="nav-item dropdown float-right">
                        <a class="border-bottom border-black nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ auth()->user()->name }}
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('user-profile-information.edit') }}">Profil bearbeiten</a></li>
                            <li><a class="dropdown-item" href="{{ route('user-password.edit') }}">Passwort ändern</a></li>
                            <li><hr class="dropdown-divider"></li>                            <li>
                                <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                                    @csrf
                                    <button class="dropdown-item">Ausloggen</button>
                                    </form>
                            </li>
                        </ul>
                      </li>            
                @endauth
            </ul>
            <img class="hamburger-icon" src="{{asset('icon/hamburger.png')}}" alt="">
            @guest
                <ul class="ul-2">
                    <li><a href="{{ route('main') }}">Freunde finden</a></li>
                    <li><a href="{{ route('login') }}">Einloggen</a></li>
                    <li><a href="{{ route('register') }}">Registrierung</a></li>
                </ul>
            @endguest

            @auth
                <ul class="ul-2">
                        <li><a class="user-dropdown dropdown-toggle" href="#">{{ auth()->user()->name }}</a></li>
                        <li><a class="" href="{{ route('user-profile-information.edit') }}">Profil bearbeiten</a></li>
                        <li><a class="" href="#">Passwort ändern</a></li>
                        <li><hr class="hr"></li>
                        <li>
                            <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                                @csrf
                                <button class="dropdown-item logout-button">Ausloggen</button>
                                </form>
                        </li>
                </ul>              
            @endauth
        </div>
    </nav>
    <section>
        {{ $slot }}
    </section>
    @livewireScripts
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>