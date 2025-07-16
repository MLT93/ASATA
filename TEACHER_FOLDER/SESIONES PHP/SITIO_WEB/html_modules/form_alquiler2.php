<?php
require_once("./classes/db.php");
use Database\Db as Db;
$cnx = new Db("localhost","root","","gameclub");
?>


<form class="form_justificado" action="reg_alquiler2.php" method="post">  


<label for="videojuego">VIDEOJUEGO</label>
<select name="videojuego" id="videojuego">
    <?php
    $sentenciaSQL = "SELECT videojuegos.id, videojuegos.nombre FROM videojuegos";
    $itemsLista = $cnx->myQueryMultiple($sentenciaSQL,false);

    foreach($itemsLista as $key => $value){
     if($value[0] == 1){?>
      <option value="<?=$value[0]?>" selected><?=$value[1]?></option>
      <?php
     }else{
      ?>
        <option value="<?=$value[0]?>"><?=$value[1]?></option>
    <?php }}
    ?>
</select>


<label for="tarifa">TARIFA</label>

<?php
    // $sentenciaSQL = "SELECT tarifas.tipo, tarifas.coste FROM videojuegos LEFT JOIN tarifas ON videojuegos.id_tarifa = tarifas.id WHERE videojuegos.id = 2";
    // $item = $cnx->myQuerySimple($sentenciaSQL,false);

?>



<label for="mpago">METODO PAGO</label>
<select name="mpago" id="mpago">
    <?php
    $sentenciaSQLMetodoPago = "SELECT metodospago.id, metodospago.metodo FROM metodospago ";
    $itemSListaMetodos = $cnx->myQueryMultiple($sentenciaSQLMetodoPago, false);
    ?>
    <option id="0" value="0">Escoge un método de pago</option>
    <?php
    foreach($itemSListaMetodos as $key => $value){
        if($value[1] == "bitcoins"){
        }else{
        ?>
        <option id="<?=$value[0]?>" value="<?=$value[0]?>"><?=$value[1]?></option>
        <?php }
        }
    ?>    

</select>



<input type="submit" name="alquilar" value="ALQUILAR">

</form>