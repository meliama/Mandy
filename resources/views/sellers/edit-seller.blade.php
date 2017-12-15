@extends('layouts.template')

@section('content')
<div class="page-container login-registro-content">

  <div class="titulo-seller">
    <h3>Mi Seller Perfil</h3>
  </div>

  <form id="editSeller" class="form-login-registro" method="post" enctype="multipart/form-data" action="{{route('sellers.update', $seller, 2)}}">
    {{ csrf_field() }}

    <center>
      <img class="imagen-perfil" src= "" alt="imagen de perfil"><br>
      <input type="file" name="img_profile" id="img_profile" class="img_profile">
      <label for="img_profile">Subir nueva imagen</label>
    </center>


    <label class="input-label" for="category">Categoría</label><br>
    <input type="text" name="category" value="{{ $seller->category }}">
    @if ($errors->has('category'))
      <span class="error">
        <span class="ion-close"></span>
        {{ $errors->first('category') }}
      </span>
    @endif

    <label class="input-label" for="location">Ubicación</label><br>
    <input type="text" name="location" value="{{ $seller->location }}" >
    @if ($errors->has('location'))
      <span class="error">
        <span class="ion-close"></span>
        { $errors->first('location') }}
      </span>
    @endif

    <label class="input-label" for="description">Descripción</label><br>
    <input type="text" name="description" value="{{ $seller->description }}">
    @if ($errors->has('description'))
      <span class="error">
        <span class="ion-close"></span>
        {{ $errors->first('description') }}
      </span>
    @endif
    <center>
      <button class="boton-modificar" type="submit">Guardar cambios</button>
    </center>

  </form>
</div>

</div>

@endsection
