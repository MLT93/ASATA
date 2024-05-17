<footer>

  <?php
  // El footer al estar `require` en las demás páginas, la variable `$msg` tomará el valor que le asigne en ellas, y si no tiene valor, no muestra nada gracias al `isset` 
  if (isset($msg)) {
    echo "<h3 class='ok'>" . $msg . "</h3>";
  }
  ?>

</footer>
