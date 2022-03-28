<?php
$Date = date('d-m-Y', time()); 
date_default_timezone_set('Europe/Amsterdam');    
$DateEuropa = date('m-d-Y h:i:s a', time());
date_default_timezone_set('América/Lima');    
$DateAmerica = date('m-d-Y h:i:s a', time());


echo "Fecha actual ".$Date;
echo "Fecha actual Europa ".$DateEuropa;
echo "Fecha actual America ".$DateAmerica;
?>