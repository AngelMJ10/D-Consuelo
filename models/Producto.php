<?php

require_once 'Conexion.php';

    class Producto extends Conexion{
        private $conexion;

        public function __construct(){
            $this->conexion = parent::getConexion();
        }

        // Lista todo
        public function listar(){
            try {
                $query = "SELECT * FROM producto";
                $consulta = $this->conexion->prepare($query);
                $consulta->execute();
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

        // Registra un producto
        public function registrar($data = []){
            try {
                $query = "INSERT INTO producto(idmarca,producto,tipo,precio,stock) values(?,?,?,?,?)";
                $consulta = $this->conexion->prepare($query);
                $consulta->execute(array(
                    $data['idmarca'],
                    $data['producto'],
                    $data['tipo'],
                    $data['precio'],
                    $data['stock']
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
        public function editar($data = []){
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

        // Busca los productos
        public function search($data = []){
            try {
                $query = "SELECT * FROM producto
                        WHERE 1 = 1";
                $params = [];

                if (!empty($data["idproducto"])) {
                    $query .= " AND idproducto = ?";
                    $params[] = $data['idproducto'];
                }

                if (!empty($data["tipo"])) {
                    $query .= " AND tipo = ?";
                    $params[] = $data['tipo'];
                }

                if ($data['estado'] >= 0) {
                    $query .= " AND estado = ?";
                    $params[] = $data['estado'];
                }             

                if (!empty($data["idmarca"])) {
                    $query .= " AND idmarca = ?";
                    $params[] = $data['idmarca'];
                }

                if (!empty($data["precio"])) {
                    $query .= " AND precio = ?";
                    $params[] = $data['precio'];
                }

                $query .= " GROUP BY idproducto, fecha_creacion";

                $consulta = $this->conexion->prepare($query);
                $consulta->execute($params);
                $datos = $consulta->fetchAll(PDO::FETCH_ASSOC);
                return $datos;

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
        public function change_estado($data = []){
            try {
                $query = "UPDATE producto set estado = ? where idproducto = ?";
                $consulta = $this->conexion->prepare($query);
                $consulta->execute(array(
                    $data['estado'],
                    $data['idproducto']
                ));
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }

        // Habilita los productos conforme su ID
        public function active_products($data = []){
            try {
                $query = "UPDATE producto set estado = 1 where idproducto = ?";
                $consulta = $this->conexion->prepare($query);
                $consulta->execute(array($data['idproducto']));
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }

    }

?>