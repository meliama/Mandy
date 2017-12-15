
var form = document.querySelector('.form-login-registro');
var input = form.elements;
var nombre = document.querySelector('.name');
var surname = document.querySelector('.surname');
var username = document.querySelector('.username');
var email = document.querySelector('.email');
var password = document.querySelector('.password');
var repass = document.querySelector('.repass');

var regexMail = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
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
    if (validarVacio(elObj, 'Completá tu contraseña')) {
      validarCantidadCaracteres(elObj, 'La contraseña debe contener mínimo 8 caracteres',8);
      if (validarCantidadCaracteres(elObj, 'La contraseña debe contener mínimo 8 caracteres',8)) {
        validarPass (elObj, 'El campo debe contener solo letras o números');
      }
    }
});

repass.addEventListener('blur', function(){
    var elObj = this;
    validarVacio(elObj, 'Completá tu confirmación de contraseña');
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
    ion.style.display = 'inline-block'
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

function validarPass (obj, text) {
  var result = regexPass.test(obj.value);
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
