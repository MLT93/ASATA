// Este script mejora la accesibilidad mediante la validación del formulario antes de su envío.
document.getElementById('enviar').addEventListener('click', function() {

 document.getElementById('registro').addEventListener('submit', function(e) {
  e.preventDefault(); // Prevenir el envío estándar

  // Validaciones
  if (!validarNombre()) return;
  if (!validarEmail()) return;
  if (!validarContrasena()) return;
  if (!validarConfirmacionContrasena()) return;
  if (!validarGenero()) return;
  if (!validarTerminosYCondiciones()) return;

  // Si todas las validaciones pasan
  alert('Formulario enviado correctamente.');
  // Aquí iría la lógica para enviar el formulario (e.g., una solicitud fetch a un servidor)
 });

 function validarNombre() {
   const nombre = document.getElementById('nombre').value.trim();
   if (nombre === '') {
       alert('El campo de nombre no puede estar vacío.');
       document.getElementById('nombre').focus();
       return false;
   }
   return true;
 }

 function validarEmail() {
   const email = document.getElementById('email').value.trim();
   const regexEmail = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
   if (!regexEmail.test(email)) {
       alert('Por favor, introduce un correo electrónico válido.');
       document.getElementById('email').focus();
       return false;
   }
   return true;
 }

 function validarContrasena() {
   const password = document.getElementById('password').value;
   const condiciones = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*\W).{8,}$/;
   if (!condiciones.test(password)) {
       alert('La contrasena no cumple con los requisitos mínimos.');
       document.getElementById('password').focus();
       return false;
   }
   return true;
 }

 function validarConfirmacionContrasena() {
   const password = document.getElementById('password').value;
   const confirmacion = document.getElementById('confirm_password').value;
   if (password !== confirmacion) {
       alert('Las contrasenas no coinciden.');
       document.getElementById('confirm_password').focus();
       return false;
   }
   return true;
 }

 function validarGenero() {
   const genero = document.getElementById('gender').value;
   if (genero === '') {
       alert('Por favor, selecciona un genero.');
       document.getElementById('gender').focus();
       return false;
   }
   return true;
 }

 function validarTerminosYCondiciones() {
   const terms = document.getElementById('terms').checked;
   if (!terms) {
       alert('Debes aceptar los terminos y condiciones para continuar.');
       document.getElementById('terms').focus();
       return false;
   }
   return true;
 }

});
