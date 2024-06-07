<?php

require_once("./classes/db.php");


use Database\Db as Db;

$cnx = new Db("localhost", "root", "", "gameclub");
$sentenciaSQL = "SELECT * FROM videojuegos";

$listaVideojuegos = $cnx->myQueryMultiple($sentenciaSQL); // Asociativa
?>

<form class='catalogo' action='carrito.php' method='post'>

    <div id='galeria'>
        <?php
        //  listaVideojuegos es un matriz (array de arrays)
        // $value es un array de esa matriz, para acceder a los valores dentro del array uso los indices asociativos
        foreach ($listaVideojuegos as $key => $value) {
        ?>
            <!-- saco iterativamente todos los videojuegos y los pinto -->
            <div class='elementoGaleria'>
                <img class='redondeado' src='<?= $value['imagen'] ?>' /><span> - <?= $value['precio'] ?> €</span>
                <p class='nameGallery'><?= $value['nombre'] ?></p>
                <p><input type='radio' name='<?= $value['id'] ?>' value='alquilar' id='id<?= $value['id'] ?>' /><span> Alquilar</span></p>
                <p><input type='radio' name='<?= $value['id'] ?>' value='comprar' id='id<?= $value['id'] ?>' /><span> Comprar</span></p>
            </div>
        <?php
        }
        ?>
    </div>
    <article>
        <h2>METODO DE PAGO</h2>
        <select name='mpago'> <?php
                                $sentenciaSQLMPago = "SELECT metodospago.id, metodospago.metodo FROM metodospago";
                                $itemsLista = $cnx->myQueryMultiple($sentenciaSQLMPago, false);
                                ?>
            <option value='0'>Escoge un método de pago</option>
            <?php
            foreach ($itemsLista as $key => $value) {
            ?>
                <option value='<?= $value[0] ?>'><?= $value[1] ?></option>
            <?php
            }
            ?>
        </select>

        <input type="submit" name="catalogo" value="A CARRITO" />
    </article>

</form>


<?php

?>
