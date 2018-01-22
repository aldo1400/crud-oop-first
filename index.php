
<?php
  include_once("modulos/Enrutador.php");
  include_once("modulos/Controlador.php");

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Curso POO con php</title>

  </head>
  <body>
    <h1>Bienvenido a todos los estudiantes</h1>
    <section>
      <?php $enrutador=new Enrutador();
             if($enrutador->validarGet(isset($_GET['cargar']))){
                $enrutador->cargarVista($_GET['cargar']); }

       ?>
     </section>
  </body>
</html>
