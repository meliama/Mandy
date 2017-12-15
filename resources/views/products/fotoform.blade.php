@extends('layouts.template')

@section('content')
<div class="page-container login-registro-content">
  <div class="titulo-registro">
      <h3>Agregar Fotos</h3>
  </div>
  <div class="product-images">
  <ul>
    @forelse ($images as $image1)
    <li>
      <img class="imagen-perfil" src="{{ Storage::disk('public')->url($image1->src) }}" alt="{{ $image1->src }}">
        <form class="" action="{{ route('foto.destroy', $image1) }}" method="post" enctype="multipart/form-data">
          {{csrf_field()}}
          {{method_field('DELETE')}}
          <input type="submit" name="" value="Borrar" class="delete">
        </form>
    </li>
    @empty
        <li>No hay imagenes</li>
    @endforelse
  </ul>
    </div>
  <div class="clearfix"></div>
<p></p>
	<form id="fotoform" method="post" enctype="multipart/form-data">
		{{csrf_field()}}

    <input type="file" name="img_product" id="img_product" class="img_product" value="">
    <br>
    @if (count($images)< 4 )
		<button class="update-button" type="submit" name="button">Subir!</button>
    @else
    <p>Limite de 4 imágenes.</p>
    @endif
	</form>
  <a class="update-button" href="{{route('products.show', ['id'=>$product->id]) }}">Finalizar</a>
  </div>
@endsection
