<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tu06 - @yield('title')</title>
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
</head>
<body>
    <header>
        <nav class="nav">
                <div class="row">
                    <div class="col-6">
                        <img src="{{asset('icon/logo.png')}}" alt="Tu06.com">
                        <ul class="ul-1">
                            <li><a href="">Freunde finden</a></li>
                            <li><a href="">Anmelden</a></li>
                            <li>Neuer Nutzer? Starte <a href="">hier</a></li>
                        </ul>
                        <img class="hamburger-icon" src="{{asset('icon/hamburger.png')}}" alt="">
                        <ul class="ul-2">
                            <li><a href="">Freunde finden</a></li>
                            <li><a href="">Einloggen</a></li>
                            <li><a href="">Registerierung</a></li>
                        </ul>
                    </div>
                </div>
        </nav>
    </header>
</body>
</html>