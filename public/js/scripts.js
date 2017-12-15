

var form = document.querySelector('.form-login-registro');
var input = form.elements;
//for (var i = 0; i < input.length; i++) {
//
//   input[i].addEventListener('blur', function(){
//
//     if (this.value.trim() === '') {
//       var error = this.nextElementSibling;
//
//       this.style.borderTop = 'dotted #d10404 1px';
//       error.innerText = 'Completá tu ' + this.placeholder;
//     }
//   });
//
//
// }
var name = form.name;
var surname = form.surname;
var email = form.email;
var password = form.password;

name.addEventListener('blur', function(){
  if(this.value.trim()===''){
    var error = this.nextElementSibling.nextElementSibling;
    error.innerText = 'Completá tu ';

    dd(error);

  })
})
