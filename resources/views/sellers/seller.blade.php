@extends('layouts.template')

@section('content')

  <div class="page-container">
    <nav class="profile-menu">
      <div class="img_perfil_container">
         <img class="imagen-perfil" src="{{ Storage::disk('public')->url($seller->user->image) }}" alt="{{ $seller->user->image }}">
      </div>
      <ul>
        <li><a href="#/" onclick="openTab('perfil')">Datos del vendedor<span class="ion-chevron-right"></span></a></li>
        <li><a href="#/" onclick="openTab('productos')">Productos<span class="ion-chevron-right"></span></a></li>
      </ul>
    </nav>

    <div class="info-container" id="datos">
      <div class="field">
        <h3>{{$seller->user->name}} {{ $seller->user->surname }}</h3>
      <p><strong>Ubicación:<br> </strong><br>
        {{ $seller->location }}
      <p><strong>Email:<br> </strong><br>
        {{ $seller->user->email }}
        <p><strong>Descripcion:<br></strong><br> {{$seller->description }} </p>
        <p><strong>Servicios:<br></strong><br>
          @if($seller->services === 0)
            No
          @else
            Si
          @endif
         </p>

      </div>
    </div>


    <div class="info-container" id="productos" >
      <h3>Productos</h3>
      @foreach ($products as $product)

        <div class="product-container product-container-profile">
           <a href="../products/{{$product->id}}">
          <div class="product-img">

            <a href="../products/{{$product->id}}">
            @if (isset($product->image[0]))
              <img  class="imagen-product" src="{{ Storage::disk('public')->url($product->image[0]->src) }}" alt="{{ $product->name }}">
            @else
            <img src="{{ Storage::disk('public')->url('img_products/default-product.png') }}" alt="{{ $product->name }}">
            @endif
          </a>
          </div>

          <ul>
            <li class="product-name"><a href="../products/{{$product->id}}">{{ $product->name }}</a></li>
            <li class="product-price">$ {{ $product->price }}</li>
            <li class="product-stock">Unidades: {{ $product->stock }}</li>
          </ul>
            </a>
        </div>

      @endforeach
      </div>

    </div>


<script src="../js/seller.js"></script>

  @endsection
