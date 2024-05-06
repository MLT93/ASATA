// Ajuste del tamaño del texto y el modo de alto contraste
document.addEventListener('DOMContentLoaded', function() {
 const body = document.body;
 const increaseTextBtn = document.getElementById('increaseText');
 const decreaseTextBtn = document.getElementById('decreaseText');
 const highContrastBtn = document.getElementById('highContrast');
 const resetBtn = document.getElementById('reset');
    // Establece un tamaño inicial de fuente si no está ya definido
    if (!document.body.getAttribute('data-font-size')) {
     let initialFontSize = 16; // Establece tu tamaño inicial deseado aquí
     document.body.style.fontSize = initialFontSize + 'px';
     document.body.setAttribute('data-font-size', initialFontSize.toString());
 }


 // Función para cambiar el tamaño del texto
 function changeFontSize(change) {
    // Suponiendo que el tamaño inicial de la fuente se ha establecido en algún lugar
    // en el atributo data-font-size del elemento body
    let currentSize = parseFloat(document.body.getAttribute('data-font-size') || "16"); // "16" es un valor predeterminado

    // Ajustar dentro de límites razonables para evitar que el texto sea demasiado grande o pequeño
    if (currentSize + change >= 12 && currentSize + change <= 24) {
        document.body.style.fontSize = (currentSize + change) + 'px';
        // Actualiza el atributo data-font-size con el nuevo tamaño para mantener la coherencia
        document.body.setAttribute('data-font-size', (currentSize + change).toString());
    }
 }

 // Función para alternar el modo de alto contraste
 function toggleHighContrast() {
     body.classList.toggle('high-contrast');
 }

 // Función para restablecer los ajustes de accesibilidad a los valores predeterminados
 function resetAccessibilitySettings() {
     body.style.fontSize = ''; // Restablecer el tamaño del texto al valor predeterminado
     body.classList.remove('high-contrast'); // Desactivar el modo de alto contraste
 }

 // Event listeners para los botones de control
 increaseTextBtn.addEventListener('click', function() {
     changeFontSize(2); // Incrementar el tamaño del texto en 2px
 });

 decreaseTextBtn.addEventListener('click', function() {
     changeFontSize(-2); // Disminuir el tamaño del texto en 2px
 });

 highContrastBtn.addEventListener('click', toggleHighContrast);
 resetBtn.addEventListener('click', resetAccessibilitySettings);
});
