<?php
    class conexion1{
        private $servidor = "mysql:host=localhost;dbname=curso";
        private $user = "root";
        private $contrasenia = "";
        private $conexion;

        public function __construct()
        {
            try{
                $this->conexion = new PDO($this->servidor,$this->user,$this->contrasenia);
                $this->conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

            }catch(PDOException $error){
                return "hubo un error y fue: aprece algo aqui ".$error;
            }
        }
        public function ejecutar($sql){//delete/actualizar/insertar
            $this->conexion->exec($sql);
            return $this->conexion->lastInsertId();
        }
        public function consultar($sql){
            $sentencia = $this->conexion->prepare($sql);
            $sentencia->execute();
            return $sentencia->fetchAll();          
        }
    }
?>