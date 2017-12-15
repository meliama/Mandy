
var form = document.querySelector('.form-login-registro');
var input = form.elements;
var nombre = document.querySelector('.name');
var surname = document.querySelector('.surname');
var username = document.querySelector('.username');
var pais = document.querySelector('.country');
var cbseller = document.querySelector('.cbseller');

var regexPass = /^[a-z0-9]+$/i;


nombre.addEventListener('blur', function(){
    var elObj = this;
    validarVacio(elObj, 'Completá tu nombre');
    if (validarVacio(elObj, 'Completá tu nombre')) {
      validarCantidadCaracteres(elObj, 'El nombre debe contener mínimo 2 caracteres',2);
    }
});

surname.addEventListener('blur', function(){
    var elObj = this;
    validarVacio(elObj, 'Completá tu apellido');
    if (validarVacio(elObj, 'Completá tu apellido')) {
      validarCantidadCaracteres(elObj, 'El apellido debe contener mínimo 2 caracteres',2);
    }
});

username.addEventListener('blur', function(){
    var elObj = this;
    validarVacio(elObj, 'Completá tu nombre de usuario');
    if (validarVacio(elObj, 'Completá tu nombre de usuario')) {
      validarCantidadCaracteres(elObj, 'El nombre de usuario debe contener mínimo 5 caracteres',5);
    }
});


pais.addEventListener('change', function(){
  console.log(pais.value);
  if (pais.value == 0) {
    var error = this.nextElementSibling;
    error.style.display = 'inline-block';
    error.style.borderTop = 'dotted #d10404 1px';
    error.innerHTML = 'Elegí un pais';
    var ion = document.createElement('span');
    ion.className = 'ion-close'
    ion.style.display = 'inline-block';
    error.appendChild(ion);
  } else {
    if(error) error.style.display = 'none';
  }
});

//FUNCIONES PARA VALIDACION

function validarVacio (obj, text) {
  var error = obj.nextElementSibling;
  if (obj.value.trim() === '') {
    error.style.display = 'inline-block';
    error.style.borderTop = 'dotted #d10404 1px';
    error.innerHTML = text;
    var ion = document.createElement('span');
    ion.className = 'ion-close'
    ion.style.display = 'inline-block';
    error.appendChild(ion);
  } else {
    error.style.display = 'none';
    return true;
 }
}

function validarCantidadCaracteres (obj, text,caracteres) {
  var error = obj.nextElementSibling;
  if (obj.value.length < caracteres) {
    error.style.display = 'inline-block';
    error.style.borderTop = 'dotted #d10404 1px';
    error.innerHTML = text;
    var ion = document.createElement('span');
    ion.className = 'ion-close'
    ion.style.display = 'inline-block';
    error.appendChild(ion);
  } else {
    error.style.display = 'none';
    return true;
 }
}



  function ajaxCall(url,callbackFunction){
  var myAjax = new XMLHttpRequest();

  myAjax.onreadystatechange = function () {

    if (this.readyState === 4 && this.status === 200) {
      //transformo un string en el objeto con parse()
      var rta = JSON.parse(this.responseText);
      console.log(rta.contenido);
      //a la fucion que se ejecuta cuando obtengo el contenido lo parseo
      //el callback se ejecuta cuando hago un cambio en pais o en ciudad.
      //Aunque primero se ejecuta cuando se ejecuta la pagina
      callbackFunction(rta.contenido);

    }

  };

  //Cuando usamos POST->
  //xmlhttp.setRequestHeader('Contenttype','application/xwwwformurlencoded');

  myAjax.open('GET',url);
  myAjax.send();
}
var urlPaises = 'http://pilote.techo.org/?do=api.getPaises';
var urlRegiones = 'http://pilote.techo.org/?do=api.getRegiones?idPais=';
var urlCiudades = 'http://pilote.techo.org/?do=api.getCiudades?idRegionLT=';


ajaxCall(urlPaises,getPaises);

function renderRegions(mostra) {
    var comboRegiones = document.getElementById('regiones');
if (mostra == true) {
  document.querySelector("#region-box").style.display = "block";
  document.querySelector("#city-box").style.display = "block";
} else {
  document.querySelector("#region-box").style.display = "none";
  document.querySelector("#city-box").style.display = "none";
}
if(comboRegiones.hasChildNodes()){
    comboRegiones.innerHTML='';
  }
var comboCiudades = document.getElementById('ciudades');
if(comboCiudades.hasChildNodes()){
    comboCiudades.innerHTML='';
  }
}

function renderRegionsOnChange() {
  // para onchange event
  console.log("en renderREgionsOnChange");
  console.log(this);
  idPais = this.value;

  ajaxCall(urlRegiones + idPais , getRegiones);

  if (idPais == "1") {
    renderRegions(true);
 }
  else
    renderRegions(false);
};

function getPaises(rta){
  var comboPaises = document.getElementById('paises');
  var country_code = document.getElementById('country_code').innerText;  // nuevo

  for (var i in rta) {
    var option = document.createElement('option');
        option.innerText = i;
        option.setAttribute('value',rta[i]);
        if ((country_code != null) && option.value == country_code) {  // nuevo
          option.selected = true;  // nuevo
          console.log("hola ", i);
          if( option.value == "1") {
            renderRegions(true);
            ajaxCall(urlRegiones + "1" , getRegiones);  //country_code
            //renderCities;
            var region_code = document.getElementById('region_code').innerText;
            ajaxCall(urlCiudades + region_code , getCiudades);  //country_code
          }
        }
        comboPaises.appendChild(option);
  }
  var country_text = comboPaises.options[comboPaises.selectedIndex].innerText;
  console.log ("eligido " + comboPaises.options[comboPaises.selectedIndex].value + ' '+ country_text);

  comboPaises.onchange = renderRegionsOnChange;

  }


//ajaxCall(urlRegiones,getRegiones);
//Regiones
function getRegiones(rta){
  console.log("en getRegiones");
  var comboRegiones = document.getElementById('regiones');
  var region_code = document.getElementById('region_code').innerText;

  var option = document.createElement('option');

	option.innerText = 'Elegí una provincia';
	option.value = 0;
	comboRegiones.appendChild(option);

  for (var i in rta) {
     var option = document.createElement('option');
     option.innerText = i;
     option.setAttribute('value',rta[i]);
     if ((region_code != null) && option.value == region_code) {
       option.selected = true;  // nuevo
       console.log ("eligio");
       console.log (option);   // nuevo
     }
     comboRegiones.appendChild(option);

  }
  comboRegiones.onchange =renderCities;
  function renderCities(){
      console.log("en renderCities");
       var idRegiones = this.value;
       ajaxCall(urlCiudades + idRegiones , getCiudades);

       var comboCiudades=document.getElementById('ciudades');
       if(comboCiudades.hasChildNodes()){
        comboCiudades.innerHTML='';
        // while (comboCiudades.childNodes.length >= 1) {
  			// 	comboCiudades.removeChild(comboCiudades.childNodes[0]);
  			//}
      }

  };
}

//ajaxCall(urlCiudades,getCiudades);
//Regiones
function getCiudades(rta){
  console.log("en getCiudades");
  var comboCiudades=document.getElementById('ciudades');
  var city_code = document.getElementById('city_code').innerText;

  var option = document.createElement('option');

	option.innerText = 'Elegí una ciudad';

	option.setAttribute('value', '0');

	comboCiudades.append(option);

  for (var i in rta) {
     var option = document.createElement('option');
     option.innerText = i;
     option.setAttribute('value',rta[i]);
     if ((city_code != null) && option.value == city_code) {  // nuevo
       option.selected = true;  // nuevo
       console.log ("eligio");
       console.log (option);   // nuevo
     }
     comboCiudades.appendChild(option);
     }
 }

 var sellerbox = document.querySelector('.sellerbox');

 cbseller.addEventListener('change', function(){
    //alert("HI you changed me, show seller fields");
    // var sellerBox = document.getElementById('seller-box');
    // var sellerbox = document.querySelector('.sellerbox');

    console.log('is seller?' . sellerbox);
    if (cbseller.value == "checked")
        sellerbox.style.display = 'none';
    else
      sellerbox.style.display = 'block';
 });

 console.log("sos vendedor? ")
 console.log( cbseller);
if (cbseller.value == "checked") {
  sellerbox.style.display = 'block';
}
else  {
  sellerbox.style.display = 'none';
}
