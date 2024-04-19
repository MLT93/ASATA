var input = 
`[
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
]`

var inputJSON = JSON.parse(input);
console.log(inputJSON);

var edades =[];
var nombres = [];


for(var i=0; i<inputJSON.length ; i++){

    edades.push(inputJSON[i].edad);
    nombres.push(inputJSON[i].nombre);


}


new Vue({

    el:"#vm",
    data: {
        nombresUsuarios: nombres,
        edadesUsuarios: edades,

    },
})