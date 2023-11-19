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
        $my_count = 0;
    @endphp

<nav class="navbar navbar-expand-lg p-0 nav-custom">
  <div class="container-fluid bg-primary">
  <a href="/"><img src="{{asset('icon/logo.png')}}" alt="Tu06.com"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        @auth
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle border-bottom border-black" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
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
        <li class="nav-item">
          <a class="nav-link active border-bottom border-black text-info" aria-current="page" href="{{ route('main') }}">Freunde finden</a>
        </li>
        @guest
          <li class="nav-item"><a class="nav-link border-bottom border-black text-info" href="{{ route('login') }}">Anmelden</a></li>
          <li class="nav-item"><span class="nav-link border-bottom border-black">Neuer Benutzer? Starte <a class="text-info" href="{{ route('register') }}">hier</a></span></li>
        @endguest

        @auth
        <li class="nav-item">
            <a class="nav-link border-bottom border-black text-info" href="{{ route('chat.index') }}">
            @foreach (auth()->user()->conversations()->latest('updated_at')->get() as $my_conversation)
            {{-- unread count --}}
            @if ($my_conversation->unreadMessagesCount()>0)
                @php
                    $my_count += 1;
                @endphp
            @endif
            @endforeach
            <span class="messages">
                @php
                    echo $my_count;
                @endphp
            </span> Nachrichten
            </a>
        </li>
        @endauth

      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
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