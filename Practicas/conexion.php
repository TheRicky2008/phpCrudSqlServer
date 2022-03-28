<?php
$serverName = "RICKY\DBRICKY";

$infoConexion = array ("Database"=>"PRUEBAPHP");

$conn = sqlsrv_connect ( $serverName, $infoConexion);

if ($conn) {
    
//echo ('Conexion Establecida!!!!');

}else{
    /*echo('Conexion Fallida');
    die(print_r(sqlsrv_errors(),true));*/
}

?>

