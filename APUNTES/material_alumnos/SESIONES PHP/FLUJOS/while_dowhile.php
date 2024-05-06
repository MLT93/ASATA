<?php

$numeros = array(1,4,6,8,43,3,7,9,5,0,5,-1,4,5,6,6,74,6);

// for($i=0;$i<count($numeros);$i++){

//     do{
//         echo $numeros[$i]."<br/>";
//     }
//     while($numeros[$i]>0);

// }




$i = 1;
$j = 1;

while($i<=10 && $j<=10){
    echo "$i - $j <br/>";
    $i++;
    $j+=2;   //$j = $j + 2
}

echo "<br/>";
echo "***************************************<br/>";
echo "<br/>";


$k = 1;
$l = 1;

do{
    echo "$k - $l <br/>";
    $k++;
    $l+=2;   //$j = $j + 2
}while($k<=10 && $l<=10);




?>