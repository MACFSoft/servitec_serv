<?php
// Conectarme
  require_once("conexion.php");
  $mysql= new Con_MySQL;

$Inds = $_POST{'Ind'};
$Consulta="SELECT sol_st, sol_nombre, sol_uuid
           FROM reg_solicitud WHERE sol_id=$Inds;";
$Resultado = $mysql->consultar_query($Consulta);

if ($Resultado[0]['sol_st']==0){
 $Consulta="INSERT INTO reg_equipo SET
            eq_nombre='".$Resultado[0]['sol_nombre']."',
            eq_uuid='".$Resultado[0]['sol_uuid']."',
            eq_reghist=0;";
 $Resultado = $mysql->ejecutar_query($Consulta);
 $StadoReg = 1;
}else{
 $StadoReg = 0;
}

$Activa= "UPDATE reg_solicitud SET sol_st=$StadoReg WHERE sol_id=$Inds;";
$Resultado = $mysql->ejecutar_query($Activa);
echo 1;
sleep(1);
?>