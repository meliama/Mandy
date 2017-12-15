@extends('layouts.template')

@section('content')

  <div class="page-container login-registro-content">
    <div class="titulo-login">
        <h3>Login</h3>
    </div>
    <form class="form-login-registro" method="post" action="{{ route('login') }}">
      {{ csrf_field() }}
      <input type="text" class="email" name="email" placeholder="Correo electrónico" value="{{ old('email') }}">

      <span class="error">
      @if ($errors->has('email'))
        <span class="ion-close"></span>
            {{ $errors->first('email') }}
      @endif <br>
    </span>

      <input type="password" class="password" name="password" placeholder="Contraseña">
      <span class="error">
      @if ($errors->has('password'))
            <span class="ion-close"></span>
              {{ $errors->first('password') }}
      @endif
    </span>



      <div class="adicionales-login">
        <label class="recordarme">
          <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}  value="remember"> Recordarme
        </label>
        <a class="olvidar" href="{{ route('password.request') }}">¿Olvidó su contraseña?</a>
      </div>

      <button class="boton-ingresar" type="submit" name="button">Ingresar</button>
      <button class="boton-registrate" type="button"><a href="{{route('register')}}">Regístrate</a></button>

    </form>
  </div>
<script src="js/validacion-login.js"></script>
@endsection
