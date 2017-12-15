
var form = document.querySelector('.form-login-registro');
var input = form.elements;
var email = document.querySelector('.email');
var password = document.querySelector('.password');

var regexMail = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
var regexPass = /^[a-z0-9]+$/i;

email.addEventListener('blur', function(){
    var elObj = this;
    validarVacio(elObj, 'Completá tu e-mail');
    if (validarVacio(elObj, 'Completá tu e-mail')) {
      validarEmail(elObj, 'Usá el formato nombre@dominio.com');
    }
});

password.addEventListener('blur', function(){
    var elObj = this;
    validarVacio(elObj, 'Completá tu contraseña');
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

function validarEmail (obj, text) {
  var result = regexMail.test(obj.value);
  var error = obj.nextElementSibling;
  if (!result) {
    error.style.display = 'inline-block';
    error.style.borderTop = 'dotted #d10404 1px';
    error.innerHTML = text;
    var ion = document.createElement('span');
    ion.className = 'ion-close'
    ion.style.display = 'inline-block';
    error.appendChild(ion);
  } else {
    error.style.display = 'none';
 }
}
