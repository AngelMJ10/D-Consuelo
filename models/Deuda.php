<?php

require_once 'Conexion.php';

    class Deuda extends Conexion {

        private $conexion;

        public function __construct()
        {
            $this->conexion = parent::getConexion();
        }

        // Registra una nueva persona
        public function registerPerson($data = []){
            try {
                $query = "INSERT INTO persona(nombre,apellidos,telefono,direccion)
                VALUES(?,?,?,?)";
                $consulta = $this->conexion->prepare($query);
                $consulta->execute(array(
                    $data['nombre'],
                    $data['apellidos'],
                    $data['telefono'],
                    $data['direccion']
                ));
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }

        // Registra un nuevo deudor
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

        // Obtiene el id de la última persona registrada
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

        // Obtiene los datos segund el id de la persona
        public function get($data = []){
            try {
                $query = "SELECT * FROM persona where idpersona = ?";
                $consulta = $this->conexion->prepare($query);
                $consulta->execute(array($data['idpersona']));
                $datos = $consulta->fetch(PDO::FETCH_ASSOC);
                return $datos;
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }

        // Edita a la persona
        public function edit_person($data = []){
            try {
                $query = "UPDATE persona set nombre = ?, apellidos = ?, telefono = ?, direccion = ? WHERE idpersona = ?";
                $consulta = $this->conexion->prepare($query);
                $consulta->execute(array(
                    $data['nombre'],
                    $data['apellidos'],
                    $data['telefono'],
                    $data['direccion'],
                    $data['idpersona']
                ));
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
                $query = "UPDATE deudores set estado = ? where iddeudor = ?";
                $consulta = $this->conexion->prepare($query);
                $consulta->execute(array(
                    $data['iddeudor'],
                    $data['estado']
                ));
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }

        // Cambiar el estado del deudor a 2 si en caso este esté en 1
        public function change_estate_debt($data = []){
            try {
                $query = "UPDATE deuda set estado = ? where iddeuda = ?";
                $consulta = $this->conexion->prepare($query);
                $consulta->execute(array(
                    $data['estado'],
                    $data['iddeuda']
                ));
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }

        // Registra una deeuda
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