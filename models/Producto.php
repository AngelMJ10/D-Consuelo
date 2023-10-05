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

        public function listAll(){
            try {
                $query = "SELECT * FROM producto WHERE estado = 1";
                $consulta = $this->conexion->prepare($query);
                $consulta->execute();
                $datos = $consulta->fetchAll(PDO::FETCH_ASSOC);
                return $datos;
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }

        public function registerB($data = []){
            try {
                $query = "INSERT INTO producto(idmarca,producto,tipo,precio,stock) values(?,?,'B',?,?)";
                $consulta = $this->conexion->prepare($query);
                $consulta->execute(array(
                    $data['idmarca'],
                    $data['producto'],
                    $data['precio'],
                    $data['stock']
                ));
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }

        public function registerP($data = []){
            try {
                $query = "INSERT INTO producto(producto,precio,tipo) values(?,?,'P')";
                $consulta = $this->conexion->prepare($query);
                $consulta->execute(array(
                    $data['producto'],
                    $data['precio']
                ));
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }

        public function get($data = []){
            try {
                $query = "SELECT * FROM producto WHERE idproducto = ?";
                $consulta = $this->conexion->prepare($query);
                $consulta->execute(array($data['idproducto']));
                $datos = $consulta->fetch(PDO::FETCH_ASSOC);
                return $datos;
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }

        public function edit($data = []){
            try {
                $query = "UPDATE producto SET idmarca = ?, producto = ?, precio = ?, stock = ?, estado = ? where idproducto = ?";
                $consulta = $this->conexion->prepare($query);
                $consulta->execute(array(
                    $data['idmarca'],
                    $data['producto'],
                    $data['precio'],
                    $data['stock'],
                    $data['estado'],
                    $data['idproducto']
                ));
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }

    }

?>