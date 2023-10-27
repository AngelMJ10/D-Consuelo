<?php

require_once 'Conexion.php';

    class Producto extends Conexion{
        private $conexion;

        public function __construct(){
            $this->conexion = parent::getConexion();
        }

        // Listar pero solo un tipo
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

        // Listar dos registros especificos por sus ids
        public function list_by_ids($data = []){
            try {
                $query = "SELECT * FROM producto WHERE idproducto = ?
                        UNION
                        SELECT * FROM producto WHERE idproducto = ?";
                $consulta = $this->conexion->prepare($query);
                $consulta->execute(array(
                    $data['idproducto1'],
                    $data['idproducto2'],
                ));
                $datos = $consulta->fetchAll(PDO::FETCH_ASSOC);
                return $datos;
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }

        // Listar todos los tipos
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

        // Registrar Bebidas
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

        // Registrar Platos
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

        // Registra el combo o menú
        public function register_combo($data = []){
            try {
                $query = "INSERT INTO producto(producto,precio,tipo) values(?,?,'M')";
                $consulta = $this->conexion->prepare($query);
                $consulta->execute(array(
                    $data['producto'],
                    $data['precio']
                ));
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }

        // Obtiene el producto
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

        // Edita el producto
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

        //  Descuenta el stock
        public function deleteStock($data = []){
            try {
                $query = "UPDATE producto set stock = ? where idproducto = ? and tipo = 'B'";
                $consulta = $this->conexion->prepare($query);
                $consulta->execute(array(
                    $data['stock'],
                    $data['idproducto']
                ));
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }

        // Detecta los productos de stock 0
        public function empty_stock(){
            try {
                $query = "SELECT * FROM producto where stock = 0 and tipo = 'B'";
                $consulta = $this->conexion->prepare($query);
                $consulta->execute();
                $datos = $consulta->fetchAll(PDO::FETCH_ASSOC);
                return $datos;
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }

        // Inhabilita los productos de stock 0
        public function disable_product($data = []){
            try {
                $query = "UPDATE producto set estado = 0 where idproducto = ?";
                $consulta = $this->conexion->prepare($query);
                $consulta->execute(array(
                    $data['idproducto']
                ));
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }


    }

?>