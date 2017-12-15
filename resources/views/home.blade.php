@extends('layouts.template')

@section('content')
<!-- CONTAINER -->

<div class="main-container">

<div class="main-slider">
  <div class="mySlides">
    <img src="images/slide1.jpg" style="width:100%">
  </div>
  <div class="mySlides">
    <img src="images/slide2.jpg" style="width:100%">
  </div>
  <div class="mySlides">
    <img src="images/slide3.jpg" style="width:100%">
  </div>
  <div class="mySlides">
    <img src="images/slide4.jpg" style="width:100%">
  </div>



  <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
  <a class="next" onclick="plusSlides(1)">&#10095;</a>
  </div>


  <!-- CATEGORÍAS -->

  <section class="about">
    <p>Bienvenido a la plataforma donde <span>artistas locales</span> pueden mostrar y ofrecer a lo que le dedican tanto esfuerzo</p>
    <center>
      <a class="ver-mas" href="faqs">
        Conoce más
      </a>
    </center>
  </section>


  <section class="seccion fondo-gris">
    <div class="section-title">
      <h3>Categorías</h3>
      <img src="images/separator.png" alt="Separator">
      <p>Podrás encontrar desde artes plásticas hasta ropa:</p>
    </div>

    <div class="categorias">

      <article class="categoria">
        <span class="imagen-categoria"></span>
        <a href="#">
          <h4>Pintura</h4>
        </a>
      </article>

      <article class="categoria">
        <a href="#">
          <h4>Ilustración</h4>
        </a>
        <span class="imagen-categoria"></span>
      </article>

      <article class="categoria">
        <span class="imagen-categoria"></span>
        <a href="#">
          <h4>Ropa</h4>
        </a>
      </article>


      <article class="categoria">
        <a href="#">
          <h4>Fotografía</h4>
        </a>
        <span class="imagen-categoria"></span>
      </article>

      <article class="categoria">
        <span class="imagen-categoria"></span>
        <a href="#">
          <h4>Joyería</h4>
        </a>
      </article>

    </div>

    <center>
      <a class="ver-mas" href="products">
        Ver los productos
      </a>
    </center>

  </section>


  <section class="seccion">

    <div class="section-title">
      <h3>Artistas destacados</h3>
      <img src="images/separator.png" alt="Separator">
      <p>Explora el perfil de los artistas destacados del mes; conoce sus productos y servicios:</p>
    </div>

    <div class="artistas-destacados">

      <article class="artista">
          <img class="imagen-artista" src="images/artista1.png" alt="pdto 01">
          <h5 class="artista-etiqueta">Matias Sánchez</h5>
          <h6 class="artista-contenido"><span class="ion-location"></span> Palermo, Buenos Aires</h6>
          <p>Ilustrador</p>
          <a href="#">Conocer</a>
      </article>

      <article class="artista">
          <img class="imagen-artista" src="images/artista3.png" alt="pdto 01">
          <h5 class="artista-etiqueta">Eduardo Gómez</h5>
          <h6 class="artista-contenido"><span class="ion-location"></span> San Telmo, Buenos Aires</h6>
          <p>Diseñador gráfico</p>
          <a href="#">Conocer</a>
      </article>

      <article class="artista">
          <img class="imagen-artista" src="images/artista2.png" alt="pdto 01">
          <h5 class="artista-etiqueta">Martha Pérez</h5>
          <h6 class="artista-contenido"><span class="ion-location"></span> Recoleta, Buenos Aires</h6>
          <p>Pintora</p>
          <a href="#">Conocer</a>
      </article>

      <article class="artista">
          <img class="imagen-artista" src="images/artista4.png" alt="pdto 01">
          <h5 class="artista-etiqueta">Jimena Sánchez</h5>
          <h6 class="artista-contenido"><span class="ion-location"></span> Palermo, Buenos Aires</h6>
          <p>Escultora</p>
          <a href="#">Conocer</a>
      </article>

      <article class="artista">
          <img class="imagen-artista" src="images/artista5.png" alt="pdto 01">
          <h5 class="artista-etiqueta">Jorge Quispe</h5>
          <h6 class="artista-contenido"><span class="ion-location"></span> Recoleta, Buenos Aires</h6>
          <p>Fotógrafo</p>
          <a href="#">Conocer</a>
      </article>
      <article class="artista">
          <img class="imagen-artista" src="images/artista6.png" alt="pdto 01">
          <h5 class="artista-etiqueta">Sofía Pérez</h5>
          <h6 class="artista-contenido"><span class="ion-location"></span> San Telmo, Buenos Aires</h6>
          <p>Confeccionista</p>
          <a href="#">Conocer</a>
      </article>


    </div>

    <center>
      <a class="ver-mas" href="sellers">
        Ver más artistas
      </a>
    </center>
  </section>
</div>

<!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
<script src="js/responsiveslides.min.js"></script>
<script>

$("#slider1").responsiveSlides({
  auto: false,
  pager: true,
  nav: true,
  speed: 500,
  maxwidth: 800,
  namespace: "centered-btns"
});
</script> -->

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


@endsection
