<?php
    session_start();
    require_once '../models/Semana.php';

    if (isset($_POST['op'])) {
        $semana = new Semana();

        if ($_POST['op'] == 'listar') {
            $datos = $semana->listar();
            echo json_encode($datos);
        }

        if ($_POST['op'] == 'obtener') {
            $idgasto = ["idsemana"  => $_POST['idsemana']];
            $datos = $semana->obtener($idgasto);
            echo json_encode($datos);
        }

        if ($_POST['op'] == 'registrar') {
            $data = [
                        "fecha_inicio"      => $_POST['fecha_inicio'],
                        "fecha_fin"         => $_POST['fecha_fin']
                    ];
            $datos = $semana->registrar($data);
        }

        if ($_POST['op'] == 'editar') {
            $data = [
                    "fecha_inicio"       => $_POST['fecha_inicio'],
                    "fecha_fin"          => $_POST['fecha_fin'],
                    "estado"             => $_POST['estado'],
                    "idsemana"           => $_POST['idsemana']
                    ];
            $datos = $semana->editar($data);
        }

    }

?>