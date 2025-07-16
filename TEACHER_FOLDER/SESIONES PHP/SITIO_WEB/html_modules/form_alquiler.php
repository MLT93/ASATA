<?php
require_once("./classes/db.php");
use Database\Db as Db;
$cnx = new Db("localhost","root","","gameclub");
?>


<form class='form_justificado' action="reg_alquiler.php" method="post">  


<label for="videojuego">VIDEOJUEGO</label>
<select name="videojuego">
    <?php
    $sentenciaSQL = "SELECT videojuegos.id, videojuegos.nombre FROM videojuegos";
    $itemsLista = $cnx->myQueryMultiple($sentenciaSQL,false);

    ?>
    <option value="0">Escoge un videojuego</option>
    <?php
    foreach($itemsLista as $key => $value){?>
        <option value="<?=$value[0]?>"><?=$value[1]?></option>
    <?php }
    ?>
</select>


<label for="tarifa">TARIFA PREMIUM</label>
<input type="checkbox" name="tarifa" id="tarifa" />

<br/>

<label for="mpago">METODO PAGO</label>
<select name="mpago">
    <?php
    $sentenciaSQLMetodoPago = "SELECT metodospago.id, metodospago.metodo FROM metodospago ";
    $itemSListaMetodos = $cnx->myQueryMultiple($sentenciaSQLMetodoPago, false);
    ?>
    <option value="0">Escoge un método de pago</option>
    <?php
    foreach($itemSListaMetodos as $key => $value){
        if($value[1] == "bitcoins"){
        }else{
        ?>
        <option value="<?=$value[0]?>"><?=$value[1]?></option>
        <?php }
        }
    ?>    

</select>



<input type="submit" name="alquilar" value="ALQUILAR">

</form>