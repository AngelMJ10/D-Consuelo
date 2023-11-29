<?php

    require_once 'Conexion.php';

    class Venta extends Conexion{

        private $conexion;

        public function __construct()
        {
            $this->conexion = parent::getConexion();
        }

        // Registra el pedido
        public function register_Pedido($data = []){
            try {
                $query = "INSERT INTO pedido (idusuario) values(?)";
                $consulta = $this->conexion->prepare($query);
                $consulta->execute(array($data['idusuario']));
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }

        // Registra el detalle del pedido
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

        // Registra la venta
        public function register_Venta($data = []) {
            try {
                $query = "INSERT INTO venta(idpedido,total,idusuario,metodo)
                VALUES(?,?,?,?)";
                $consulta = $this->conexion->prepare($query);
                $consulta->execute(array(
                    $data['idpedido'],
                    $data['total'],
                    $data['idusuario'],
                    $data['metodo']
                ));
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }

        // Obtiene el ultimo id del pedido registrado
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

        // Lista la venta con la cantidad de productos y total
        public function list(){
            try {
                $query = "SELECT ven.idventa,ped.idpedido, COUNT(dtp.idproducto) AS productos, ven.metodo, ven.total, ven.fecha_creacion,ven.estado
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

        // Obtiene los detalles de la venta
        public function getVenta($data = []){
            try {
                $query = "SELECT ven.idventa,ped.idpedido,pro.idproducto,pro.producto,pro.precio,dtp.cantidad,
                        (pro.precio * dtp.cantidad)'total',ven.total AS 'totalV',ven.fecha_creacion,ven.estado
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

        // Para buscar las ventas por : Fecha,total ,productos y estado
        public function search($data = []) {
            try {
                $query = "SELECT ven.idventa, ped.idpedido, COUNT(dtp.idproducto) AS productos, ven.metodo, ven.total, ven.fecha_creacion, ven.estado
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
        
                if (!empty($data['fecha'])) {
                    $query .= " AND DATE(ven.fecha_creacion) = DATE(?)";
                    $params[] = $data['fecha'];
                }

                if (!empty($data['fecha_inicio']) && !empty($data['fecha_fin'])) {
                    $query .= " AND ven.fecha_creacion >= ? AND ven.fecha_creacion <= ?";
                    $params[] = $data['fecha_inicio'];
                    $params[] = $data['fecha_fin'];
                }

                if (!empty($data["metodo"])) {
                    $query .= " AND ven.metodo = ?";
                    $params[] = $data['metodo'];
                }
        
                if (!empty($data["estado"])) {
                    $query .= " AND ven.estado = ?";
                    $params[] = $data['estado'];
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

        // Para buscar las ventas por : Fecha,total ,productos y estado
        public function buscarVenta($data = []) {
            try {
                $query = "SELECT ven.idventa, ped.idpedido, COUNT(dtp.idproducto) AS productos, ven.metodo, ven.total, ven.fecha_creacion, ven.estado
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
        
                if (!empty($data['fecha'])) {
                    $query .= " AND DATE(ven.fecha_creacion) = DATE(?)";
                    $params[] = $data['fecha'];
                }

                if (!empty($data["metodo"])) {
                    $query .= " AND ven.metodo = ?";
                    $params[] = $data['metodo'];
                }
        
                if (!empty($data["estado"])) {
                    $query .= " AND ven.estado = ?";
                    $params[] = $data['estado'];
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

        // Cambia el estado 2 o 1 (es para una venta fiada)
        public function change_estate($data = []){
            try {
                $query = "UPDATE venta set estado = ? where idventa = ?";
                $consulta = $this->conexion->prepare($query);
                $consulta->execute(array(
                    $data['estado'],
                    $data['idventa']
                ));
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }

        // Registra la venta pero con estado 2
        public function register_sale_debt($data = []) {
            try {
                $query = "INSERT INTO venta(idpedido,total,metodo,idusuario,estado)
                VALUES(?,?,?,?,2)";
                $consulta = $this->conexion->prepare($query);
                $consulta->execute(array(
                    $data['idpedido'],
                    $data['total'],
                    $data['metodo'],
                    $data['idusuario']
                ));
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }

        // Obtiene el ultimo registro de la venta fiada
        public function get_last_sale(){
            try {
                $query = "SELECT * FROM venta where estado = 2 ORDER BY idventa DESC LIMIT 1";
                $consulta = $this->conexion->prepare($query);
                $consulta->execute();
                $datos = $consulta->fetch(PDO::FETCH_ASSOC);
                return $datos;
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }

        // Select * from normal de venta
        public function list_all(){
            try {
                $query = "SELECT * FROM venta";
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