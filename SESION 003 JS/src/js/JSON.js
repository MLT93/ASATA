const dataUsuarios = `[
    {
      "nombre": "Marcos",
      "apellidos": "Lambir",
      "edad": "31",
      "direccion": {
        "ciudad": "Madrid",
        "calle": "Gran Vía",
        "numero": "25",
        "piso": "Segundo",
        "puerta": "A"
      },
      "hobbies": ["esquiar", "nadar", "leer"],
      "formacion": [
        {
          "centro": "Universidad Computense",
          "titulo": "Periodismo"
        },
        {
          "centro": "Universidad de Granada",
          "titulo": "Master en investigación periodística"
        }
      ]
    },
    {
      "nombre": "María",
      "apellidos": "Martinez",
      "edad": "21",
      "direccion": {
        "ciudad": "Barcelona",
        "calle": "La diagonal",
        "numero": "45",
        "piso": "Tercero",
        "puerta": "J"
      },
      "hobbies": ["bailar", "netflix"],
      "formacion": [
        {
          "centro": "MIT",
          "titulo": "Físico de partículas"
        }
      ]
    },
    {
      "nombre": "Juan",
      "apellidos": "Pérez",
      "edad": "48",
      "direccion": {
        "ciudad": "Gijón",
        "calle": "Martinez Primero",
        "numero": "3",
        "piso": "Bajo",
        "puerta": "dcha"
      },
      "hobbies": ["salir de fiesta", "paddel", "lucha libre"],
      "formacion": [
        {
          "centro": "",
          "titulo": "Periodismo"
        },
        {
          "centro": "Universidad de Granada",
          "titulo": "Master en investigación periodística"
        }
      ]
    }
  ]
`;

console.log(dataUsuarios);
// transforma JSON a un elemento iterable (Obj o Array según la estrucutra del mismo JSON)
const parseJSON = JSON.parse(dataUsuarios);
console.log(parseJSON);
let nombre_apellido = parseJSON.map((e) => {
  let nombreCompleto = `Nombre: ${e.nombre.toLocaleUpperCase()}, Apellidos: ${e.apellidos.toLocaleUpperCase()}`;
  return nombreCompleto;
});
console.log(nombre_apellido);

// SIEMPRE poner una variable afuera de la función para guardar el `output` de la misma, y poderla utilizar afuera de ella (`scope` global)
let directionByUserFinded = "";
const buscaDireccionUsuario = (paramsNombre, paramsApellidos) => {
  parseJSON.find((e) => {
    // SIEMPRE utilizar una variable para guardar la información de un Operador Ternario (Ternary Operator) y poder utilizar esa información afuera de su definición
    let result = "";
    e.nombre === paramsNombre && e.apellidos === paramsApellidos
      ? (result = e.direccion)
      : (result = "El ususario no tiene dirección");
    // Guardo el resultado en la variable que está fuera de la función para poderla utilizar en un `scope` global
    directionByUserFinded = result;
    // Si no emito el `output` con un `return`, no puedo guardar la información
    return result;
  });
  console.log(directionByUserFinded);
};
buscaDireccionUsuario("Marcos", "Lambir");

const buscarDireccionUsuario2 = (paramsArray, paramsUser, paramsSurname) => {
  var ususariosFiltroNombre = paramsArray.filter(
    (e) => e.nombre === e.paramsUser
  );
  var ususariosFiltradosTot = ususariosFiltroNombre.filter(
    (e) => e.apellidos === e.paramsSurname
  );

  console.log(ususariosFiltradosTot[0].direccion);
};

const dameUsuarioYHobby = () => {
  let usuarioYHobby = parseJSON.map((e) => {
    let userHobby = `El ususario ${e.nombre.toLocaleUpperCase()} tiene el hobby: ${e.hobbies
      .join(", ")
      .toLocaleUpperCase()}`;
    return userHobby;
  });
  console.log(usuarioYHobby);
};
dameUsuarioYHobby();
