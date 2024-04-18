
// for (var i=0; i<10 ; i++ ){

//     console.log(i);

// }


// var diasemana = [
//     "lunes",
//     "martes",
//     "miercoles",
//     "jueves",
//     "viernes",
//     "sabado",
//     "domingo"
// ]



// for(var indice = 0; indice < diasemana.length; indice++  ){


//     console.log( diasemana[indice]);

// }


var alumno1 = ["Antonio", 33];
var alumno2 = ["Antonio", 34];
var alumno3 = ["Antonio", 35];
var alumno4 = ["Antonio", 36];
var alumno5 = ["Antonio", 37];

var clase = [];


clase[0]=alumno1;
clase[1]=alumno2;
clase[2]=alumno3;
clase[3]=alumno4;
clase[4]=alumno5;


console.log(clase);


var clase2 = [];

clase2.push(alumno1);
clase2.push(alumno2);
clase2.push(alumno3);
clase2.push(alumno4);
clase2.push(alumno5);


console.log(clase2);




for(i=0; i < clase.length ; i++){

    clase[i].unshift(i+1);
    console.log(clase[i]);
    
    
}

console.log(clase);