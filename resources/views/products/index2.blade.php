@extends('layouts.template')

@section('content')


<div class="page-container">
  <!-- <nav class="profile-menu">
    <ul>
      <li><a href="#/" onclick="">Filtrar por: <span class="ion-plus"></span></a></li>
    </ul>
  </nav> -->
  @foreach ($products as $product)
    <div class="product-container">

      <div class="product-img">
        <a href="products/{{$product->id}}">

        @if (isset($product->image[0]))
          <img  class="imagen-product" src="{{ Storage::disk('public')->url($product->image[0]->src) }}" alt="{{ $product->name }}">
        @else
        <img src="../images/artista1.png" alt="{{ $product->name }}">
        @endif
        </a>
      </div>

      <ul>
        <li class="product-name"><a href="products/{{$product->id}}">{{ $product->name }}</a></li>
        <li class="vendedor">{{ $product->user->name }}</li>
        <li class="product-price">$ {{ $product->price }}</li>
        <li class="product-stock">Unidades: {{ $product->stock }}</li>
        {{-- <li><a href="#">Vendedor</a></li> --}}

        <!-- <li class="product-edit">
          <a href="/products/{{$product->id}}/edit">Editar</a>
        </li>
        <li class="delete-button"><form class="" action="{{ route('products.destroy', $product) }}" method="post">
          {{csrf_field()}}
          {{method_field('DELETE')}}
          <input class="product-delete-button"type="submit" name="delete" value="Borrar">
        </form></li> -->
      </ul>
      </div>

  @endforeach


  </div>


@endsection
