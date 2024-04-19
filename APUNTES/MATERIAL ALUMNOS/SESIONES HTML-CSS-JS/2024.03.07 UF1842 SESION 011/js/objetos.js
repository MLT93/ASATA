

var miboton = document.getElementById('boton1');

miboton.style.width ="200px";
miboton.style.height ="30px";


var mitexto = document.getElementById('texto');

mitexto.style.width ="100px";

// var engine ={
//     tipo:"gasolina",
// }


// var coche ={
//     tipo:"Seat",
//     modelo:"600",
//     potencia:50,
//     color:"verde",
//     motor: engine,
// }

// console.log(coche.tipo);
// console.log(coche.modelo);
// console.log(coche.potencia);
// console.log(coche.motor.tipo);






var plantaSegunda ={
    npuertas:3,
    nplanta:2,
    ventana:true,
}

var edificioPrincipal ={
    ciudad:"Oviedo",
    altura:600,
    calle:"gran vía",
    nViviendas:50,
    piscina: false,
    planta: plantaSegunda,
}


console.log(plantaSegunda);
console.log(edificioPrincipal.ciudad);
console.log(edificioPrincipal.planta);
console.log(edificioPrincipal.planta.ventana);