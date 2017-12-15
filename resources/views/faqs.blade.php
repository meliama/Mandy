@extends('layouts.template')

@section('content')
<!-- contenido de la seccion -->
<div class="page-container">
  <h2>Preguntas frecuentes</h2>
  <article class="grupo-faqs">
    <div class="titulo-grupo">
      <h3>Empezando</h3>
    </div>
      <div>
        <input type="checkbox" id="pregunta1" class="abrir-pregunta">
        <label for="pregunta1" class="pregunta">
          ¿Cómo me registro? <span class="ion-plus"></span><span class="ion-minus"></span>
        </label>
        <div class="respuesta">
          <p>Para registrarse en el sitio es necesario seguir el link "Registrarse" que se encuentra en la página principal. En la nueva página tendrás que completar los campos obligatorios y elegir una contraseña personal de acceso y luego hacer click en "Registrarme" en el fondo de la página y luego confirmar en la nueva página los datos que se han registrado.</p>
          <p> Desde este momento podrás acceder cada vez que lo desees a tu área personal simplemente introduciendo tus datos de acceso, email y contraseña, en el espacio de login en la página principal. </p>
        </div>
      </div>

      <div>
        <input type="checkbox" id="pregunta2" class="abrir-pregunta">
        <label for="pregunta2" class="pregunta">
          ¿Qué es Mandy? <span class="ion-plus"></span><span class="ion-minus"></span>
        </label>
        <div class="respuesta">
          <p>Somos un mercado de productos únicos hechos a mano, Mandy está hecha por creadores, artistas y crafters de todo el mundo.</p>
        </div>
      </div>

      <div>
        <input type="checkbox" id="pregunta3" class="abrir-pregunta">
        <label for="pregunta3" class="pregunta">
          ¿Cómo realizo una compra? <span class="ion-plus"></span><span class="ion-minus"></span>
        </label>
        <div class="respuesta">
          <p>Cuando encuentres un artículo que quieras comprar, sigue estos pasos:</p>
          <p> Haz clic en Añadir al carro en la página del anuncio del artículo.</p>
          <p> Si el artículo que quieres comprar tiene opciones para elegir (como talla, color o forma), tendrás que seleccionar cada opción antes de poder añadirlo al carro.</p>
          <p>Accede a tu carro en cualquier momento haciendo clic en el icono del carro que verás en la esquina superior derecha del sitio. A partir de ahí, procede a realizar el pago o continúa comprando otros artículos.</p>
        </div>
      </div>

      <div>
        <input type="checkbox" id="pregunta4" class="abrir-pregunta">
        <label for="pregunta4" class="pregunta">
          ¿Cómo informo sobre un problema con mi pedido? <span class="ion-plus"></span><span class="ion-minus"></span>
        </label>
        <div class="respuesta">
          <p>Mandy es un mercado constituido por vendedores individuales que llevan sus propias tiendas. Cada vendedor es responsable de sus propias políticas respecto a envíos, reembolsos y devoluciones, así como de responder preguntas sobre su tienda y sus productos.</p>

          <p>Si quieres devolver un artículo o recibir un reembolso, o si tienes problemas en general con un pedido, lo primero que te recomendamos es que te pongas directamente en contacto con el vendedor. Si no consigues ponerte en contacto con el vendedor o resolver directamente el problema con él, sigue estos pasos para abrir un caso.</p>
        </div>
      </div>
  </article>

  <article class="grupo-faqs">
    <div class="titulo-grupo">
      <h3>Venta</h3>
    </div>
      <div>
        <input type="checkbox" id="pregunta5" class="abrir-pregunta">
        <label for="pregunta5" class="pregunta">
          ¿Cómo vendo en Mandy? <span class="ion-plus"></span><span class="ion-minus"></span>
        </label>
        <div class="respuesta">
          <p>Para poder vender en Mandy tenes que tener un perfil de vendedor. Para esto podes entrar a Mi perfil, modificar perfil y te encontrarás con la opción de ser vendedor, una vez tildada te mostrará unos campos nuevos para completar tu perfil ¡Y listo! Ya podes vender en Mandy. </p>
        </div>
      </div>

      <div>
        <input type="checkbox" id="pregunta6" class="abrir-pregunta">
        <label for="pregunta6" class="pregunta">
          ¿Qué agrego un producto? <span class="ion-plus"></span><span class="ion-minus"></span>
        </label>
        <div class="respuesta">
          <p>Para agregar un producto y comenzar a venderlo, solo tenes que hacer click en el botón de crear producto que se encuentra en tu perfil, en la sección de mis productos.</p>
        </div>
      </div>

      <div>
        <input type="checkbox" id="pregunta7" class="abrir-pregunta">
        <label for="pregunta7" class="pregunta">
          ¿Qué puedo vender en Mandy? <span class="ion-plus"></span><span class="ion-minus"></span>
        </label>
        <div class="respuesta">
          <p>En Mandy poder vender cualquier articulo hecho a mano, original y de tu propia autoría. No aceptamos productos de terceros o copias. Cualquier irregularidad con estos puntos puede hacer que pierdas tu usuario en Mandy.</p>
        </div>
      </div>

  </article>

</div>
@endsection
