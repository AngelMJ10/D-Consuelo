<?php

    require_once 'Conexion.php';

    class Venta extends Conexion{

        private $conexion;

        public function __construct()
        {
            $this->conexion = parent::getConexion();
        }

        public function register_Pedido($data = []){
            try {
                $query = "INSERT INTO pedido (idusuario) values(idusuario)";
                $consulta = $this->conexion->prepare($query);
                $consulta->execute(array($data['idusuario']));
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }

        public function register_Detalle_Pedido($data = []){
            try {
                $query = "INSERT INTO detalle_pedido(idpedido,idproducto,cantidad)
                VALUES(?,?,?)";
                $consulta = $this->conexion->prepare($query);
                $consulta->execute(array(
                    $data['idpedido'],
                    $data['idproducto'],
                    $data['cantidad']
                ));
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }

        public function register_Venta($data = []) {
            try {
                $query = "INSERT INTO venta(idpedido,total,idusuario)
                VALUES(?,?,?)";
                $consulta = $this->conexion->prepare($query);
                $consulta->execute(array(
                    $data['idpedido'],
                    $data['total'],
                    $data['idusuario']
                ));
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }

    }

?>