var alumno1 = ["Antonio", 33];
var alumno2 = ["Pedro", 34];
var alumno3 = ["Rafael", 60];
var alumno4 = ["Lucas", 18];
var alumno5 = ["Pedro", 45];

var clase = [];
clase[0]=alumno1;
clase[1]=alumno2;
clase[2]=alumno3;
clase[3]=alumno4;
clase[4]=alumno5;


var aux = 0;
while(aux <5 ){


clase[aux].unshift(aux+1);

var alum = document.createElement("p");
alum.innerHTML = "El alumno con id: " + (aux+1) + " es " + clase[aux][1] + " y tiene " + clase[aux][2] + " años.";

document.body.appendChild(alum);

aux++;

}



