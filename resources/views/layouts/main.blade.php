<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tu06 - @yield('title')</title>
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    @stack('styles')
</head>
<body>
    @php
        $count = 0;
    @endphp
    <nav class="site-nav">
        <div class="site-col-6">
            <a href="/"><img src="{{asset('icon/logo.png')}}" alt="Tu06.com"></a>
            <ul class="ul-1">
                @auth
                    <li>
                        <a class="border-bottom border-black" href="{{ route('chat.index') }}">
                        @foreach ($conversations as $conversation)
                        {{-- unread count --}}
                        @if ($conversation->unreadMessagesCount()>0)
                            @php
                                $count += 1;
                            @endphp
                        @endif
                        @endforeach
                        <span class="messages">
                            @php
                                echo $count;
                            @endphp
                        </span> Nachrichten
                        </a>
                    </li>
                @endauth
                <li><a class="border-bottom border-black"href="{{ route('main') }}">Freunde finden</a></li>
                @guest
                    <li><a class="border-bottom border-black" href="{{ route('login') }}">Anmelden</a></li>
                    <li class="border-bottom border-black">Neuer Benutzer? Starte <a href="{{ route('register') }}">hier</a></li>
                @endguest
                @auth
                <li class="nav-item dropdown float-right">
                    <a class="d-inline border-bottom border-black nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
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
        @yield('content')
    </section>


    <section class="mt-5">
        <!-- Footer -->
        <footer class="bg-secondary text-white">
          <!-- Grid container -->
          <div class="container p-4">
            <!--Grid row-->
            <div class="row">
              <!--Grid column-->
              <div class="col-lg-6 col-md-12 mb-4 mb-md-0 text-center">
                <h5 class="text-info">Friend.Tu06.com</h5>
      
                <p class="direction">
                  سایت ایرانی آلمانی زبان <a href="https://www.tu06.com">www.tu06.com</a> با هدف یافتن دوست ایرانی برای ایرانیان مقیم آلمان فعالیت خود را شروع کرده است.
                </p>
              </div>
              <!--Grid column-->
      
              <!--Grid column-->
              <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                <h5 class="text-uppercase">Links</h5>
      
                <ul class="list-unstyled mb-0">
                  <li>
                    <a href="/" class="text-white">Fruende finden</a>
                  </li>
                  <li>
                    <a href="/chat" class="text-white">Nachrichten</a>
                  </li>
                  <li>
                    <a href="/search" class="text-white">Suchen</a>
                  </li>
                  <li>
                    <a href="#!" class="text-white">Kontaktiere uns</a>
                  </li>
                </ul>
              </div>
              <!--Grid column-->
      
              <!--Grid column-->
              <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                <h5 class="text-uppercase mb-0">Links</h5>
      
                <ul class="list-unstyled">
                  <li>
                    <a href="/login" class="text-white">Anmelden</a>
                  </li>
                  <li>
                    <a href="/register" class="text-white">Registrieren</a>
                  </li>
                  <li>
                    <a href="/settings/profile-information" class="text-white">Profil bearbeiten</a>
                  </li>
                  <li>
                    <a href="https://www.tu06.com" class="text-white">www.Tu06.com</a>
                  </li>
                </ul>
              </div>
              <!--Grid column-->
            </div>
            <!--Grid row-->
          </div>
          <!-- Grid container -->
      
          <!-- Copyright -->
          <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
            © 2023 Copyright:
            <a class="text-white" href="https://friend.tu06.com/">Friend.Tu06.com</a>
          </div>
          <!-- Copyright -->
        </footer>
        <!-- Footer -->
      </section>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    @stack('scripts')
    @livewireScripts
</body>
</html>