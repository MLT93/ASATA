document.addEventListener('DOMContentLoaded', function() {
 const obras = [
     { id: 1, nombre: "Obra 1", imagen: "https://via.placeholder.com/50x50/123", precio: 100 },
     { id: 2, nombre: "Obra 2", imagen: "https://via.placeholder.com/50x50/321", precio: 200 },
     { id: 3, nombre: "Obra 3", imagen: "https://via.placeholder.com/50x50/331", precio: 300 },
     { id: 4, nombre: "Obra 4", imagen: "https://via.placeholder.com/50x50/121", precio: 400 },
     { id: 5, nombre: "Obra 5", imagen: "https://via.placeholder.com/50x50/111", precio: 500 },
     { id: 6, nombre: "Obra 6", imagen: "https://via.placeholder.com/50x50/761", precio: 600 },
     { id: 7, nombre: "Obra 7", imagen: "https://via.placeholder.com/50x50/441", precio: 700 },
 ];

 const galeriaContainer = document.querySelector('.galeria-container');
 const carritoContainer = document.querySelector('.carrito-container');
 const añadirCarritoBtn = document.getElementById('añadirCarritoBtn');

 let seleccionados = [];

 obras.forEach(obra => {
     const div = document.createElement('div');
     div.classList.add('obra');
     div.innerHTML = `
         <img src="${obra.imagen}" alt="${obra.nombre}" style="width:100%;max-width:300px;">
         <p>${obra.nombre} - $${obra.precio}</p>
         <label class="checkbox-container">
             <input type="checkbox" class="obra-checkbox" data-id="${obra.id}">
             <span class="checkmark"></span>
         </label>
     `;
     galeriaContainer.appendChild(div);
 });

 galeriaContainer.addEventListener('change', (e) => {
     if (e.target.classList.contains('obra-checkbox')) {
         const obraId = parseInt(e.target.dataset.id);
         if (e.target.checked) {
             seleccionados.push(obras.find(obra => obra.id === obraId));
         } else {
             seleccionados = seleccionados.filter(obra => obra.id !== obraId);
         }
         añadirCarritoBtn.disabled = seleccionados.length === 0;
     }
 });

 añadirCarritoBtn.addEventListener('click', () => {
     actualizarCarrito();
 });

 function actualizarCarrito() {
  carritoContainer.innerHTML = '<h2>Carrito</h2><br/><ul>';
  seleccionados.forEach(obra => {
      const elementoLista = document.createElement('li');
      elementoLista.innerHTML = `
          <img src="${obra.imagen}" alt="${obra.nombre}" style="width:30px; height:30px; margin-right: 10px; object-fit: cover;"><br>
          ${obra.nombre} - $${obra.precio}<br>
      `;
      carritoContainer.appendChild(elementoLista);
  });
  let total = seleccionados.reduce((acc, obra) => acc + obra.precio, 0);
  carritoContainer.innerHTML += `</ul><p>Total: $${total}</p>`;
}
});
