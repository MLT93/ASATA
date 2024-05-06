document.addEventListener('DOMContentLoaded', function() {
 // Validación de formulario de login
 const formularioLogin = document.getElementById('formularioLogin');
 if (formularioLogin) {
  formularioLogin.addEventListener('submit', function(e) {

   e.preventDefault(); // Evita el envío estándar del formulario

   // Ejemplo de validación de campos
   const nombreusuario = document.getElementById('nombreusuario').value.trim();
   const password = document.getElementById('password').value.trim();

   var oknombre = validarCampo(nombreusuario);
   var okpassword = validarContraseña(password) ;

   console.log(nombreusuario)
   console.log(password)
   console.log(oknombre)
   console.log(okpassword)


   // Si llega hasta aquí, todos los campos son correctos
   if(oknombre && okpassword){

    alert('Formulario enviado correctamente.');
   }
  });
 }

 // Validación de formulario de comentarios
 const formularioComentarios = document.getElementById('formularioComentarios');
 if (formularioComentarios) {
     formularioComentarios.addEventListener('submit', function(e) {

         e.preventDefault(); // Evita el envío estándar del formulario
         const comentario = document.getElementById('comentario').value.trim();
         if (!comentario) {
             alert('Por favor, añade un comentario.');
             document.getElementById('comentario').focus();
             return;
         }

         // Lógica para añadir el comentario a la lista
         const listaComentarios = document.getElementById('listaComentarios');
         const nuevoComentario = document.createElement('li');
         nuevoComentario.textContent = comentario;
         listaComentarios.appendChild(nuevoComentario);
         document.getElementById('comentario').value = ''; // Limpiar el campo de texto
     });
 }
});


function validarCampo(campo) {

 if (!campo) { 
  alert('El usuario esta vacio'); 
  document.getElementById('nombreusuario').focus();
  return false;
 }
 return true;
}


function validarContraseña(password) {
 const longitudMinima = 8;
 const tieneNumero = /\d/;
 const tieneMayuscula = /[A-Z]/;
 const tieneMinuscula = /[a-z]/;
 const tieneCaracterEspecial = /[\W_]/;

 if (password.length < longitudMinima) {
     alert('La contraseña debe tener al menos 8 caracteres.');
     return false;
 }
 if (!tieneNumero.test(password)) {
     alert('La contraseña debe incluir al menos un número.');
     return false;
 }
 if (!tieneMayuscula.test(password)) {
     alert('La contraseña debe incluir al menos una letra mayúscula.');
     return false;
 }
 if (!tieneMinuscula.test(password)) {
     alert('La contraseña debe incluir al menos una letra minúscula.');
     return false;
 }
 if (!tieneCaracterEspecial.test(password)) {
     alert('La contraseña debe incluir al menos un caracter especial.');
     return false;
 }

 // Si la contraseña pasa todas las comprobaciones
 return true;
}