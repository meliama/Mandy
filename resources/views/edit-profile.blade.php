@extends('layouts.template')

@section('content')
<div class="page-container login-registro-content">

  <div class="titulo-registro">
    <h3>Modificar perfil</h3>
  </div>

  <form id="form" class="form-login-registro" method="post" enctype="multipart/form-data" action="{{ route('edit') }}">

    {{ csrf_field() }}


    <center>
      <img class="imagen-perfil" src="{{ Storage::disk('public')->url($user->image) }}" alt="{{ $user->image }}">
      <input type="file" name="img_profile" id="img_profile" class="img_profile">
      <label for="img_profile">Subir nueva imagen</label>
    </center>


    <label class="input-label" for="name">Nombre</label><br>
    <input type="text" name="name" value="{{ Auth::user()->name }}" class="name">
    <span class="error">
    @if ($errors->has('name'))
        <span class="ion-close"></span>
        {{ $errors->first('name') }}
    @endif
  </span>

    <label class="input-label" for="surname">Apellido</label><br>
    <input type="text" name="surname" value="{{ Auth::user()->surname }}" class="surname">
    <span class="error">
    @if ($errors->has('surname'))
        <span class="ion-close"></span>
        {{ $errors->first('surname') }}
    @endif
  </span>

    <label class="input-label" for="username">Username</label><br>
    <input type="text" name="username" value="{{ Auth::user()->username }}" class="username">
    <span class="error">
    @if ($errors->has('username'))
        <span class="ion-close"></span>
        {{ $errors->first('username') }}
    @endif
  </span>
  <!-- campos oscuros para saber los valores eligidos -->
  <span style="display:none" id="country_code">{{ $user->country }}</span>
  <span style="display:none" id="region_code">{{ $user->region }}</span>
  <span style="display:none" id="city_code">{{ $user->city }}</span>

      <label class="input-label" for="country">País:</label><br>
      <select id="paises" name="country" class="country" >
          <option value="0">Elegi tu pais...</option>
      </select>
      <span class="error"></span>

        <div id="region-box"  style="display: none;">
          <label class="input-label" for="region">Provincia:</label><br>
          <select id="regiones" name="region"　>
          </select>
        </div>
        <div id="city-box" style="display:none;">
          <label class="input-label" for="city">Ciudad:</label><br>
          <select id="ciudades" name="city">
          </select>
        </div>
        <input type="checkbox" class="cbseller" id="cbseller"
        @if ( $vendedor == 1)
          checked disabled
        @endif
        ><label class="input-label" for="description">Sos Vendedor?</label><br>

        <div id="sellerbox" name="sellerbox" class="sellerbox" style="display:block">
          <label class="input-label" for="description">Descripción</label><br>
          <input type="text" name="description" value="{{ $seller->description }}">
          @if ($errors->has('description'))
            <span class="error">
              <span class="ion-close"></span>
              {{ $errors->first('description') }}
            </span>
          @endif
          <label class="input-label" for="category_id">Categoría</label><br>
          <select name="category_id">
            <option>Elegir:</option>
            @forelse ($categories as $category)
               <option value= "{{$category->id}}"
                 @if ($category->id == old('category_id', $seller->category_id))
                  {{-- <!-- // @if ({{$category->id}} == $seller->category_id) -->  --}}
                      selected = "selected"
                  @endif
                  >{{ $category->name }}</option>
            @empty
               <option value="0">Error: No Categories Found</option>
            @endforelse
          </select>
          @if ($errors->has('category_id'))
            <span class="error">
              <span class="ion-close"></span>
              {{ $errors->first('category_id') }}
            </span>
          @endif

          <label class="input-label" for="category">Ofrece Servicios?</label><br>
          <input type="checkbox" name="services"
          @if ( $seller->services == 1)
              checked
          @endif
          >
        </div>

    <center>
      <button class="boton-modificar" type="submit">Guardar cambios</button>
    </center>

  </form>
</div>

</div>
<script src="js/edit-profile.js"></script>


@endsection
