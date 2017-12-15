<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
  <head>
    <meta charset="utf-8">
    <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Mandy.com - Compra arte independiente local</title>

    <link href="{{ asset('css/normalize.css') }}" rel="stylesheet">
    <link href="{{ asset('css/ionicons-2.0.1/css/ionicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/responsiveslides.css')}}" rel="stylesheet">
    <link href="{{ asset('css/lightbox.css')}}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" class="theme">
    <title>Mandy.com - Compra arte independiente local</title>
  </head>
  <body>

    <header class="main-header">
      <input type="checkbox" id="open-nav">
      <label for="open-nav" class="toggle-nav">
        <span class="ion-navicon-round"></span>
      </label>
      <a href="{{route('home') }}" class="logo-title">
        <h1>Mandy</h1>
      </a>

      <!-- NAV -->
      <nav class="main-nav">
        <label class="close-nav" for="open-nav">
          <span class="ion-chevron-left"></span>
        </label>
        <a href="#" class="shopping-bag sb-mobile">
          <span class="ion-bag"></span>
        </a>
        <div class="links-mobile">
          @if(Auth::check())
            <div class="user-avatar">
              <img src="{{ Storage::disk('public')->url(Auth::user()->image) }}" alt="{{ Auth::user()->image }}">
            </div>
            <div class="user-display">
              <a href="{{route('profile') }}">
                Hola, {{ Auth::user()->name }} <br>
                <u>Ir a perfil &nbsp; ▸</u>
              </a>

            </div>
          @else
            <a href="{{ route('login') }}" class="log-in-mobile">Login</a>
            <a href="{{ route('register') }}">
              ¿Aún no tienes cuenta?<br><u>Regístrate.</u>
            </a>
          @endif
        </div>
        <ul>
          <li><a href="{{route('home') }}">Inicio</a></li>
          <li><a href="#">Cómo funciona</a></li>
          <li><a href="/products">Productos</a></li>
          <li><a href="/sellers">Artistas</a></li>
          <li><a href="{{ route('faqs') }}">FAQs</a></li>
          @if(Auth::check())
            <li><a href="#" onclick="event.preventDefault();
                       document.getElementById('logout-form').submit();">Cerrar sesión</a></li>
                       <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                           {{ csrf_field() }}
                       </form>
          @endif
        </ul>
      </nav>

      <div class="icon-nav">
        <input type="checkbox" id="open-search">

        <div class="links-desktop">

          @if(Auth::check())
            <span class="user-avatar">
               <img  src="{{ Storage::disk('public')->url(Auth::user()->image) }}" alt="{{ Auth::user()->image}}">
            </span>
            <span class="user-display">
              Hola,   {{ Auth::user()->name }}  &nbsp; ▾
            </span>
            <div class="user-menu">
              <ul>
                <li><a href="{{route('profile') }}">Mi perfil</a></li>
                <li><a href="#"  onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();">Cerrar sesión</a></li>
              </ul>
            </div>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>


          @else
            <a href="{{ route('register') }}">Regístrate</a>
            <a href="{{ route('login') }}" class="log-in-desktop">Login</a>
          @endif

        </div>

        <form method="get" class="top-searchbar" action="{{ route('products.search', 'search') }}">
          <input type="text" id="search" name="search"  placeholder="¿Qué estás buscando?">
          <!-- <input type="submit" name="search" value="Ir"> -->
        </form>
        <label for="open-search" class="top-search">
            <span class="ion-search"></span>
        </label>
        <a href="#" class="shopping-bag sb-desktop">
          <span class="ion-bag"></span>
        </a>
      </div>
    </header>

    @yield('content')

    <footer class="main-footer">
      <div class="footer-content">
        <div class="newsletter">
          <p>¡Únete al newsletter y recibe novedades!</p>
          <form class="main-searchbar" action="" method="get">
            <input type="text" name="main-searchbar" placeholder="Ingresa tu correo electrónico">
            <input type="submit" name="suscribir" value="Suscribir">
          </form>
        </div>
        <span>Sobre nosotros</span>
        <ul>
          <li><a href="#">Inicio</a></li>
          <li><a href="#">FAQs</a></li>
          <li><a href="#">Cómo funciona</a></li>
            @if(Auth::check() != true)
            <li><a href="#">Regístrate</a></li>
          @endif
          <li>
            <a href="#">
              <span class="ion-social-facebook"></span>
            </a>
            <a href="#">
              <span class="ion-social-instagram"></span>
            </a>
            <a href="#">
              <span class="ion-social-tumblr"></span>
            </a>
            <a href="#">
              <span class="ion-social-twitter"></span>
            </a>
          </li>
        </ul>
      </div>
    </footer>
</body>
</html>
