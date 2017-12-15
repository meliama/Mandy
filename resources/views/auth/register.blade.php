@extends('layouts.template')

@section('content')


<div class="page-container login-registro-content">
  <div class="titulo-registro">
    <h3>Registro</h3>
  </div>

  <form class="form-login-registro" method="post" enctype="multipart/form-data" action="{{ route('register') }}">
    {{ csrf_field() }}
    <div class="two-input-wrapper">
      <div class="input-container">
        <input type="text" name="name" class="name" placeholder="Nombre" value="{{ old('name') }}">
          <span class="error">
            @if ($errors->has('name'))
              <span class="ion-close"></span>
              <style media="screen">
                .form-login-registro span.error {
                  display: inline-block;
                  border-top: dotted #d10404 1px;
                }
              </style>
            {{ $errors->first('name') }}
          @endif
          </span>
      </div>

      <div class="input-container">
        <input type="text" name="surname" class="surname" placeholder="Apellido" value="{{ old('surname') }}" >
          <span class="error">
            @if ($errors->has('surname'))
            <span class="ion-close"></span>
            {{ $errors->first('surname') }}
          @endif
          </span>
      </div>
    </div>

    <input type="text" class="username" name="username" placeholder="Usuario" value="{{ old('username') }}">
      <span class="error">
        @if ($errors->has('username'))
        <span class="ion-close"></span>
        {{ $errors->first('username') }}
      @endif
      </span>


    <input type="text" class="email" name="email" placeholder="Correo electrónico" value="{{ old('email') }}">
    <span class="error">
    @if ($errors->has('email'))
      <span class="ion-close"></span>
        {{ $errors->first('email') }}
      @endif
      </span>

    <input type="password" class="password" name="password" placeholder="Contraseña" value="{{ old('password') }}">
      <span class="error">
        @if ($errors->has('password'))
          <span class="ion-close"></span>
          {{ $errors->first('password') }}
        @endif
      </span>

    <input id="password-confirm" type="password" class="repass" name="password_confirmation" placeholder="Reingresar contraseña" value="{{ old('repass') }}">
    <span class="error"></span>


    <button class="boton-registrarme" type="submit" name="button">Registrarme</button>

  </form>
</div>
<script src="js/validacion-registro.js"></script>
@endsection
