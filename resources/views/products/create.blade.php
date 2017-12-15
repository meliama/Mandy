@extends('layouts.template')

@section('content')
<div class="page-container login-registro-content">
  <div class="titulo-registro">
      <h3>Crear Producto</h3>
  </div>
   <form method="post" class="form-login-registro" action="/products" enctype="multipart/form-data">

      {{ csrf_field() }}

        @include('products.form')

        <input class="create-button"type="submit" value="Crear producto" />

    </form>

    @if(count($errors) > 0)
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    @endif

    </div>
</div>

@endsection
