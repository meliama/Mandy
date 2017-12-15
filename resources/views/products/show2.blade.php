
@extends('layouts.template')

@section('content')
<div class="page-container">
  <main class="only-one-container">
    <div class="left-container">
    <img class="active" src="{{ Storage::disk('public')->url($product->image[0]->src) }}">
    </div>
    <div class="right-container">
    <div class="product-description">
      <h2>{{ $product->name }}</h2>
      <span>${{ $product->price }}</span>
      <p>Love you like a love song baby ...</p>
    </div>
    <hr class="rule">
    <div class="size">
      <label class="size-text">Tamaño:</label>
      <select>
          <option value="s">S</option>
          <option value="m">M</option>
          <option value="l">L</option>
      </select>
    </div>


    <div class="qty">
      <label class="qty-text">Cantidad:</label>
      <select>
        <?php
      for ($i = 0; $i <= $product->stock; ++$i) { ?>
      <option value="<?php echo $i; ?>"><?php echo $i; ?>
      </option>
      <?php }
      ?></select>
    </div>

    <div class="buy">
    <a href="#" class="buy-button">Comprar</a>
    </div>

    <div id="descripcion">
      <ul>
          <li class="movil">
              	<h3 class="title">Descripción<span class="ion-minus"></span></h3>
                <p class="contenido">{{ $product->description }}</p>

          </li>

          <li class="movil">
              	<h3 class="title">Medios de Pago<span class="ion-minus"></span></h3>
                <p class="contenido">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna </p>

          </li>
      </ul>
  </div>


    </div>
    </main>
  </div>


    <script src="../js/jquery-3.2.1.min.js"></script>
    <script src="../js/product.js"></script>



  <!-- <div class="perfil-view">
 -->
    {{-- <!-- {{ $product->user->seller }} -->
    <!-- <p><strong>Artista:</strong><br> {{ $product->user->name }} {{ $product->user->surname }}</p> -->
    {{-- <!-- <p><strong>Ubicación:</strong><br> {{ $product->user->seller->location }} </p> -->  --}}

    {{-- <!-- <p><strong>Nombre:</strong><br> {{ $product->name }} </p>
    <p><strong>Descripción:</strong><br> {{ $product->description }} </p> --}}
    {{-- <p><strong>Stock:</strong><br> {{ $product->stock }} </p>
    <p><strong>Category:</strong><br> {{ $product->category->name }} </p>
  </div>
  <ul>
    @forelse ($images as $image1)
    <li>
        <img class="imagen-perfil" src="{{ Storage::disk('public')->url($image1->src) }}" alt="{{ Storage::disk('public')->url($image1->src) }}">
    </li>
    @empty
        <li>'No images'</li>
    @endforelse
  </ul>
  <div class="clearfix"></div>
  <center>
    <a class="boton-modificar" href="/products/{{$product->id}}/edit">Editar</a>
  </center>
</div> -->
</div>
@endsection --}} --}}
