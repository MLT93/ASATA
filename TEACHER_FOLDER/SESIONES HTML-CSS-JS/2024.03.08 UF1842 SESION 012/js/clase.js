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

for(i=0; i < clase.length ; i++){
    
    clase[i].unshift(i+1);

    var alum = document.createElement("p");
    alum.innerHTML = "El alumno con id: " + (i+1) + " es " + clase[i][1] + " y tiene " + clase[i][2] + " años.";
    
    document.body.appendChild(alum);

}

console.log(clase);


for(i = clase.length-1; i >= 0 ; i--){
    

    var alum = document.createElement("p");
    alum.innerHTML = "El alumno con id: " + (i+1) + " es " + clase[i][1] + " y tiene " + clase[i][2] + " años.";
    
    document.body.appendChild(alum);

}


