
// RECOGER LA INFORMACIÓN QUE ENVIA EL USUARIO A TRAVES DEL FORMULARIO
document.getElementById("formulario").addEventListener("submit", function(event) {
    
    event.preventDefault();

    const nombre = document.getElementById("nombre").value;
    const precio = parseFloat(document.getElementById("precio").value);
    const colores = document.getElementById("colores").value.split(",").map(color => color.trim());
    const cantidad = parseInt( document.getElementById("cantidad").value );

    //El objeto donde inserto mis productos que agrago al almacen
    const producto ={
        nombre: nombre,
        precio: precio,
        coloresDisponibles: colores,
        cantidadDisponible: cantidad,
    }

    mostrarInformacion(producto);
});



function mostrarInformacion(producto){

    const contenedor = document.getElementById("productos"); 

    // creo etiqueta para mi producto y le asigno la clase "producto"
    const contProducto = document.createElement("div");
    contProducto.classList.add("producto");



    // creo etiqueta para el nombre de mi producto y le asigno la clase "nombre"
    const nombreElemento = document.createElement("p");
    nombreElemento.classList.add("nombre");
    nombreElemento.textContent = "Nombre: " + producto.nombre;

    // creo etiqueta para el precio de mi producto y le asigno la clase "precio"
    const precioElemento = document.createElement("p");
    precioElemento.classList.add("precio");
    precioElemento.textContent = "Precio: " + producto.precio;

    // creo etiqueta para los colores de mi producto y le asigno la clase "colores"
    const coloresElemento = document.createElement("p");
    coloresElemento.classList.add("colores");
    coloresElemento.textContent = "Colores Disponibles: " + producto.coloresDisponibles.join(", ");


    // creo etiqueta para la cantidad de mi producto y le asigno la clase "cantidad"
    const cantidadElemento = document.createElement("p");
    cantidadElemento.classList.add("cantidad");
    cantidadElemento.textContent = "Cantidad Disponible: " +producto.cantidadDisponible;


    //Situar los elementos creados en mi HTML
    contProducto.appendChild(nombreElemento);
    contProducto.appendChild(precioElemento);
    contProducto.appendChild(coloresElemento);
    contProducto.appendChild(cantidadElemento);

    contenedor.appendChild(contProducto);


}
