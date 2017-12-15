
@extends('layouts.template')

@section('content')
<div class="page-container">
  <main class="only-one-container">
    <div class="left-container">

      <div id="myModal" class="modal">
        <div class="modal-content">
          <div class="main-image">


          <div class="mySlides">
            @if (isset($product->image[0]))
            <img src="{{ Storage::disk('public')->url($product->image[0]->src) }}" style="width:100%">
            @else
            <img src="{{ Storage::disk('public')->url('img_products/default-product.png') }}" style="width:100%" onclick="currentSlide(1)" alt="{{ $product->name }}">
            @endif
          </div>

          <div class="mySlides">
            @if (isset($product->image[1]))
            <img src="{{ Storage::disk('public')->url($product->image[1]->src) }}" style="width:100%">
            @else
            <img src="{{ Storage::disk('public')->url('img_products/default-product.png') }}" style="width:100%" onclick="currentSlide(1)" alt="{{ $product->name }}">
            @endif
          </div>

          <div class="mySlides">
            @if (isset($product->image[2]))
            <img src="{{ Storage::disk('public')->url($product->image[2]->src) }}" style="width:100%">
            @else
            <img src="{{ Storage::disk('public')->url('img_products/default-product.png') }}" style="width:100%" onclick="currentSlide(1)" alt="{{ $product->name }}">
            @endif
          </div>

          <div class="mySlides">
            @if (isset($product->image[3]))
            <img src="{{ Storage::disk('public')->url($product->image[3]->src) }}" style="width:100%">
            @else
            <img src="{{ Storage::disk('public')->url('img_products/default-product.png') }}" style="width:100%" onclick="currentSlide(1)" alt="{{ $product->name }}">
            @endif
          </div>

          <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
          <a class="next" onclick="plusSlides(1)">&#10095;</a>
          </div>

          <div class="column">
            @if (isset($product->image[0]))
            <img class="demo cursor" src="{{ Storage::disk('public')->url($product->image[0]->src) }}" style="width:100%" onclick="currentSlide(1)" alt="Nature and sunrise">
            @else
            <img class="demo cursor" src="{{ Storage::disk('public')->url('img_products/default-product.png') }}" style="width:100%" onclick="currentSlide(1)" alt="{{ $product->name }}">
            @endif
          </div>

          <div class="column">
            @if (isset($product->image[1]))
            <img class="demo cursor" src="{{ Storage::disk('public')->url($product->image[1]->src) }}" style="width:100%" onclick="currentSlide(2)" alt="{{ $product->name }}">
            @else
            <img class="demo cursor" src="{{ Storage::disk('public')->url('img_products/default-product.png') }}" style="width:100%" onclick="currentSlide(2)" alt="default image">
            @endif
          </div>

          <div class="column">
            @if (isset($product->image[2]))
            <img class="demo cursor" src="{{ Storage::disk('public')->url($product->image[2]->src) }}" style="width:100%" onclick="currentSlide(3)" alt="{{ $product->name }}">
            @else
            <img class="demo cursor" src="{{ Storage::disk('public')->url('img_products/default-product.png') }}" style="width:100%" onclick="currentSlide(3)" alt="default image">
            @endif
          </div>

          <div class="column">
            @if (isset($product->image[3]))
            <img class="demo cursor" src="{{ Storage::disk('public')->url($product->image[3]->src) }}" style="width:100%" onclick="currentSlide(4)" alt="{{ $product->name }}">
            @else
            <img class="demo cursor" src="{{ Storage::disk('public')->url('img_products/default-product.png') }}" style="width:100%" onclick="currentSlide(4)" alt="default image">
            @endif
          </div>
        </div>
      </div>

    <!-- <img class="active" src="{{ Storage::disk('public')->url($product->image[0]->src) }}"> -->
    </div>
    <div class="right-container">
    <div class="product-description">
      <h2>{{ $product->name }}</h2>
      <p>{{$product->user->username}}</p>
      <span>${{ $product->price }}</span>
    </div>
    <hr class="rule">


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
                <p class="contenido"><img src="../images/pago.png" ></p>

          </li>
      </ul>
  </div>


    </div>
    </main>
  </div>


  <script src="../js/jquery-3.2.1.min.js"></script>
  <script src="../js/product.js"></script>

  <script>

  var slideIndex = 1;
  showSlides(slideIndex);

  function plusSlides(n) {
    showSlides(slideIndex += n);
  }

  function currentSlide(n) {
    showSlides(slideIndex = n);
  }

  function showSlides(n) {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    var dots = document.getElementsByClassName("demo");
    var captionText = document.getElementById("caption");
    if (n > slides.length) {slideIndex = 1}
    if (n < 1) {slideIndex = slides.length}
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex-1].style.display = "block";
    dots[slideIndex-1].className += " active";
    captionText.innerHTML = dots[slideIndex-1].alt;
  }
</script>

</div>
@endsection
