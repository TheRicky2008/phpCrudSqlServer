<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST">
    <input type="password" name="texto" placeholder="Ingresa un texto">
    <button type="submit" name="btnGuardar" class="btn btn-primary">Guardar</button>
    </form>
    <?php
    if (isset($_POST['btnGuardar'])) {
        $contrasena = $_POST['texto'];
        echo $contrasena, '<br/>';
        $passEncriptado = password_hash($contrasena,PASSWORD_DEFAULT,['cost'=>'10']);
        echo $passEncriptado, '<br/>';
    }

    $hash=md5('112');
    echo $hash;
    '<br/>';
    
    ?>
</body>
</html>