

const lienzoNuevo = document.getElementById("lienzoNuevo");
const ctx = lienzoNuevo.getContext("2d");

//EJES. esto no era parte del ejercicio pero los dibujo a modo de referencia

ctx.beginPath();//comienzo a dibujar los ejes

//me desplazo al punto (0,250) para empezar a dibujar desde ahí
ctx.moveTo(0, 250);
//desde (0,250) trazo una linea al punto (500,250)
ctx.lineTo(500,250);

//me desplazo al punto (250,0) para continuar dibujando desde ahí. EL moveTo sería como "levantar el lapiz del papel", si no lo hago haria una linea en cada instrucción.
ctx.moveTo(250, 0);
//desde (250,0) trazo una linea al punto (250,500)
ctx.lineTo(250,500);

// //DIBUJO LA LINEA PARA QUE SE VISUALIZE
// //HASTA QUE NO aplico stroke la linea est ainternamente , pero no se sibuja. IMPORTANTE
ctx.stroke();



//CIRCULO ROJO
ctx.beginPath();//comienzo a dibujar el circulo rojo
//me situo en el punto (350,300) y dibujo una circunferencia completa es decir de 0 rad a 2*pi rad
ctx.arc(350, 300, 30, 0, 2*Math.PI, true); 
//selecciono estilo de relleno rojo
ctx.fillStyle="red";
//PINTO EL RELLENO DEL ESTILO SELECCIONADO PARA QUE SE VISUALIZE
ctx.fill();


// //SECTOR DE CIRCULO AMARILLO
ctx.beginPath();//comienzo a dibujar el circulo amarillo
// //CALCULO PREVIAMENTE TODOS LOS ANGULOS Y FUNCIONES TRIGONOMETRICAS QUE VOY A NECESITAR

//para pasar los ángulos a radianes
const ang30  = (30*Math.PI)/180
const ang170 = (170*Math.PI)/180


const sen30  = Math.sin(ang30);
const cos30  = Math.cos(ang30);
const sen170 = Math.sin(ang170);
const cos170 = Math.cos(ang170);


//me desplazo al punto (250,250) para empezar a dibujar desde ahí
ctx.moveTo(250, 250);
//desde (250,250) trazo una linea al punto 250+(100*cos30), 250-(100*sen30)
ctx.lineTo(250+(100*cos30), 250-(100*sen30));
//"levanto el lapiz" de nuevo al punto (250,250)
ctx.moveTo(250, 250);
//desde (250,250) trazo una linea al punto 250+(100*cos170), 250-(100*sen170)
ctx.lineTo(250+(100*cos170), 250-(100*sen170));
//"levanto el lapiz" de nuevo al punto (250,250)
ctx.moveTo(250, 250);
// dibujo el arco de circunferencia
ctx.arc (250, 250, 100, -ang30,-ang170, true);
//DIBUJO LAS LINEAS PARA QUE SE VISUALIZEN
ctx.stroke();
// //selecciono estilo de relleno color beige
ctx.fillStyle="rgba(245,205,125,1)";
// //PINTO EL RELLENO DEL ESTILO SELECCIONADO PARA QUE SE VISUALIZE
ctx.fill();