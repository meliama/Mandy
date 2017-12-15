@extends('layouts.template')

@section('content')
  <div class="page-container login-registro-content">
    <div class="titulo-registro">
        <h3>Editar Producto</h3>
    </div>
    <form class="form-login-registro" method="post" action=" {{ route('products.update', $product) }} "
    enctype="multipart/form-data">

      {{ csrf_field() }}
      {{ method_field('PUT') }}



      @include('products.form')
      <div class="product-images">
      <ul type="none">
        @forelse ($images as $image1)
        <li>
            <img width = "100px" class="imagen-perfil" src="{{ Storage::disk('public')->url($image1->src) }}" alt="{{ $image1->src }}"
        </li>
        @empty
          <br>
            <li>No hay imagenes</li>
        @endforelse
      </ul>
    </div>
      <div class="botones">


      <a class="photo-edit" href="/products/{{$product->id}}/fotos">Editar/agregar imagenes</a>

      <input class="save-button" type="submit" value="Guardar Cambios">

      </div>

    </form>
    </div>
@endsection
