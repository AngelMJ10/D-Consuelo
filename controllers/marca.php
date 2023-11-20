<?php
    session_start();
    require_once '../models/Marca.php';

    if (isset($_POST['op'])) {
        $marca = new Marca();

        if ($_POST['op'] == 'listar') {
            $datos = $marca->listar();
            echo json_encode($datos);
        }

        if ($_POST['op'] == 'obtener') {
            $idbebida = ["idmarca"  => $_POST['idmarca']];
            $datos = $marca->obtener($idbebida);
            echo json_encode($datos);
        }

        if ($_POST['op'] == 'registrar') {
            $data = [
                        "marca"   => $_POST['marca']
                    ];
            $datos = $marca->registrar($data);
        }

        if ($_POST['op'] == 'editar') {
            $data = [   
                    "marca"         => $_POST['marca'],
                    "estado"         => $_POST['estado'],
                    "idmarca"       => $_POST['idmarca']
                    ];
            $datos = $marca->editar($data);
        }

    }

?>