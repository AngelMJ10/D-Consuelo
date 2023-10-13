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
                $query = "INSERT INTO pedido (idusuario) values(?)";
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

        public function get_pedido(){
            try {
                $query = "SELECT * FROM pedido ORDER BY idpedido DESC LIMIT 1";
                $consulta = $this->conexion->prepare($query);
                $consulta->execute();
                $datos = $consulta->fetch(PDO::FETCH_ASSOC);
                return $datos;
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }

        public function list(){
            try {
                $query = "SELECT ven.idventa,ped.idpedido, COUNT(dtp.idproducto) AS productos, ven.total, ven.fecha_creacion
                FROM venta ven
                INNER JOIN pedido ped ON ped.idpedido = ven.idpedido
                INNER JOIN detalle_pedido dtp ON dtp.idpedido = ped.idpedido
                INNER JOIN producto pro ON pro.idproducto = dtp.idproducto
                GROUP BY ven.idventa, ven.total, ven.fecha_creacion
                ORDER BY ven.idventa";
                $consulta = $this->conexion->prepare($query);
                $consulta->execute();
                $datos = $consulta->fetchAll(PDO::FETCH_ASSOC);
                return $datos;
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }

    }

?>