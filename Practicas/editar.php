<?php
if (isset($_GET["editar"])) {
    $idUsuario = base64_decode($_GET["editar"]);
    /*$idDesencriptado = urldecode($idUsuario);
    //echo $idDesencriptado;
    echo $idUsuario;*/
     
    $sql = "select * from usuario where USU_ID='$idUsuario'";
    $ejecutar = sqlsrv_query($conn,$sql);

    $fila = sqlsrv_fetch_array($ejecutar);

    @$Usuario = $fila["USU_USUARIO"];
    @$Pass = $fila["USU_PASS"];
    @$Pass2 = $fila["USU_PASS2"];
}
?>   

 <h1>Actualizar Usuario</h1>
  <hr>
<form method="POST" action="">    
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Usuario</label>
    <input type="text" class="form-control" id="pNombre" name="txtUsuario" value="<?php echo $Usuario; ?>">    
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Contraseña</label>
    <input type="text" class="form-control" id="sNombre" name="txtPass" value="<?php echo $Pass; ?>">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Repite la contraseña</label>
    <input type="text" class="form-control" id="aMaterno" name="txtPass2" value="<?php echo $Pass2; ?>">
  </div>
  
  <button type="submit" name="btnActualizar" class="btn btn-primary">Actualizar</button>  
</form>

<?php
if (isset($_POST["btnActualizar"])) {
    $actualizarUsuario = $_POST["txtUsuario"];
    $actualizarPass = $_POST["txtPass"];    

    $updateSql = "update usuario set USU_USUARIO='$actualizarUsuario',USU_PASS = '$actualizarPass', 
    USU_PASS2 = '$actualizarPass' WHERE USU_ID='$idUsuario'";
    $ejecutar = sqlsrv_query($conn,$updateSql);
if ($ejecutar) {
    echo "<script>alert('Actualizado correctamente')</script>";
    echo "<script>window.open('listarUsuarios.php','_self')</script>";
}
};
?>


