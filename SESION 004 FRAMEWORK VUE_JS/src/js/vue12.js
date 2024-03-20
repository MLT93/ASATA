var input = `
[
    {
        "nombre": "Ana López",
        "edad": 25,
        "correoElectronico": "ana.lopez@email.com"
    },
    {
        "nombre": "Roberto Morales",
        "edad": 32,
        "correoElectronico": "roberto.morales@email.com"
    }
]
`;

var inputParsed = JSON.parse(input);

let nombres = [];
let edades = [];
inputParsed.map((e) => {
  nombres.push(e.nombre);
  edades.push(e.edad);
});
console.log(edades);

// Obtener edad

new Vue({
  el: "#vm",
  data: () => ({
    nombresUsuarios: nombres,
    edadesUsuarios: edades,
  }),
});
