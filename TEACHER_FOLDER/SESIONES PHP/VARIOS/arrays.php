<?php

// $usuarios = array("Antonio", "Pedro", "Lucia", "Juan");
// print_r($usuarios);
// echo "<br/>";

// //si añado un indice que no existe lo incluye en el array aunque se salte otros indices
// $usuarios[5] = "Miguel";
// $usuarios[27]="Rosa";
// print_r($usuarios);
// echo "<br/>";

// $usuarios[2] = "Francisco";
// print_r($usuarios);
// echo "<br/>";


// //elimino el elemento con ese indice del array
// unset($usuarios[2]);
// print_r($usuarios);
// echo "<br/>";

// //si quiero mostrar por pantalla un array necesito "print_r" pero si quiero mostras un dato booleano, string o númerico puedo usar un echo.

// //ejercicio 10-1
// $semana = array ("lunes","martes","miercoles","jueves","viernes","sabado","domingo");


// echo $semana[0];
// echo "<br/>";
// echo $semana[6];
// echo "<br/>";

// //ejercicio 10-2

// $mes = [
// 1,2,3,4,5,6,7,8,9,10,
// 1,2,3,4,5,6,7,8,9,10,
// 1,2,3,4,5,6,7,8,9,10
// ];

// $suma = 0;
// $promedio;

// for($i=0; $i<count($mes); $i++){
//     $suma+=$mes[$i];
//     //$suma = $suma +$mes[$i];
// }
// $promedio = $suma/count($mes);

// echo $promedio;
// echo "<br/>";

// //array asociativos
// $notas = [];

// $notas["Juan"] = 6;
// $notas["Pedro"] = 5;
// $notas["Antonio"] = 9;

// print_r($notas);
// echo "<br/>";
// echo $notas["Juan"]; 
// echo "<br/>";


// //ejercicio 10-4
// $contraseñas = [];
// $contraseñas["Juan"]="1234";
// $contraseñas["Miguel"]="1111";
// $contraseñas["Luis"]="1122";
// $contraseñas["Jose"]="2211";
// $contraseñas["Rúben"]="1211";
// echo $contraseñas["Juan"];

// //matriz Bidimensional = array de arrays
// $personas = array(
// array(
//     "nombre"=>"Juan",//clave (key) => valor (value)
//     "apellido1"=>"Martinez",
//     "apellido2"=>"Lopez",
// ),
// array(
//     "nombre"=>"Ana",//clave (key) => valor (value)
//     "apellido1"=>"Lopez",
//     "apellido2"=>"Lopez"
// ),
// );

// echo "<br/>";
// echo $personas[0]["apellido2"];


// echo "<br/>";
// //sintaxis para ARRAY CON INDICES NUMERICOS
// foreach($mes as $valor){
//     echo $valor."<br/>";
// }


// //SINTAXIS PARA ARRAY ASOCIATIVO;
// //recorro el array bidimensional (matriz) $personas
// foreach($personas as $indice => $valor){//recorre array de indices númericos
//     print_r($valor); echo "<br/>";

//     foreach($valor as $clave => $v){//recorre array asociativo
//         echo $clave." - ". $v."<br/>";
//     }
// }

// //ejercicio 10-5
// $notas = [1,2,5,6,8,9,5,7,9,9];


// $suma2 = 0;
// $promedio2;
// $evaluacion="";

// foreach($notas as $clave =>$valor){
//     $suma2+=$valor;//1a opcion

//     if($valor<5){
//         echo "suspenso";
//     }elseif($valor<7){
//         echo "aprobado";
//     }elseif($valor<9){
//         echo "notable";
//     }else{
//         echo "sobresaliente";
//     }
// }

// $promedio2 = $suma2/count($notas);
// echo $promedio2;

// echo "<br/>";
// //ejercicio  10-6 
// $agenda= [
// ["nombre"=>"Pedro","tel"=>"555-5555", "contacto"=>"pariente"],


// ["nombre"=>"Juan","tel"=>"566-5555", "contacto"=>"pariente"],["nombre"=>"Ana","tel"=>"555-5555", "contacto"=>"trabajo"]

// ];

// foreach($agenda as $indice => $valor){
//     foreach($valor as $clave => $v){
//         echo "$clave: $v, ";

//     }
//     echo "<br/>";
// }

//METODOS ARRAYS

// //PUSH para meter elementos al final el array
// //TRANSFORMA ARRAY
// $frutas = ["platano", "fresa", "naranaja"];
// array_push($frutas, "cerezas", "limon");
// print_r($frutas);
// echo "<br/>";

// //POP obtengo el ultimo valor del array;
// //TRANSFORMA ARRAY
// $nombres = ["Alice", "Bob", "Charlie"];
// $ultimoNombre = array_pop($nombres);//lo elimina del array;
// echo $ultimoNombre;
// echo "<br/>";
// print_r($nombres);
// echo "<br/>";


// //SHIFT obtengo el primer valor de un array;
// //TRANSFORMA ARRAY
// $misnumeros = [1,3,4,5];
// $primerNumero = array_shift($misnumeros);
// echo $primerNumero;
// echo "<br/>";
// print_r($misnumeros);
// echo "<br/>";

// //UNSHIFT introduce valores al comienzo del array
// //TRANSFORMA ARRAY
// $colores = ["rojo","gris"];
// array_unshift($colores, "azul", "verde");
// print_r($colores);
// echo "<br/>";


// //SLICE permite coger un trozo de array
// //NO TRANSFORMA ARRAY
// $enteros = [1,5,6,9,3,5,6];
// $enteros1 = array_slice($enteros,2,2);
// // primer parametro = array
// // segundo parametros = offset
// // tercer parametro = numero de elementos (opcional, si no pongo nada coge todos hasta el final)
// print_r($enteros1);
// echo "<br/>";

// $enteros2 =array_slice($enteros,2);
// print_r($enteros2);
// echo "<br/>";

// //SPLICE 
// //SI TRANSFORMA ARRAY
// $elementosQuimicos = ["hidrogeno","oxigeno","helio","azufre","carbono"];
// //posicionarme en indice 1
// //quitar 2 elementos
// // insertar nuevo elemento
// array_splice($elementosQuimicos,1,2,"Neon");
// print_r($elementosQuimicos);
// echo "<br/>";

// //MERGE
// //no TRANSFORMA ARRAY
// $domesticos = ["perro","gato"];
// $salvajes = ["leon", "tigre"];
// $animales = array_merge($domesticos,$salvajes);
// print_r($animales);
// echo "<br/>";
// print_r($domesticos);
// echo "<br/>";

// //ARRAY DIF Toma el primer array y le quita los elementos que esten presentes en el segundo array.
// //NO TRANSFORMA ARRAY
// $letras = ["a", "c", "f", "d"];
// $letras2 =["c","j"];
// $diferencia = array_diff($letras,$letras2);
// print_r($diferencia);
// echo "<br/>";
// print_r($letras);
// echo "<br/>";


// //SEARCH me devuelve el indice de un elemento que esta en el array, si no lo encuentra no devuelve nada.
// //NO TRANSFORMA ARRAY
// $ciudades = ["Gijón","Oviedo","Mieres"];
// $index = array_search("Gi",$ciudades);
// echo $index;
// echo "<br/>";
// print_r($ciudades);
// echo "<br/>";


// //MAP mapea el array y a cada elemento del array le aplica una función
// //NO TRANSFORMA ARRAY
// $profesiones = ["zapatero","conductor","programador"];
// //strlen , permite calcular la longitud de un string
// $longitudes = array_map("strlen",$profesiones);
// print_r($longitudes);
// echo "<br/>";

// //yo puedo crear mi propia funcion que utilice como parametro cada uno de los elementos del array
// function concatenoPalabra($palabra,$numero){
//     return "TIPO: ".$palabra.$numero;
// }

// $nuevoarray = array_map("concatenoPalabra",$profesiones,
// ["1","2","3"]);
// print_r($nuevoarray);
// echo "<br/>";
// print_r($profesiones);
// echo "<br/>";


// //COUNT 
// //NO TRANSFORMA EL ARRAY
// $direcciones = ["calle aserradores", "calle uria", "calle ezcurdia"];
// echo count($direcciones);
// echo "<br/>";


// //REVERSO Devuelve un array con los elementos en orden inverso
// //NO TRANSFORMA EL ARRAY
// $misprecios = [23,52,66,99];
// $inverso = array_reverse($misprecios);
// print_r($inverso);
// echo "<br/>";
// print_r($misprecios);
// echo "<br/>";


// //ARRAY_KEY_EXISTS me permite saber si una clave existe en una rray asociativo
// //NO TRANSFORMA EL ARRAY
// $usuario = ["id"=>"89","nickname"=>"user2", "age"=>34];
// $existeClave = array_key_exists("age",$usuario);
// echo $existeClave;
// echo "<br/>";

// //implode
// //NO TRANSFORMA EL ARRAY
// $lista = ["calle", "avenida","plaza","carretera"];
// $listaString = implode(", ",$lista);
// echo $listaString;
// echo "<br/>";

// //IN_ARRAY
// $apellidos = ["diaz","del campo","suarez","gomez"];
// $estaEnArray = in_array("del campo",$apellidos);
// // echo $estaEnArray;
// echo $estaEnArray?"Esta":"No esta";



//metodos ordenancion -----------------------------------
//SORT ordena en orden creciente
//SI TRANSFORMA EL ARRAY
echo "<br/>";
echo "**************************************************************<br/>";
echo "<br/>";

$numeros = [5,8,9,1,2,3];
sort($numeros);
print_r($numeros);
echo "<br/>";
foreach ($numeros as $clave => $valor){
    echo $clave."-".$valor;echo "<br/>";
}
echo "<br/>";
for($i=0;$i<count($numeros);$i++){
    echo $i."-".$numeros[$i];echo "<br/>";
}

$numerosbis = [5,8,9,1,2,3];
asort($numerosbis);
print_r($numerosbis);
echo "<br/>";
foreach ($numerosbis as $clave => $valor){
    echo $clave."-".$valor;echo "<br/>";
}
echo "<br/>";
for($i=0;$i<count($numerosbis);$i++){
    echo $i."-".$numerosbis[$i];echo "<br/>";
}




//RSORT ordena en orden decreciente
//SI TRANSFORMA EL ARRAY
$numeros2 = [8,9,6,8,4,1,2,63,4];
rsort($numeros2);
print_r($numeros2);
echo "<br/>";


//ASORT ordena de forma creciente un array asociativo y mantiene indices,
//SI TRANSFORMA EL ARRAY
$edades = ["Pedro" =>32, "John" => 51, "Maria"=>22, "Lucas"=>15 ];
asort($edades);
print_r($edades);
echo "<br/>";

//ASORT ordena de forma creciente un array asociativo y mantiene indices,
//SI TRANSFORMA EL ARRAY
$edades2 = ["Pedro" =>32, "John" => 51, "Maria"=>22, "Lucas"=>15 ];
arsort($edades2);
print_r($edades2);
echo "<br/>";


?>