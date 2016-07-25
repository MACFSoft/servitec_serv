<?php
// Conectarme
    require_once("php/conexion.php");
    $mysql= new Con_MySQL;

$Consulta="SELECT
          sol_id AS Indice,
          Date_format(sol_fecha,'%d-%m-%Y') AS 'Fecha In',
          sol_uuid AS 'UUID Movil',
          sol_nombre AS Nombre,
          sol_so AS 'Sistema Op',
          sol_ver AS Vercion,
          sol_pass AS Contrasena,
          sol_hist AS Solicitudes,
          DATE_FORMAT(sol_fechast,'%d-%m-%Y') AS 'Ultima vez',
          sol_st AS Estado
          FROM reg_solicitud;";

$Resultado = $mysql->consultar_query($Consulta);
//print_r($Resultado);
$json = json_encode($Resultado);
sleep(1);
echo $json;
?>
