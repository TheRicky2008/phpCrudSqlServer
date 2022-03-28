<!DOCTYPE html>
<head>
    <title>
Nuevo
    </title>
</head>
<body>
    <h1>Nuevo</h1>
    <form method="POST" action="">    
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
include("conexion.php");
if (isset($_post)) {
    $usuario = "txtUsuario";
$pass1 = "txtPass";
$pass2 = "txtPass2";

if ($pass1 == $pass2) {
    $nuevoUsuario = "insert into usuario (USU_USUARIO,USU_PASS,USU_PASS2) values ('$usuario','$pass','$pass2')";
    $ejecutar = sqlsrv_query($conn,$nuevoUsuario);
    if ($ejecutar) {
        
    }
}else {
alert("Las contraseñas deben coincidir");
}
}



?>