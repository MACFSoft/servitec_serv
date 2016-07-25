<?php
/*
    Base de datos MySQL
    Creado en modo de clase
*/
class Con_MySQL{
//Creando datos pribados de conexion
    private $db_host = 'localhost';
    private $db_user = 'root';
    private $db_pass = 'usbw';
    private $db_name = 'dbservitec';
    private $conexion;

// Conectar la base de datos
    public function abrir_conexion(){
        $this->conexion = new mysqli(
            $this->db_host,
            $this->db_user,
            $this->db_pass,
            $this->db_name);
    }
// Desconectar la base de datos
    public function cerrar_conexion(){
        $this->conexion->close();
    }

// Metodo Crear, Actulizar y borrar
    public function ejecutar_query($query){
        $this->abrir_conexion();
        $ret = $this->conexion->query($query); // false o true
        $this->cerrar_conexion();
            return $ret;       // Respuesta para saber si se logro
    }

// Metodo para consultar
    public function consultar_query($query){
        $this->abrir_conexion();
        $datos = $this->conexion->query($query);
        if(isset($datos))
            $retorno = array();
            while($row = $datos->fetch_array(MYSQLI_ASSOC)){
                $retorno[] = $row;
            }
            $this->conexion->close();
            return $retorno;
/*            if (count($retorno)==1){
                return $retorno = $retorno[0];
            }
            if (count($retorno)==0 || count($retorno)==null){
                return $retorno = 0;
            }else{
                return $retorno;
            }*/
    }
}
?>