<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <h1>Mi primera página web</h1>
  <!-- TODO LO QUE ESTÁ EN EL TAG PHP ESTÁ EN EL SERVIDOR, NO EN EL NAVEGADOR. PARA HACERLO VER AL CLIENTE, HAY QUE ENVIARLO AL CLIENTE A TRAVÉS DE CÓDIGO -->
  <?php
  echo '<h3>Escribir cosas que ve el cliente</h3>';

  // Texto con dos comillas interpreta HTML
  echo "Esto es un script <br/> con comillas dobles en PHP <br/>";

  // Texto con comillas simples interpreta HTML pero no interpreta código PHP
  echo 'Esto es un script <br/> con comillas simples en PHP <br/>';

  echo '<h3>Comillas simples y dobles</h3>';

  $nombreVariable = 1;
  echo "Comillas dobles: El valor ID del usuario es: $nombreVariable <br/>"; // Dentro de las comillas dobles interpreta tags HTML y código PHP
  echo 'Comillas simples: El valor ID del usuario es: $nombreVariable <br/>'; // Dentro de las comillas simples interpreta solo tags HTML
  echo 'Comillas simples: El valor ID del usuario es: ' . $nombreVariable . '<br/>'; // Con comillas simples se utiliza "." para concatenar cosas
  ?>

  <h2>Variables dinámicas</h2>

  <?php
  // Creo una variable a través de "$"
  $a = "Hola";

  // En vez de declararla esplicitamente utilicé el contenido de otra variable para
  // Asigno el valor de una variable como nombre de otra variable
  $$a = "Mundo";

  echo $$a . "<br/>";
  echo "$Hola <br/>";

  echo $a . ' ' . $$a . "<br/>"; // Escritura de las dos variables
  echo $a . ' ' . $Hola . "<br/>"; // Es lo mismo pero depende del valor de otra variable. Esto podría devolver un error si el valor del que depende cambia
  echo "$a ${$a} <br/>"; // Es lo mismo, pero está depreciado

  ?>

  <h2>Variables numéricas</h2>

  <?php
  $entero = 123;
  $enteroNeg = -123;
  $enteroMul = 8 * 5;
  $decimal = 3.141592;
  $numeroExp = 3.2e5; /* Esto es igual a: [3,2 * 10^5] -> [3,2 x 100000] //=> 320000 */
  $numeroExp2 = 4E-8; /* Esto es igual a: [4 / 10^8] -> [4 / 100000000]  //=> 0.00000004 */
  $numeroExp3 = 3 * 4e-8; /* Por convenio, no te escribirá nunca todos los ceros delante del número. Simplemente te dará el resultado. Si es negativo, te lo deja en forma de notación científica-exponencial */

  echo "$entero <br/>";
  echo "$enteroNeg <br/>";
  echo "$enteroMul <br/>";
  echo "$decimal <br/>";
  echo "$numeroExp <br/>";
  echo "$numeroExp2 <br/>";
  echo "$numeroExp3 <br/>";
  ?>

  <h2>Arrays</h2>

  <?php
  /* $colores = array("blanco", "amarillo", "azul", "rojo", "verde"); */
  $colores = ["blanco", "amarillo", "azul", "rojo", "verde"];

  echo "$colores[1], $colores[0] <br/>";

  for ($i = 0; $i < 5; $i++) {
    # Parecido a un for en JavaScript
    echo $colores[$i] . "<br/>";
  }
  ?>

  <h2>Variables booleanas</h2>

  <?php
  /* Da igual si es mayúscula o minúscula. Interpreta 1 si es true y 0 si es false. Lo único es que en false no pinta nada */
  $existe1 = true;
  $existe2 = TRUE;
  $existe3 = false;
  $existe4 = FALSE;

  echo "$existe1 <br/>";
  echo "$existe2 <br/>";
  echo "$existe3 <br/>";
  echo "$existe4 <br/>";
  ?>
</body>

</html>
