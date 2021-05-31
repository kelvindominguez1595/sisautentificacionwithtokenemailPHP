<?php
    class Database{
        private static $dbhost = 'localhost';
        private static $dbname = 'proyectofinal_vd01136157';
        private static $dbdbuser = 'root';
        private static $dbpassword = '';

        public static $cont = null;
        public static $opciones = array(
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
            PDO::MYSQL_ATTR_FOUND_ROWS => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING
        );

        public static function Conexion(){
            
            if (null == self::$cont) {
                try{                    
                    self::$cont = new PDO("mysql:host=".self::$dbhost.";"."dbname=".self::$dbname, self::$dbdbuser, self::$dbpassword, self::$opciones);
                } catch(PDOException $e){
                    die($e->getMessage());
                }                
            } 
            return self::$cont;    
        }

        public static function Desconexion(){
            self::$cont = null;
        }
    }
?>