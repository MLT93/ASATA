const datosUsuarios = `[
    {
        "nombre":"Pedro",
        "apellido":"Perez",
        "edad":32,
        "direccion":{
            "ciudad":"Madrid",
            "calle" :"gran via",
            "numero":25,
            "piso"  :2,
            "puerta":"A"
        },
        "hobbies":[
            "esquiar",
            "nadar",
            "leer"
        ],
        "formacion" :[
            {
                "centro":"universidad Complutense",
                "titulo":"Grado de Periodismo"
            },
            {
                "centro":"Universidad de Granada",
                "titulo":"Master en investiganción periodistica"
            }
        ]
        
    },

    {
        "nombre":"Maria",
        "apellido":"Martinez",
        "edad":45,
        "direccion":{
            "ciudad":"Barcelona",
            "calle": "diagonal",
            "numero" : 10,
            "piso" : 2,
            "puerta": "derecha"

        },
        "hobies":[
            "ver peliculas"
        ],
        "formacion":[
            {
                "centro":"MIT",
                "titulo": "Fisico de particulas"
            }
        ]
    },

    {
        "nombre":"Pedro",
        "apellido":"Lopez",
        "edad":32,
        "direccion":{
            "ciudad":"Madrid",
            "calle" :"gran via",
            "numero":25,
            "piso"  :2,
            "puerta":"A"
        },
        "hobbies":[
            "esquiar",
            "nadar",
            "leer"
        ],
        "formacion" :[
            {
                "centro":"universidad Complutense",
                "titulo":"Grado de Periodismo"
            },
            {
                "centro":"Universidad de Granada",
                "titulo":"Master en investiganción periodistica"
            }
        ]
        
    }

]`

// console.log(datosUsuarios); //ES TIPO DE DATO STRING;
const usuarios = JSON.parse(datosUsuarios);
console.log(usuarios); //ES TIPO DE DATO JSON


// console.log(usuarios[0]);
// console.log(usuarios[0].nombre);
// console.log(usuarios[0].apellido);
// console.log(usuarios[0].direccion.calle);
// console.log(usuarios[0].hobbies[0]);

mostrasUsuariosPorConsola(usuarios);
buscaDirecciondeUsuario(usuarios, "Pedro","Lopez");


function mostrasUsuariosPorConsola(usuarios){

    for( var i=0; i<usuarios.length; i++){
        console.log(usuarios[i].nombre +" "+ usuarios[i].apellido);
    }
}


function buscaDirecciondeUsuario(usuarios, usuarioNombre, usuarioApellido){


    var usuariosFiltroNombre = usuarios.filter(element => element.nombre == usuarioNombre);
    var usuariosFiltrados = usuariosFiltroNombre.filter(element => element.apellido == usuarioApellido);

    // console.log(usuariosFiltrados);
    console.log(usuariosFiltrados[0].direccion);


}





