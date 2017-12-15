var country_code = document.getElementById('country_code').innerText;
var country_text = document.getElementById('country_text');
var region_code = document.getElementById('region_code').innerText;
var region_text = document.getElementById('region_text');
var city_code = document.getElementById('city_code').innerText;
var city_text = document.getElementById('city_text');


//
// var i;
// function switch_style ( title )
// {
// You may use this script on your site free of charge provided
// you do not remove this notice or the URL below. Script from
// https://www.thesitewizard.com/javascripts/change-style-sheets.shtml
//   var i, link_tag ;
//   for (i = 0; i < themes.length ; i++ ) {
//     if ((themes[i].rel.indexOf( "stylesheet" ) != -1) &&
//       themes[i].title) {
//       themes[i].disabled = true ;
//       console.log('JEJEJE');
//       if (themes[i].title == title) {
//         console.log('JOJOJO');
//         themes[i].disabled = false ;
//       }
//     }
//   }
// }

function openTab(nombre) {
    var i;
    var x = document.getElementsByClassName("info-container");
    console.log(x);
    for (i = 0; i < x.length; i++) {
       x[i].style.display = "none";
    }
    document.getElementById(nombre).style.display = "block";
}




function changeTheme(url){
  var theme = document.getElementsByClassName('theme');
  console.log(theme);
  theme[0].setAttribute("href", url);
};

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


function getPaises(rta){
  console.log("en getPaises " + country_code);

  for (var name in rta) {
     if ((country_code != null) && rta[name] == country_code) {
       console.log(country_text);
       country_text.innerText = name;
       console.log ("eligido");
       console.log (name + "  " + rta[name]);
     }
    }
  }

//ajaxCall(urlRegiones,getRegiones);
//Regiones
function getRegiones(rta2){
  console.log("en getRegiones " + region_code);
  // console.log(rta2);
  for (var name in rta2) {
     if ((region_code != null) && rta2[name] == region_code) {
       region_text.innerText = name;
       //region_text.setAttribute(innerText, name);
       console.log ("eligido");
       console.log (name);

     }

    }
  }

function getCiudades(rta3){
  console.log("en getCiudades " + city_code);
  console.log(rta3);
  for (var name in rta3) {
     if ((city_code != null) && rta3[name] == city_code) {
       city_text.innerText = name;
       console.log ("eligido");
       console.log (name + rta3[name]);
     }

    }
 }
 console.log("hola ajaxcall");
 ajaxCall(urlPaises, getPaises);
 ajaxCall(urlRegiones + country_code, getRegiones);
 ajaxCall(urlCiudades + region_code, getCiudades);
