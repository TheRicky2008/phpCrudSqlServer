<?php
include ("conexion.php");
?>
<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
     integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <title>CRUD SQL SERVER</title>
  </head>
  <body>    
      
<?php

$_consulta = "select * from usuario where USU_ESTADO ='A'";
$datos = sqlsrv_query ($conn,$_consulta);

?>
<div class="container">
<h2>Lista Usuarios</h2>
<hr>
<div class="col md 8">
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Usuario</th>
      <th scope="col">Contraseña</th>
      <th scope="col">Accion</th>      
      <th scope="col">Accion</th>      
    </tr>
  </thead>
  <tbody>
  <?php 
  $i = 0;
  while ($fila = sqlsrv_fetch_array($datos)) {
     $id = $fila['USU_ID'];
     $usuario = $fila['USU_USUARIO'];
     $pass = $fila['USU_PASS'];
     $i++;
   ?>
    <tr>      
      <th scope="row"><?php echo $id ; ?></th>
      <td><?php echo $usuario ; ?> </td>
      <td><?php echo $pass ; ?> </td>
      <td><a href="listarUsuarios.php?editar=<?php echo urlencode($idEncriptado=base64_encode($id)) ;?>">
        Editar </a></td>
      <td><a href="listarUsuarios.php?eliminar=<?php echo urlencode($idEncriptado=base64_encode($id));?>">
        Eliminar </a></td>
    </tr>
    <?php };?>    
  </tbody>
</table>
</div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" 
    crossorigin="anonymous"></script>

   
    <?php 
    function debug_to_console($data) {
    $output = $data;
    if (is_array($output))
        $output = implode(',', $output);

    echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
};
    if (isset($_GET["editar"])) {
      include("editar.php");
    }else {
      if (isset($_GET["eliminar"])) {
        $idUsuario = base64_decode($_GET["eliminar"]);        
        $sql = "update usuario set USU_ESTADO = 'I' where USU_ID= '$idUsuario'";
        $result = sqlsrv_query($conn,$sql);
        if ($result) {
          echo "<script>alert('Registro eliminado correctamente');</script>";
          echo "<script>window.open('listarUsuarios.php','_self')</script>";
        }else {
          echo "<script>alert('Error al eliminar');</script>";          
          //die(print_r(sqlsrv_errors(),true));
          //echo "<script>console.log( 'Debug Objects: " . sqlsrv_errors(),true . "' );</script>";
          //debug_to_console(sqlsrv_errors(),true);
        }
      }
    };
  
    ?>
    </div>
    </div>
   
  </body>
</html>