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
    // $host = 'localhost';
    // $dbname = 'cine';
    // $usuario = 'root';
    // $pass = '';

    // try {
    //     $conn = new PDO("mysql:host=$host;dbname=$dbname", $usuario, $pass);      
    //     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //     }

    // catch(PDOException $e)
    //     {
    //     echo "La conexión ha fallado: " . $e->getMessage();
    //         }


?>