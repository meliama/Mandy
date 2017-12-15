@extends('layouts.template')

@section('content')
<div class="main-container">
     <div class="header-seller">
       <h2>Nuestros artistas</h2>
     </div>

    <div class="grupo left">
        <a href="images/seller1.jpg" data-lightbox="roadtrip"><img  src="images/seller1.jpg" alt=""/></a>
        <div class="texto">
          <p class="quote">" Mandy fue parte de mi crecimiento para pasar de un hobby a un emprendimiento propio. Mis diseños no hubieran caido en tantas manos si no fuera porque estoy acá. "</p>
          <br>
          <p><strong>Erika</strong> de<a href="#/"> Cuadrate</a> </p>
        </div>
    </div>

    <div class="grupo right">
        <a href="images/seller2.jpg" data-lightbox="roadtrip"><img  src="images/seller2.jpg" alt=""/></a>
        <div class="texto">
          <p class="quote">" Gracias a Mandy mi pasión explotó en una linea multifacetica de productos originales, con clientes de todas partes del mundo. "</p>
          <br>
          <p><strong>Carol</strong> de<a href="#/"> Carol ilustraciones</a> </p>
        </div>
    </div>

    <div class="grupo left">
        <a href="images/seller3.jpg" data-lightbox="roadtrip"><img  src="images/seller3.jpg" alt=""/></a>
        <div class="texto">
          <p class="quote">" No hay duda de que Mandy jugó un papel muy importante en nuestro éxito y crecimiento. Aunque ahora tenemos distintos puntos de venta, Mandy sigue siendo el mejor lugar para encontrar nuevos clientes. "</p>
          <br>
          <p><strong>Sebastian</strong> de<a href="#/"> Talmetal</a> </p>
        </div>
    </div>

    <div class="grupo right">
        <a href="images/seller4.jpg" data-lightbox="roadtrip"><img  src="images/seller4.jpg" alt=""/></a>
        <div class="texto">
          <p class="quote">" Gracias a la popularidad que logré obtener en Mandy por mis productos, pude mudarme y dedicarme al diseño a tiempo completo. "</p>
          <br>
          <p><strong>Laura</strong> de<a href="#/"> Buena chica moda</a> </p>
        </div>
    </div>



    <section class="about-sellers">
      <p>Mandy es el lugar donde podrás estar al tanto de las nuevas tendencias y estilos tanto en arte como en moda.</p>
      <p>Un espacio dirigido para todo tipo de personas interesadas en descubrir piezas únicas.</p>
      <center>
        <a class="ver-mas" href="{{ route('register') }}">
        Únete
        </a>
      </center>
    </section>

  <div class="page-container">


    <section class="section-sellers">
      <div class="section-title">
        <h3 class="sellers-title">Artistas:</h3>
        <img src="images/separator.png" alt="Separator">
      </div>
    @if (isset($sellers))

    <div class="list-view">
        @forelse ($sellers as $key => $seller )

        <article class="artista">
            <img class="imagen-artista" src="{{ Storage::disk('public')->url($seller->user->image) }}" alt="{{ $seller->user->name }}">
            <h5 class="artista-etiqueta">{{ $seller->user->name }} {{ $seller->user->surname }}</h5>
            <h6 class="artista-contenido"><span class="ion-location"></span>{{ $seller->location }}</h6>
            <p>{{ $seller->description }}</p>
            <a href="/sellers/{{$seller->id}}">Conocer</a>
        </article>
        @empty
            <h2>No hay artistas disponibles</h2>
        @endforelse

    </div>
    @endif
  </div>
</div>
<script src="js/jquery-3.2.1.min.js">
</script><script src="js/lightbox.js"></script>

<script>
    lightbox.option({
      'resizeDuration': 200,
      'wrapAround': true,
      'showImageNumberLabel':	false,
      // 'disableScrolling':	true,
      // 'positionFromTop':	100
    })
</script>

@endsection
