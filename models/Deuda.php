<?php

require_once 'Conexion.php';

    class Deuda extends Conexion {

        private $conexion;

        public function __construct()
        {
            $this->conexion = parent::getConexion();
        }

        public function registerPerson($data = []){
            try {
                $query = "INSERT INTO persona(nombre,apellidos,dni,telefono,direccion)
                VALUES(?,?,?,?,?)";
                $consulta = $this->conexion->prepare($query);
                $consulta->execute(array(
                    $data['nombre'],
                    $data['apellidos'],
                    $data['dni'],
                    $data['telefono'],
                    $data['direccion']
                ));
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }

        public function registerDebtor($data = []){
            try {
                $query = "INSERT INTO deudores(idpersona,usuario_creador)
                values(?,?)";
                $consulta = $this->conexion->prepare($query);
                $consulta->execute(array(
                    $data['idpersona'],
                    $data['usuario_creador'],
                ));
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }

        public function getPersona(){
            try {
                $query = "SELECT * FROM persona ORDER BY idpersona DESC limit 1";
                $consulta = $this->conexion->prepare($query);
                $consulta->execute();
                $datos = $consulta->fetch(PDO::FETCH_ASSOC);
                return $datos;
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }

        // Lista deudores
        public function listDepdtors(){
            try {
                $query = "SELECT * FROM deudores";
                $consulta = $this->conexion->prepare($query);
                $consulta->execute();
                $datos = $consulta->fetchAll(PDO::FETCH_ASSOC);
                return $datos;
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }

        // Lista personas
        public function listPersons(){
            try {
                $query = "SELECT * FROM persona where estado = 1";
                $consulta = $this->conexion->prepare($query);
                $consulta->execute();
                $datos = $consulta->fetchAll(PDO::FETCH_ASSOC);
                return $datos;
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }

        // Lista las deudas
        public function listDebt(){
            try {
                $query = "SELECT * FROM deuda";
                $consulta = $this->conexion->prepare($query);
                $consulta->execute();
                $datos = $consulta->fetchAll(PDO::FETCH_ASSOC);
                return $datos;
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }

        // Lista las deudas por el iddeudor
        public function get_debts($data = []){
            try {
                $query = "SELECT * FROM deuda WHERE iddeudor = ?";
                $consulta = $this->conexion->prepare($query);
                $consulta->execute(array($data['iddeudor']));
                $datos = $consulta->fetchAll(PDO::FETCH_ASSOC);
                return $datos;
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }

        // Cambiar el estado del deudor a 2 si en caso este esté en 1
        public function change_estate($data = []){
            try {
                $query = "UPDATE deudores set estado = 2 where iddeudor = ?";
                $consulta = $this->conexion->prepare($query);
                $consulta->execute(array($data['iddeudor']));
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }

        public function register_debt($data = []){
            try {
                $query = "INSERT INTO deuda (iddeudor,idventa,comentario)
                VALUES(?,?,?)";
                $consulta = $this->conexion->prepare($query);
                $consulta->execute(array(
                    $data['iddeudor'],
                    $data['idventa'],
                    $data['comentario']
                ));
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }

    }

?>