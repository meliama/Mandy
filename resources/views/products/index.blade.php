@extends('layouts.template')

@section('content')

<div class="all-products-container">
  @foreach ($products as $product)
    <a href="/products/{{$product->id}}">
    <div class="one-product-container">

      <div class="one-product-img">
        <!-- <a href="/products/{{$product->slug}}">ver</a>  -->
        <!-- <?php if (isset($product->image[0])) {dump( $product->image[0]->src  ); } ?> -->
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
        <li class="one-product-usernname">{{$product->user->name}}</li>
        <li class="one-product-price"><span>$</span>{{ $product->price }}</li>
      </ul>


      </div>
      </a>
  @endforeach
<div class="pagination-container">
  {{ $products->links() }}
</div>
</div>

@endsection
