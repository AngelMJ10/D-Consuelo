<?php

require_once 'Conexion.php';

    class Producto extends Conexion{
        private $conexion;

        public function __construct(){
            $this->conexion = parent::getConexion();
        }

        public function list($data = []){
            try {
                $query = "SELECT * FROM producto WHERE tipo = ? and estado = 1";
                $consulta = $this->conexion->prepare($query);
                $consulta->execute(array($data['tipo']));
                $datos = $consulta->fetchAll(PDO::FETCH_ASSOC);
                return $datos;
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }

    }

?>