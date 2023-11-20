<?php

    require_once 'Conexion.php';

    class Gasto extends Conexion{

        private $conexion;

        public function __construct()
        {
            $this->conexion = parent::getConexion();
        }

        public function listar(){
            try {
                $consulta = $this->conexion->prepare("SELECT * FROM gastos");
                $consulta->execute();
                $datos = $consulta->fetchAll(PDO::FETCH_ASSOC);
                return $datos;
            } catch (Exception $e) {
                die($e->getMessage());
            } 
        }

        public function obtener($data = []){
            try {
                $query = "SELECT * FROM gastos where idgasto = ?";
                $consulta = $this->conexion->prepare($query);
                $consulta->execute(array($data['idgasto']));
                $datos = $consulta->fetch(PDO::FETCH_ASSOC);
                return $datos;
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }

        public function registrar($data = []){
            try {
                $query = "INSERT INTO gastos(idsemana,gasto,tipo,precio) VALUES(?,?,?,?)";
                $consulta = $this->conexion->prepare($query);
                $consulta->execute(array(
                    $data['idsemana'],
                    $data['gasto'],
                    $data['tipo'],
                    $data['precio']
                ));
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }

        public function editar($data = []){
            try {
                $query = "UPDATE gastos set idsemana = ?, gasto = ?, tipo = ?, precio = ?, estado = ? where idgasto = ?";
                $consulta = $this->conexion->prepare($query);
                $consulta->execute(array(
                    $data['idsemana'],
                    $data['gasto'],
                    $data['tipo'],
                    $data['precio'],
                    $data['estado'],
                    $data['idgasto']
                ));
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }

    }

?>