<?php

class Conexion{
    public static function Conectar() {
        define('servidor', 'localhost');
        define('dbname', 'cine');
        define('usuario', 'root');
        define('pass', '');
        $opciones = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
        try{
            $conn = new PDO("mysql:host=".servidor."; dbname=".dbname, usuario, pass, $opciones);
            return $conn;
        } catch (Exception $e) {
            die("Error de conexión: ". $e->getMessage());
        }
    }
}

if (isset($_GET['anio']) && !empty($_GET['anio'])) {
    $objeto = new Conexion();
    $conexion = $objeto->Conectar();

    $consulta = 'SELECT * FROM peliculas WHERE anio = '.$_GET['anio'];
    $resultado = $conexion->prepare($consulta);
    $resultado->execute();
    $data = $resultado->fetchAll(PDO::FETCH_ASSOC);

    if (!empty($data)){
        echo(json_encode($data,JSON_UNESCAPED_UNICODE));
        $conexion = null;
    }else{
        echo "No hay películas de ese año en la cartelera";
    }
}else{
    echo "Error";
};

?>