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

        if ($_POST['op'] == "buscar") {
            $gastoN = isset($_POST['gastoN']) ? $_POST['gastoN'] : '';
            $idsemana = isset($_POST['idsemana']) ? $_POST['idsemana'] : '';
            $precio = isset($_POST['precio']) ? $_POST['precio'] : '';
            $tipo = isset($_POST['tipo']) ? $_POST['tipo'] : '';
            $estado = isset($_POST['estado']) ? $_POST['estado'] : '';
        
            $datos = $gasto->listar();
            $data = [];
        
            foreach ($datos as $gastos) {
                // Modificamos la condición para verificar si la subcadena está presente en gasto (insensible a mayúsculas y minúsculas)
                if (
                    (empty($gastoN) || stripos($gastos['gasto'], $gastoN) !== false) &&
                    (empty($idsemana) || $idsemana == $gastos['idsemana']) &&
                    (empty($precio) || $precio == $gastos['precio']) &&
                    (empty($tipo) || $tipo == $gastos['tipo']) &&
                    (empty($estado) || $estado == $gastos['estado'])
                ) {
                    $data[] = $gastos;
                }
            }
        
            echo json_encode($data);
        }

    }

?>