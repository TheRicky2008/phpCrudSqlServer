<?php 
include("conexion.php");
?>

<!DOCTYPE html>
<head>
    <title>
Nuevo
    </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
     integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
</head>
<body>
    <div class="container">
    <h1>Nuevo</h1>
</div>
    <form method="POST" action="" class="container">    
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Usuario</label>
          <input type="text" class="form-control" id="pNombre" name="txtUsuario" value="">    
        </div>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Contraseña</label>
          <input type="text" class="form-control" id="sNombre" name="txtPass" value="">
        </div>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Repite la contraseña</label>
          <input type="text" class="form-control" id="aMaterno" name="txtPass2" value="">
        </div>
        <button type="submit" name="btnGuardar" class="btn btn-primary">Guardar</button>  
      </form>      

</body>
</html>
<?php 

if (isset($_POST["btnGuardar"])) {
    $usuario = $_POST["txtUsuario"];
$pass1 = $_POST["txtPass"];
$pass2 = $_POST["txtPass2"];
$date = date('m-d-Y h:i:s a', time()); 
if ($pass1 == $pass2) {
    $nuevoUsuario = "insert into usuario (USU_USUARIO,USU_PASS,USU_PASS2,USU_ESTADO,USU_FECHACREACION) values ('$usuario','$pass1','$pass2','A','$date')";
    $ejecutar = sqlsrv_query($conn,$nuevoUsuario);
    if ($ejecutar) {
        echo "<script> alert ('Guardado correctamente') </script>";   
    }
}else {
     echo "<script> alert ('Las contraseñas deben coincidir') </script>";
}
}

?>