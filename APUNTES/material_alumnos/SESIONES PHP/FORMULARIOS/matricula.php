<html lang="es">

    <head>
        <title>matricula</title>
        <meta charset="utf-8"/>
        <meta name="author" content="**"/>
        <meta name="description" content="*"/>
        <meta name="keywords" content="Cursos, Formación"/>
    </head>

    <body>

        <form action="resp_matricula.php" method="post" >

            <label for="nombreid">NOMBRE</label>
            <input type="text" name="nombre" id="nombreid">
            <br/>
            <label for="apellido">APELLIDO</label>
            <input type="text" name="apellido" id="apellido">
            <br/>

            <label for="curso">CURSO A ESCOGER</label>
            <select name="curso">
                <?php
                    $listaCursos = [
                        ["web", "Curso de programación Web"],
                        ["bd", "Curso de bases de datos"],
                        ["html", "Curso de HTML"],
                        ["cocina", "Curso de cocina"],
                        ["finanzas", "Curso de Analisis financiero"]
                    ];

                    for($i=0; $i<count($listaCursos); $i++){
                        ?>
                            <option   value="<?php echo $listaCursos[$i][0];?>"> <?php echo $listaCursos[$i][1]; ?> </option>
                        <?php
                    }
                ?>
            </select>
            <br/>

            <label for="ciudad">CUIDAD</label>
            <select name="ciudad">
                <?php
                    $listaCiudades = [
                        "Oviedo",
                        "Madrid",
                        "Barcelona",
                        "Bilbao",
                        "Valencia",
                    ];
                    for($i=0; $i<count($listaCiudades); $i++){
                        ?>
                        <option   value="<?= $listaCiudades[$i];?>">        <?= $listaCiudades[$i]; ?>        </option>
                        <?php
                    }
                ?>
            </select>
            <br/>


            <input type="radio" id="noestudios" name="nivel" value ="Sin estudios"> 
            <label for="pass">SIN ESTUDIOS</label>
            <br/>
            <input type="radio" id="primario" name="nivel" value ="Primaria">  
            <label for="pass">ESTUDIOS PRIMARIOS</label>
            <br/>
            <input type="radio" id="secundario" name="nivel" value ="Secundaria"> 
            <label for="pass">ESTUDIOS SECUNDARIOS</label>
            <br/>

            <input type="submit" name="enviar" value="Enviar">


        </form>
    </body>
</html>