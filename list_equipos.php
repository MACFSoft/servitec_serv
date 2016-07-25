<?php
// Conectarme
    require_once("php/conexion.php");
    $mysql= new Con_MySQL;

$Consulta="SELECT Date_format(eq_fecha,'%d-%m-%Y') AS 'Fecha Ini',
          eq_nombre AS Nombre,
          eq_uuid AS 'UUID',
          eq_lat AS 'Latitud',
          eq_ing AS 'Longitud',
          eq_erro AS 'Error',
          DATE_FORMAT(eq_fechast, '%d-%m-%Y') AS 'Ultima vez'
          FROM reg_equipo;";

$Resultado = $mysql->consultar_query($Consulta);
//print_r($Resultado);
$json = json_encode($Resultado);
sleep(1);
echo $json;
?>
