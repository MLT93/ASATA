


document.addEventListener('DOMContentLoaded', () => {
 document.getElementById('formFecha').addEventListener('submit', (event) => {
     event.preventDefault();

     const dia = parseInt(document.getElementById('dia').value, 10);
     const mes = parseInt(document.getElementById('mes').value, 10) - 1;
     const anio = parseInt(document.getElementById('anio').value, 10);

     const fecha = new Date();
     fecha.setFullYear(anio, mes, dia);
     fecha.setHours(0, 0, 0, 0);

     const esBisiesto = (anio % 4 === 0 && (anio % 100 !== 0 || anio % 400 === 0));
     const opciones = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
     const fechaFormateada = fecha.toLocaleDateString('es-ES', opciones);

     // Lógica de validación de la fecha
     if (fecha.getDate() !== dia || fecha.getMonth() !== mes || fecha.getFullYear() !== anio) {
         document.getElementById('resultadoFechaCorrecta').textContent = 'La fecha introducida no es válida.';
         document.getElementById('resultadoBisiesto').textContent = '';
         document.getElementById('resultadoFechaCompleta').textContent = '';
     } else {
         document.getElementById('resultadoFechaCorrecta').textContent = 'La fecha es correcta.';
         document.getElementById('resultadoBisiesto').textContent = esBisiesto ? 'El año es bisiesto.' : 'El año no es bisiesto.';
         document.getElementById('resultadoFechaCompleta').textContent = `Fecha completa: ${fechaFormateada}`;
     }
 });
});
