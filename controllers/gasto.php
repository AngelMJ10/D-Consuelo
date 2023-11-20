<?php
    session_start();
    require_once '../models/Gasto.php';

    if (isset($_POST['op'])) {
        $gasto = new Gasto();

        if ($_POST['op'] == 'listar') {
            $datos = $gasto->listar();
            echo json_encode($datos);
        }

        if ($_POST['op'] == 'obtener') {
            $idgasto = ["idgasto"  => $_POST['idgasto']];
            $datos = $gasto->obtener($idgasto);
            echo json_encode($datos);
        }

        if ($_POST['op'] == 'registrar') {
            $data = [
                        "idsemana"  => $_POST['idsemana'],
                        "gasto"     => $_POST['gasto'],
                        "tipo"      => $_POST['tipo'],
                        "precio"    => $_POST['precio']
                    ];
            $datos = $gasto->registrar($data);
        }

        if ($_POST['op'] == 'editar') {
            $data = [
                    "idsemana"          => $_POST['idsemana'],
                    "gasto"             => $_POST['gasto'],
                    "tipo"              => $_POST['tipo'],
                    "precio"            => $_POST['precio'],
                    "estado"             => $_POST['estado'],
                    "idgasto"           => $_POST['idgasto']
                    ];
            $datos = $gasto->editar($data);
        }

    }

?>