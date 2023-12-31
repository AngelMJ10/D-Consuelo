<?php

    require_once 'Conexion.php';

    class Marca extends Conexion{

        private $conexion;

        public function __construct()
        {
            $this->conexion = parent::getConexion();
        }

        public function listar(){
            try {
                $consulta = $this->conexion->prepare("SELECT * FROM marcas WHERE estado = 1 ORDER BY marca asc");
                $consulta->execute();
                $datos = $consulta->fetchAll(PDO::FETCH_ASSOC);
                return $datos;
            } catch (Exception $e) {
                die($e->getMessage());
            } 
        }

        public function obtener($data = []){
            try {
                $query = "SELECT * FROM marcas where idmarca = ?";
                $consulta = $this->conexion->prepare($query);
                $consulta->execute(array($data['idmarca']));
                $datos = $consulta->fetch(PDO::FETCH_ASSOC);
                return $datos;
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }

        public function registrar($data = []){
            try {
                $query = "INSERT INTO marcas(marca) VALUES(?)";
                $consulta = $this->conexion->prepare($query);
                $consulta->execute(array(
                    $data['marca']
                ));
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }

        public function editar($data = []){
            try {
                $query = "UPDATE marcas set marca = ?, estado = ? where idmarca = ?";
                $consulta = $this->conexion->prepare($query);
                $consulta->execute(array(
                    $data['marca'],
                    $data['estado'],
                    $data['idmarca']
                ));
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }

    }

?>