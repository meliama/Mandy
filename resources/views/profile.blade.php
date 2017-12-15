@extends('layouts.template')

@section('content')

<div class="page-container">
  <nav class="profile-menu">
    <div class="img_perfil_container">
       <img class="imagen-perfil" src="{{ Storage::disk('public')->url($user->image) }}" alt="{{ $user->image }}">
    </div>
    <ul>
      <li><a href="#/" onclick="openTab('datos')">Mis datos<span class="ion-chevron-right"></span></a></li>
      <li><a href="#/" onclick="openTab('compras')">Mis compras<span class="ion-chevron-right"></span></a></li>
      <li><a href="#/" onclick="openTab('ventas')">Mis productos<span class="ion-chevron-right"></span></a></li>
      <li><a href="#/" onclick="openTab('temas')">Cambiar tema<span class="ion-chevron-right"></span></a></li>
    </ul>
  </nav>

  <div class="info-container" id="datos">
    <div class="field">
      <h3>Datos de cuenta</h3>
      <p><strong>Usuario:</strong><br> {{ Auth::user()->username }} </p>
      <p><strong>E-mail:</strong><br>{{ Auth::user()->email }} </p>
    </div>

    <div class="field">
      <h3>Datos personales</h3>
    <p><strong>Nombre:</strong><br> {{ Auth::user()->name }} {{ Auth::user()->surname }}</p>
    <!-- campos oscuros para saber los valores eligidos -->
    <span style="display:none" id="country_code">{{ $user->country }}</span>
    <span style="display:none" id="region_code">{{ $user->region }}</span>
    <span style="display:none" id="city_code">{{ $user->city }}</span>


    <p><strong>Ubicación:<br> </strong>
      <span id="country_text"></span>
      <span id="region_text"></span>
      <span id="city_text"></span>
      <!-- @if ( $user->city != '' && $user->city != 'Otra')
        {{$user->city}}

      @endif
      @if ( $user->region != '')
        {{$user->region}}
     @endif
     {{$user->country}} -->
   </p>
    <p>
      <strong>Vendedor?</strong><br>
      @if ( $vendedor  == 1)
       Si
     @else
       No
     @endif
     <br>  </p>
    <!-- <p><strong>Teléfono:</strong><br></p> -->
    @if ($vendedor == true)
      <p><strong>Descripción:</strong><br> {{ $seller->description }}</p>
      <p><strong>Ofrece Servicios?</strong><br>
         @if ( isset($seller) && $seller->services  == 1)
          Si
        @else
          No
        @endif
      <br>

    @endif
    <br><br><br><br><br><br><br>
    </div>

    <center>
      <a class="boton-modificar" href="{{route('edit')}}">Modificar perfil</a>
    </center>
  </div>

  <div class="info-container" id="compras">
    <h3>Mis compras</h3>
    <div class="information">
      <span class="ion-information"></span>
      <p>¡Todavía no compraste nada!</p>
    </div>
  </div>

  <div class="info-container" id="ventas" >
    <h3>Mis productos</h3>
    @if($vendedor != true)
    <div class="information">
      <span class="ion-information"></span>
      <p>Para vender tus productos necesitas indicar que sos vendedor. Hace click <strong><a href="{{route('edit')}}">acá</a></strong> para modificarlo.</p>
    </div>
    @else

    @foreach ($products as $product)
      <div class="product-container product-container-profile">

        <div class="product-img">
          <a href="products/{{$product->id}}">

          @if (isset($product->image[0]))
            <img  class="imagen-product" src="{{ Storage::disk('public')->url($product->image[0]->src) }}" alt="{{ $product->name }}">
          @else
          <img src="{{ Storage::disk('public')->url('img_products/default-product.png') }}" alt="{{ $product->name }}">
          @endif
          </a>
        </div>

        <ul>
          <li class="product-name"><a href="products/{{$product->id}}">{{ $product->name }}</a></li>
          <li class="vendedor">{{ $product->user->username }}</li>
          <li class="product-price">$ {{ $product->price }}</li>
          <li class="product-stock">Unidades: {{ $product->stock }}</li>

          <li class="editar">
             <a href="/products/{{$product->id}}/edit" >Editar</a>
</li>

          <li class="delete-button"><form class="" action="{{ route('products.destroy', $product) }}" method="post">
            {{csrf_field()}}
            {{method_field('DELETE')}}
            <input class="delete"type="submit" name="delete" value="Borrar" >
          </form></li>
        </ul>
        {{-- <div class="product-buttons">
        <a href="/products/{{$product->id}}/edit"><span class="ion-edit"></span></a>
<form class="" action="{{ route('products.destroy', $product) }}" method="post">
          {{csrf_field()}}
          {{-- {{method_field('DELETE')}} --}}
        {{--<a href=""><span class="ion-trash-a"></span></a>
      </form>
      </div> --}}
        </div>

    @endforeach
    <center>
      <a class="boton-modificar" href="/products/create">Crear producto</a>
    </center>
    @endif
  </div>

  <div class="info-container" id="temas">
    <h3>Temas</h3>
    <p>Tema light-blue</p><button type="button" name="button" class="tema" onclick="changeTheme('http://127.0.0.1:8000/css/light-blue.css')">Cambiar</button>
    <p>Tema Furious-orange</p><button type="button" name="button" class="tema" onclick="changeTheme('http://127.0.0.1:8000/css/furious-orange.css')">Cambiar</button>
    <p>Tema Original</p><button type="button" name="button" class="tema" onclick="changeTheme('http://127.0.0.1:8000/css/style.css')">Cambiar</button>
  </div>

</div>
<script src="js/profile.js"></script>
@endsection
