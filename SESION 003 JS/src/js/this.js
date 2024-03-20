document.getElementById("formulario").addEventListener("submit", (event) => {
  event.preventDefault();

  const nombre = document.getElementById("nombre").value;
  const pais = document.getElementById("pais").value;

  const persona = {
    nombre: nombre,
    pais: pais,
    presentation: function() {
      return `Hola! Mi nombre es ${this.nombre} y soy de ${this.pais}`;
    },
  };

  const present = document.getElementById("presentation");
  present.innerText = persona.presentation();
});
