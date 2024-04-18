// RECOGER LA INFORMACIÓN QUE ENVIA EL USUARIO A TRAVES DEL FORMULARIO
document.getElementById("formulario").addEventListener("submit", function(event) {

    event.preventDefault();

    const nombre    = document.getElementById("nombre").value;
    const apellido  = document.getElementById("apellido").value;
    const edad      = document.getElementById("edad").value;
    const email     = document.getElementById("email").value;
    const password  = document.getElementById("password").value;

    const formPrimaria  = document.getElementById("primaria").checked;  //true o false
    const formESO       = document.getElementById("eso").checked;       //true o false
    const formBachiller = document.getElementById("bachiller").checked; //true o false
    const formFP        = document.getElementById("fp").checked;        //true o false

    const cursos     = document.getElementsByName("curso");
    const centro     = document.getElementById("centro").value;

    // console.log(nombre);
    // console.log(apellido);
    // console.log(edad);
    // console.log(email);
    // console.log(password);
    // console.log(cursos);
    // console.log(centro);

    var formaciones = [];
    formaciones.push(formPrimaria);
    formaciones.push(formESO);
    formaciones.push(formBachiller);
    formaciones.push(formFP);

    var curso = [];
    curso.push(cursos[0].checked);
    curso.push(cursos[1].checked);
    curso.push(cursos[2].checked);


    // console.log(formaciones);

    const alumno = {
        nombre: nombre,
        apellido: apellido,
        edad: edad,
        email: email,
        password: password,
        formacion: formaciones,
        curso: curso,
        centro: centro
    }

    console.log(alumno);

    comprobarInfo(alumno);

});


function comprobarInfo(usuario){

    // COMPROBAR EL EMAIL
    var expRegMail = /[\w._%+-]+@[\w.-]+\.[a-zA-Z]{2,4}/;
    if(  !expRegMail.exec(usuario.email)  ){

        alert("El email es incorrecto. Escribelo bien.");
        console.log("El email es incorrecto. Escribelo bien.");

    }

    // COMPROBAR FORMACIÓN
    console.log(usuario.formacion);  //esto es un array 

    const formPrimaria = usuario.formacion[0]; //esto me devuelve true o false de PRIMARIA
    const formESO      = usuario.formacion[1]; //esto me devuelve true o false de ESO
    const formBachiller= usuario.formacion[2]; //esto me devuelve true o false de BACHILLER
    const formFP       = usuario.formacion[3]; //esto me devuelve true o false de FP

    if(formFP || formBachiller){
        if(formPrimaria && formESO){
            console.log("Formación OK");
        }else{
            alert("Deberias marcar Primari y ESO");
        }
    }


    //COMPROBAR EDAD
    if(usuario.edad < 18){
        alert("Aún no eres mayor de edad. No te puedes matricular.");
    }

    //COMPROBAR CENTRO
    if(usuario.centro == "gijon" || usuario.centro == "oviedo"){

        const notas = document.getElementById("notas"); 
        const oferta = document.createElement("p");
        oferta.textContent = "Oferta en los centros de Gijón y Oviedo durante un mes." ;
        notas.appendChild(oferta);

    }

    //COMPROBAR LONGITUD CAMPOS TEXTO <30
    if(usuario.nombre.length >30 ){

        alert("El Nombre del usuarioe s demasiado largo.");
        document.getElementById("nombre").focus();

    }

    if(usuario.apellido.length >30 ){

        alert("El Apelido del usuarioe s demasiado largo.");
        document.getElementById("apellido").focus();

    }



}
