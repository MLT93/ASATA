<?php
require_once("classes/db.php");
use Database\Db as Db;
$cnx = new Db("localhost", "root", "", "gameclubdario");
?>


<form action="reg_videojuego.php" method="post" enctype="multipart/form-data">

<label for="nombre">NOMBRE</label>
<input type="text" name="nombre" id="nombreid">

<label for="descripcion">DESCRIPCION</label>
<textarea name="descripcion"></textarea>


<label for="genero" >GENERO</label>
<select name="genero">
    <?php 
        $sentenciaSQL = "SELECT generos.id, generos.nombre FROM generos";
        $itemsLista = $cnx->myQueryMultiple($sentenciaSQL, false);
    ?>
    <option value="0">Escoge un género</option>
    <?php
        foreach($itemsLista as $key => $value){
            ?>
            <option value="<?=$value[0]?>"><?=$value[1]?></option>
            <?php
        }
    ?>
</select>
<br/>

<label for="desarrollador" >DESARROLLADOR</label>
<select name="desarrollador">
    <?php 
        $sentenciaSQL = "SELECT id, nombre FROM desarrolladores";
        $itemsLista = $cnx->myQueryMultiple($sentenciaSQL, false);
    ?>
    <option value="0">Escoge un desarrollador</option>
    <?php
        foreach($itemsLista as $key => $value){
            ?>
            <option value="<?=$value[0]?>"><?=$value[1]?></option>
            <?php
        }
    ?>
</select>
<br/>


<label for="plataforma" >PLATAFORMA</label>
<select name="plataforma">
    <?php 
        $sentenciaSQL = "SELECT id, nombre FROM plataformas";
        $itemsLista = $cnx->myQueryMultiple($sentenciaSQL, false);
    ?>
    <option value="0">Escoge una Plataforma</option>
    <?php
        foreach($itemsLista as $key => $value){
            ?>
            <option value="<?=$value[0]?>"><?=$value[1]?></option>
            <?php
        }
    ?>
</select>
<br/>



<label for="pegui" >PEGUI</label>
<select name="pegui">
    <?php 
        $sentenciaSQL = "SELECT id, pegui FROM pegui";
        $itemsLista = $cnx->myQueryMultiple($sentenciaSQL, false);
    ?>
    <option value="0">Escoge el Pegui</option>
    <?php
        foreach($itemsLista as $key => $value){
            ?>
            <option value="<?=$value[0]?>"><?=$value[1]?></option>
            <?php
        }
    ?>
</select>
<br/>


<label for="fechaPub">FECHA PUBLICACION</label>
<input type="date" name="fechaPub" id="fechaPub">
<br/>

<label for="isocode">ISO CODE</label>
<input type="text" name="isocode" id="isocode">

<label for="imagen">IMAGEN</label>
<input type="file" name="imagen">

<input type="submit" name="reg_videojuego" value="REGISTRAR VIDEOJUEGO"/>

</form>
