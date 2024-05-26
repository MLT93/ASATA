<?php
    require_once("./classes/db.php");
    Use Database\Db as Db;
    $cnx = new DB("localhost","root","","gameclub");

    if(isset($_REQUEST['actualizarVideojuego'])){
        $idVideojuego = intval($_REQUEST['videojuegoId']);
        $nameVideojuego =  $_REQUEST['videojuegoName'];
        $descripcionVideojuego =  $_REQUEST['videojuegoDescripcion'];
        $idGenero = intval($_REQUEST['genero']);
        $idDesarrollador = intval($_REQUEST['desarrollador']);
        $idPlataforma = intval($_REQUEST['plataforma']);
        $idPegui = intval($_REQUEST['pegui']);
        $fechaPub = $_REQUEST['fechaPub'];
        $isocode = $_REQUEST['isocode'];
    }
?>

<form class='form_justificado' action='actual_videojuego.php' method='post' enctype="multipart/form-data">

    <input type='hidden' id='videojuegoId' name='videojuegoId' value='<?=$idVideojuego?>'/>

    <label for="videojuegoName">NOMBRE</label>
    <input type='text' id='videojuegoName' name='videojuegoName' value='<?=$nameVideojuego?>'/>

    <label for="videojuegoDescripcion">DESCRIPCION</label>
    <textarea name="videojuegoDescripcion"><?=$descripcionVideojuego?></textarea>
        

    <label for="genero" >GENERO</label>
    <select name="genero">
        <?php 
            $sentenciaSQL = "SELECT generos.id, generos.nombre FROM generos";
            $itemsLista = $cnx->myQueryMultiple($sentenciaSQL, false);
        ?>
        <?php
            foreach($itemsLista as $key => $value){
                if($value[0] == $idGenero){?>
                    <option value="<?=$value[0]?>" selected ><?=$value[1]?></option>
                <?php
                }else{
                ?>
                    <option value="<?=$value[0]?>"><?=$value[1]?></option>
                <?php
                }
            }
        ?>
    </select>
    <br/>

    <label for="desarrollador" >DESARROLLADOR</label>
    <select name="desarrollador">
        <?php 
            $sentenciaSQL = "SELECT desarrolladores.id, desarrolladores.nombre FROM desarrolladores";
            $itemsLista = $cnx->myQueryMultiple($sentenciaSQL, false);
        ?>
        <?php
            foreach($itemsLista as $key => $value){
                if($value[0] == $idDesarrollador){?>
                    <option value="<?=$value[0]?>" selected ><?=$value[1]?></option>
                <?php
                }else{
                ?>
                    <option value="<?=$value[0]?>"><?=$value[1]?></option>
                <?php
                }
            }
        ?>
    </select>
    <br/>


    <label for="plataforma" >PLATAFORMA</label>
    <select name="plataforma">
        <?php 
            $sentenciaSQL = "SELECT plataformas.id, plataformas.nombre FROM plataformas";
            $itemsLista = $cnx->myQueryMultiple($sentenciaSQL, false);
        ?>
        <?php
            foreach($itemsLista as $key => $value){
                if($value[0] == $idPlataforma){?>
                    <option value="<?=$value[0]?>" selected ><?=$value[1]?></option>
                <?php
                }else{
                ?>
                    <option value="<?=$value[0]?>"><?=$value[1]?></option>
                <?php
                }
            }
        ?>
    </select>
    <br/>

    <label for="pegui" >PEGUI</label>
    <select name="pegui">
        <?php 
            $sentenciaSQL = "SELECT pegui.id, pegui.pegui FROM pegui";
            $itemsLista = $cnx->myQueryMultiple($sentenciaSQL, false);
        ?>
        <?php
            foreach($itemsLista as $key => $value){
                if($value[0] == $idPegui){?>
                    <option value="<?=$value[0]?>" selected ><?=$value[1]?></option>
                <?php
                }else{
                ?>
                    <option value="<?=$value[0]?>"><?=$value[1]?></option>
                <?php
                }
            }
        ?>
    </select>
    <br/>


    <label for="fechaPub">FECHA PUB</label>
    <input type='date' id="fechaPub" name="fechaPub" value='<?=$fechaPub?>'/>

    <label for="isocode">ISOCODE</label>
    <input type='text' id="isocode" name="isocode" value='<?=$isocode?>'/>

    <label for='imagen'>NUEVA IMAGEN</label>
    <input type='file' name='imagen'/>
    <br/>

    <input type='submit' name="actualizar_videojuego" value="ACTUALIZAR VIDEOJUEGO"/>
</form>

<?php

?>