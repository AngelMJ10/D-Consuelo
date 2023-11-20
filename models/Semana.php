<?php

    require_once 'Conexion.php';

    class Semana extends Conexion{

        private $conexion;

        public function __construct()
        {
            $this->conexion = parent::getConexion();
        }

        public function listar(){
            try {
                $consulta = $this->conexion->prepare("SELECT * FROM semana");
                $consulta->execute();
                $datos = $consulta->fetchAll(PDO::FETCH_ASSOC);
                return $datos;
            } catch (Exception $e) {
                die($e->getMessage());
            } 
        }

        public function obtener($data = []){
            try {
                $query = "SELECT * FROM semana where idsemana = ?";
                $consulta = $this->conexion->prepare($query);
                $consulta->execute(array($data['idsemana']));
                $datos = $consulta->fetch(PDO::FETCH_ASSOC);
                return $datos;
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }

        public function registrar($data = []){
            try {
                $query = "INSERT INTO semana(fecha_inicio,fecha_fin) VALUES(?,?)";
                $consulta = $this->conexion->prepare($query);
                $consulta->execute(array(
                    $data['fecha_inicio'],
                    $data['fecha_fin']
                ));
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }

        public function editar($data = []){
            try {
                $query = "UPDATE semana set fecha_inicio = ?, fecha_fin = ?, estado = ? where idsemana = ?";
                $consulta = $this->conexion->prepare($query);
                $consulta->execute(array(
                    $data['fecha_inicio'],
                    $data['fecha_fin'],
                    $data['estado'],
                    $data['idsemana']
                ));
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }

    }

?>