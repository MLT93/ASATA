   <?php
    // require_once("../classes/BaseDatos.php");

    // use BaseDatos\BaseDatos;

    // $cnx = new BaseDatos("localhost", "root", "mysql", "gameclubdario");

    // No necesito esto aquí porque importo directamente este archivo en `reg_videojuego.php` después de realizar la conexión a la database

    // La variable `$cnx` acá se utiliza sin importar que no haya una instancia creada porque este mismo archivo se importará donde ya se establece esa conexión previamente, entonces no hace falta volver a importarlo todo
    ?>

   <!-- El `enctype="multipart/form-data"` lo necesito para utilizar el input de tipo file -->
   <form action="reg_videojuego.php" method="post" enctype="multipart/form-data">


     <label for="nombreGameId">NOMBRE</label>
     <input type="text" name="nombreGame" id="nombreGameId">

     <label for="descripcionID">DESCRIPCIÓN</label>
     <textarea name="descripcion" id="descripcionID"></textarea>

     <label for="idGeneroId">GÉNERO</label>
     <!-- <input type="text" name="idGenero" id="idGeneroId" /> -->
     <select name="idGenero" id="idGeneroId">
       <option value=""></option>
       <?php
        $sqlQuery = "SELECT id, nombre FROM genero";
        $arrIdVideojuego = $cnx->myQueryMultiple($sqlQuery, false);
        foreach ($arrIdVideojuego as $key => $value) { ?>
         <option value="<?= $value[0] ?>"> <?= $value[1] ?> </option>
       <?php
        }
        ?>
     </select>

     <label for="idDesarrolladorId">DESARROLLADOR</label>
     <!-- <input type="text" name="idDesarrollador" id="idDesarrolladorId" /> -->
     <select name="idDesarrollador" id="idDesarrolladorId">
       <option value=""></option>
       <?php
        $sqlQuery = "SELECT id, nombre FROM desarrolladores";
        $arrIdVideojuego = $cnx->myQueryMultiple($sqlQuery, false);
        foreach ($arrIdVideojuego as $key => $value) { ?>
         <option value="<?= $value[0] ?>"> <?= $value[1] ?> </option>
       <?php
        }
        ?>
     </select>

     <label for="idPlataformaId">PLATAFORMA</label>
     <!-- <input type="text" name="idPlataforma" id="idPlataformaId" /> -->
     <select name="idPlataforma" id="idPlataformaId">
       <option value=""></option>
       <?php
        $sqlQuery = "SELECT id, nombre FROM plataformas";
        $arrIdVideojuego = $cnx->myQueryMultiple($sqlQuery, false);
        foreach ($arrIdVideojuego as $key => $value) { ?>
         <option value="<?= $value[0] ?>"> <?= $value[1] ?> </option>
       <?php
        }
        ?>
     </select>

     <label for="idPeguiId">PEGUI</label>
     <!-- <input type="text" name="idPegui" id="idPeguiId" /> -->
     <select name="idPegui" id="idPeguiId">
       <option value=""></option>
       <?php
        $sqlQuery = "SELECT id, pegui FROM pegui";
        $arrIdVideojuego = $cnx->myQueryMultiple($sqlQuery, false);
        foreach ($arrIdVideojuego as $key => $value) { ?>
         <option value="<?= $value[0] ?>"> <?= $value[1] ?> </option>
       <?php
        }
        ?>
     </select>

     <label for="fechaPubId">FECHA PUBLICACIÓN</label>
     <input type="date" name="fechaPub" id="fechaPubId">

     <label for="isoCodeId">CÓDIGO ISO</label>
     <input type="text" name="isoCode" id="isoCodeId">

     <label for="imgId">IMAGEN</label>
     <input type="file" name="img" id="imgId">

     <input type="submit" name="enviarVideojuego" value="REGISTRAR VIDEOJUEGO">

   </form>
