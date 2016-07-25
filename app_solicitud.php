<?php
// Conectarme
  require_once("php/conexion.php");
  $mysql= new Con_MySQL;

// Recuperar las variables
$SO_m = $_POST{'so'};
$Verc = $_POST{'ver_d'};
$Iuid = strtoupper($_POST{'Uuid_D'});
$User = $_POST{'user'};
$Pass = $_POST{'pass'};

$Consulta="INSERT INTO reg_solicitud SET
                                    sol_nombre='$User',
                                    sol_uuid='$Iuid',
                                    sol_so='$SO_m',
                                    sol_ver='$Verc',
                                    sol_pass='$Pass'
            ON DUPLICATE KEY UPDATE sol_hist=sol_hist+1;";
$Resultado = $mysql->ejecutar_query($Consulta);
// Cominicamos para poser solicitar  datos
$Consulta = "SELECT sol_st as stado FROM reg_solicitud WHERE sol_uuid='$Iuid';";
$Resultado = $mysql->consultar_query($Consulta);
echo $Resultado['stado'];
?>