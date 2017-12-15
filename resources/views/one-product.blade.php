@extends('layouts.template')

@section('content')

{{-- <header>
  <div class="form-login-registro">
  <select class="input-label" class="" name="">
    <option value="">Categorias</option>
    <option value="">Skirts</option>
    <option value="">T-shirts</option>
    <option value="">Dress</option>
    <option value="">Bottoms</option>
  </select>
  </div>
</header> --}}
<div class="all-products-container">
  @foreach ($products as $product)
    <div class="one-product-container">

      <div class="one-product-img">
        <!-- <a href="/products/{{$product->slug}}">ver</a>  -->
        @if (isset($product->image[0]))
          <!-- dump( $product->image[0]->src  ); -->
          <img width= "100px" class="one-imagen-product" src="{{ Storage::disk('public')->url($product->image[0]->src) }}" alt="{{ Storage::disk('public')->url($product->image[0]->src) }}">
        @else
        <img src="images/joyeria.jpg" style="width: 180px;
        height:230px;"  alt="">
        @endif

      </div>

      <ul>
        <li class="one-product-name">{{ $product->name }}</li>
        <li class="one-product-price"><span>$</span>{{ $product->price }}</li>
      </ul>


      </div>
  @endforeach
<div class="pagination-container">
  {{ $products->links() }}
</div>


</div>


@endsection
