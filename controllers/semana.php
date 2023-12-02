<?php
    session_start();
    require_once '../models/Semana.php';
    require_once '../models/Gasto.php';
    require_once '../models/Venta.php';
    require '../tools/helpers.php';

    if (isset($_POST['op'])) {
        $semana = new Semana();
        $gasto = new Gasto();
        $venta = new Venta();

        // Lista las semanas con el total de gastos de la semana y el total de ventas de la semana
        if ($_POST['op'] == 'listar') {
            $datos = [];
            $datoS = $semana->listar();
            $datosG = $gasto->listar();
            $datosV = $venta->list();

            // Recorre las semanas
            foreach ($datoS as $semanas) {
                $idSemana = $semanas['idsemana'];
                $totalG = 0;
                $totalV = 0;
                $totalD = 0;

                // Recorre los gastos para agregar el total de gastos
                foreach ($datosG as $gastos) {
                    if ($idSemana == $gastos['idsemana'] && $gastos['estado'] == 1) {
                        $totalG += $gastos['precio'];
                    }
                }

                // Recorre las ventas para agregar el total de venta pagadas
                foreach ($datosV as $ventas) {
                    // Verificar si la fecha de creación está dentro del rango de la semana
                    $fechaCreacion = strtotime($ventas['fecha_creacion']);
                    $fechaInicioSemana = strtotime($semanas['fecha_inicio']);
                    $fechaFinSemana = strtotime($semanas['fecha_fin']);
                    
                    if ($ventas['estado'] == 1) {
                        if ($fechaCreacion >= $fechaInicioSemana && $fechaCreacion <= $fechaFinSemana && $ventas['idusuario'] == 5) {
                            $totalV += $ventas['total']; // Ajusta esto según la estructura real de tus datos de ventas
                        }
                    }

                    if ($ventas['estado'] == 1 && $ventas['idusuario'] == 6) {
                        if ($fechaCreacion >= $fechaInicioSemana && $fechaCreacion <= $fechaFinSemana) {
                            $totalD += $ventas['total']; // Ajusta esto según la estructura real de tus datos de ventas
                        }
                    }

                }

                $datosGastosS = [
                    "idsemana"          => $semanas['idsemana'],
                    "fecha_inicio"      => $semanas['fecha_inicio'],
                    "fecha_fin"         => $semanas['fecha_fin'],
                    "estado"            => $semanas['estado'],
                    "gastos"            => $totalG,
                    "ventas"            => $totalV,
                    "domingo"            => $totalD
                ];

                $datos[] = $datosGastosS;
            }
            echo json_encode($datos);
        }

        // Buscar las semanas (incluye fechas limites)
        if ($_POST['op'] == 'buscar') {
            $datos = [];
            $datoS = $semana->listar();
            $datosG = $gasto->listar();
            $datosV = $venta->list();
            $fecha_inicio = $_POST['fecha_inicio'];
            $fecha_fin = $_POST['fecha_fin'];
            $estado = isset($_POST['estado']) ? $_POST['estado'] : '';

            // Recorre las semanas
            foreach ($datoS as $semanas) {
                $fecha_creacion = $semanas['fecha_inicio'];
                $idSemana = $semanas['idsemana'];
                $totalG = 0;
                $totalV = 0;
                $totalD = 0;
        
                if (
                    (empty($fecha_inicio)   || strtotime($fecha_creacion) >= strtotime($fecha_inicio)) &&
                    (empty($fecha_fin)      || strtotime($fecha_creacion) <= strtotime($fecha_fin)) &&
                    (empty($estado)         || $estado === $semanas['estado'])
                ) {
                    // Recorre los gastos para agregar el total de gastos
                    foreach ($datosG as $gastos) {
                        if ($idSemana == $gastos['idsemana'] && $gastos['estado'] == 1) {
                            $totalG += $gastos['precio'];
                        }
                    }
        
                    // Recorre las ventas para agregar el total de venta pagadas
                    foreach ($datosV as $ventas) {
                        // Verificar si la fecha de creación está dentro del rango de la semana
                        $fechaCreacion = strtotime($ventas['fecha_creacion']);
                        $fechaInicioSemana = strtotime($semanas['fecha_inicio']);
                        $fechaFinSemana = strtotime($semanas['fecha_fin']);
        
                        if ($ventas['estado'] == 1) {
                            if ($fechaCreacion >= $fechaInicioSemana && $fechaCreacion <= $fechaFinSemana && $ventas['idusuario'] == 5) {
                                $totalV += $ventas['total'];
                            }
                        }
        
                        if ($ventas['estado'] == 1 && $ventas['idusuario'] == 6) {
                            if ($fechaCreacion >= $fechaInicioSemana && $fechaCreacion <= $fechaFinSemana) {
                                $totalD += $ventas['total'];
                            }
                        }
                    }
        
                    $datosGastosS = [
                        "idsemana" => $semanas['idsemana'],
                        "fecha_inicio" => $semanas['fecha_inicio'],
                        "fecha_fin" => $semanas['fecha_fin'],
                        "estado" => $semanas['estado'],
                        "gastos" => $totalG,
                        "ventas" => $totalV,
                        "domingo" => $totalD
                    ];
        
                    $datos[] = $datosGastosS;
                }
            }
            echo json_encode($datos);
        }

        // Obtienes los gastos de la semana con el ID de la semana
        if ($_POST['op'] == 'obtener') {
            $datos = [];
            $idSemana = ["idsemana"  => $_POST['idsemana']];
            $datosG = $gasto->listar();
            foreach ($datosG as $gastos) {
                if ($idSemana['idsemana'] == $gastos['idsemana']) {
                    $gastosSemana = [
                        "idgasto"               => $gastos['idgasto'],
                        "idsemana"              => $gastos['idsemana'],
                        "gasto"                 => $gastos['gasto'],
                        "precio"                => $gastos['precio'],
                        "tipo"                  => $gastos['tipo'],
                        "estado"                => $gastos['estado'],
                        "fecha_creacion"        => $gastos['fecha_creacion']
                    ];
                    $datoS[] = $gastosSemana;
                }
            }
            
            echo json_encode($datoS);
        }

        // Obtiene los datos de la semana
        if ($_POST['op'] == 'get') {
            $idSemana = ["idsemana"  => $_POST['idsemana']];
            $datos = $semana->obtener($idSemana);
            echo json_encode($datos);
        }

        // Registra la semana
        if ($_POST['op'] == 'registrar') {
            $data = [
                        "fecha_inicio"      => $_POST['fecha_inicio'],
                        "fecha_fin"         => $_POST['fecha_fin']
                    ];
            $datos = $semana->registrar($data);
        }

        // Edita la semana
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