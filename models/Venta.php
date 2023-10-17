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
                ORDER BY ven.fecha_creacion desc";
                $consulta = $this->conexion->prepare($query);
                $consulta->execute();
                $datos = $consulta->fetchAll(PDO::FETCH_ASSOC);
                return $datos;
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }

        public function getVenta($data = []){
            try {
                $query = "SELECT ven.idventa,ped.idpedido,pro.idproducto,pro.producto,pro.precio,dtp.cantidad,
                        (pro.precio * dtp.cantidad)'total',ven.total AS 'totalV',ven.fecha_creacion
                        FROM venta ven
                        INNER JOIN pedido ped ON ped.idpedido = ven.idpedido
                        INNER JOIN detalle_pedido dtp ON dtp.idpedido = ven.idpedido
                        INNER JOIN producto pro ON pro.idproducto = dtp.idproducto
                        WHERE idventa = ? ";
                $consulta = $this->conexion->prepare($query);
                $consulta->execute(array($data['idventa']));
                $datos = $consulta->fetchAll(PDO::FETCH_ASSOC);
                return $datos;
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }

        public function search($data = []){
            try {
                $query = "SELECT ven.idventa,ped.idpedido, COUNT(dtp.idproducto) AS productos, ven.total, ven.fecha_creacion
                FROM venta ven
                INNER JOIN pedido ped ON ped.idpedido = ven.idpedido
                INNER JOIN detalle_pedido dtp ON dtp.idpedido = ped.idpedido
                INNER JOIN producto pro ON pro.idproducto = dtp.idproducto
                WHERE 1 = 1";

                $params = [];
                if (!empty($data["idproducto"])) {
                    $query .= " AND pro.idproducto = ?";
                    $params[] = $data['idproducto'];
                }

                if (!empty($data["total"])) {
                    $query .= " AND ven.total = ?";
                    $params[] = $data['total'];
                }

                if (!empty($data["fecha"])) {
                    $query .= " AND DATE(ven.fecha_creacion) = DATE(?)";
                    $params[] = $data['fecha'];
                }

                $query .= " GROUP BY ven.idventa, ven.total, ven.fecha_creacion";

                $consulta = $this->conexion->prepare($query);
                $consulta->execute($params);
                $datos = $consulta->fetchAll(PDO::FETCH_ASSOC);
                return $datos;
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }

    }

?>