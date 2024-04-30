<?php

// ? PASAR VALORES POR "VALOR"

$valor = 10;

// El paso por valor es el más común. Si se modifica el valor dentro de bloques `{}` no se modificará su valor fuera de ese `scope`
function sumarTres($num)
{
  $num += 3;
  echo "Valor dentro de la función es: $num\n";
}

sumarTres($valor);
echo "Valor fuera de la función es: $valor\n";

echo "<hr/>";

// ? PASAR VALORES POR "REFERENCIA" AÑADIENDO EL SÍMBOLO `&`

$value = 5;

// El paso por referencia modifica el valor de la variable sea dentro que fuera de los bloques `{}`
function sumarCinco(&$num){
  $num += 5;
  echo "Valor dentro de la función es: $num\n";
}

sumarCinco($value);
echo "Valor fuera de la función es: $value\n";

echo "<hr/>";

// ? PASAR VALORES POR "DEFECTO" CREANDO UN PARÁMETRO CON UN VALOR FIJO

$val = 2;

// El paso por defecto proporciona un valor preestablecido que se utilizará si no se proporcionan parámetros. Se inicializa una variable dentro de los parámetros
function sumarOcho($num = 5)
{
  $num += 8;
  echo "Valor dentro de la función es: $num\n";
}

sumarOcho($val);
echo "Valor fuera de la función es: $val\n";

sumarOcho();
echo "Valor fuera de la función y sin parámetros: $val\n";
