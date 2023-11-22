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

        if ($_POST['op'] == 'search') {
            $data = [
                'gasto'     => isset($_POST['gasto']) ? $_POST['gasto'] : '',
                'idsemana'  => isset($_POST['idsemana']) ? $_POST['idsemana'] : '',
                'precio'    => isset($_POST['precio']) ? $_POST['precio'] : '',
                'tipo'      => isset($_POST['tipo']) ? $_POST['tipo'] : '',
                'estado'    => isset($_POST['estado']) ? $_POST['estado'] : ''
            ];
        
            $resultados = $gasto->search($data);
        
            // Puedes hacer algo con los resultados, como imprimirlos o devolverlos como JSON
            echo json_encode($resultados);
        }
        

    }

?>