<?php
include ('conexion.php');
?>
<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="estilos.css" rel="stylesheet">
	<title>Inicio de Sesion</title>
</head>

<body>  
	<div class="login-wrap">
		<form method="POST">
			<div class="login-html">
				<input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Iniciar
					Sesion</label>
				<input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2"
					class="tab">Registrarse</label>

				<div class="login-form">
					<div class="sign-in-htm">
						<div class="group">
							<label for="user" class="label">Usuario</label>
							<input id="user" name="txtUser" type="text" class="input">
						</div>
						<div class="group">
							<label for="pass" class="label">Contraseña</label>
							<input id="pass" name="txtPass" type="password" class="input" data-type="password">
						</div>
						<div class="group">
							<input id="check" type="checkbox" class="check" checked>
							<label for="check"><span class="icon"></span> Recuerdame</label>
						</div>
						<div class="group">
							<input type="submit" class="button" name="btnIniciarSesion" value="Iniciar Sesion">
						</div>
						<div class="hr"></div>
						<div class="foot-lnk">
							<a href="#forgot">Olvide mi Contraseña</a>
						</div>
					</div>
					<div class="sign-up-htm">
						<div class="group">
							<label for="user" class="label">Usuario</label>
							<input id="user" type="text" name="txtUsuarioReg" class="input">
						</div>
						<div class="group">
							<label for="pass" class="label">Contraseña</label>
							<input id="pass" type="password" name="txtPassReg" class="input" data-type="password">
						</div>
						<div class="group">
							<label for="pass" class="label">Repetir contraseña</label>
							<input id="pass" type="password" name="txtPass2Reg" class="input" data-type="password">
						</div>
						<div class="group">
							<input type="submit" name="btnRegistrarse" class="button" value="Registrarse">
						</div>
						<div class="hr"></div>
						<div class="foot-lnk">
							<label for="tab-1">Ya eres Miembro ??</a>
						</div>
					</div>
				</div>
		</form>
	</div>
	</div>
</body>

</html>
<?php
if (isset($_POST['btnIniciarSesion'])) {
    $usuarioForm = $_POST['txtUser'];
    $passForm = $_POST['txtPass'];

    $consultaLogin = "select * from usuario where USU_USUARIO='$usuarioForm'";
    $ejecutar = sqlsrv_query($conn,$consultaLogin);

    $fila = sqlsrv_fetch_array($ejecutar);
    @$hash = $fila['USU_PASS'];
    @$usuario = $fila['USU_USUARIO'];
    
    if (password_verify($passForm,$hash) && $usuarioForm == $usuario ) {
        echo "<script>alert('Bienvenido al sistema!!!!!!')</script>";
    }else{
        echo "<script>alert('Usuario o contraseña incorrectos')</script>";
    }
}else{
    if (isset($_POST["btnRegistrarse"])) {

        $usu = $_POST["txtUsuarioReg"];
        $pass = $_POST["txtPassReg"];
        $pass2 = $_POST['txtPass2Reg'];
        if ($usu !=null && $pass != null && $pass2 != null) {
            $passEncriptado = password_hash($pass,PASSWORD_DEFAULT,['cost'=>'10']);
    
if ($pass != $pass2) {
          echo "<script>alert ('Las contraseñas deben coincidir') </script>";
    }else{
         
        $insertarUsuario = "insert into usuario (USU_USUARIO,USU_PASS,USU_PASS2,USU_ESTADO) 
        values('$usu','$passEncriptado','$passEncriptado','A')";
        $ejecutar = sqlsrv_query($conn,$insertarUsuario);
		
    if ($ejecutar) {
            echo "<script>alert ('Registrado correctamente') </script>";
		    }else{
            echo "<script>alert ('Error al guardar') </script>";
            die(print_r(sqlsrv_errors(),true));
        }
        }
        
      }else{
        echo "<script>alert ('Ingrese datos en todos los campos !!!') </script>";
      }
    };
}
?>