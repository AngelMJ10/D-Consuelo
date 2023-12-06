<?php
    session_start();
    require_once '../models/Deuda.php';
    require_once '../models/Venta.php';
    require '../tools/helpers.php';

    if (isset($_POST['op'])) {
        $deuda = new Deuda();
        $venta = new Venta();

        // Registra a la persona
        if ($_POST['op'] == "registerPerson") {
            $datos = [
                "nombre"            => $_POST['nombre'],
                "apellidos"         => $_POST['apellidos'],
                "telefono"          => $_POST['telefono'],
                "direccion"         => $_POST['direccion']
            ];
            $deuda->registerPerson($datos);
        }

        // Registra al deudor
        if ($_POST['op'] == "registerDebtor") {
            $datos = [
                "idpersona"                 => $_POST['idpersona'],
                "usuario_creador"           => $_SESSION['idusuario']
            ];
            $deuda->registerDebtor($datos);
        }

        // Obtiene el id de la persona registra de úlltimo
        if ($_POST['op'] == "getPersona") {
            $datos = $deuda->getPersona();
            renderJSON($datos);
        }

        // Obtiene los datos de la persona según su ID
        if ($_POST['op'] == "get") {
            $data = ["idpersona"    => $_POST['idpersona']];
            $datos = $deuda->get($data);
            renderJSON($datos);
        }

        // Obtienes los datos del deudore(pero solo de la tabla)
        if ($_POST['op'] == "getDebtor") {
            $data = ["iddeudor" => $_POST['iddeudor']];
            $datos = $deuda->get_debtor($data);
            renderJSON($datos);
        }
        
        // Edita a la persona
        if ($_POST['op'] == "edit_person") {
            $datos = [
                "nombre"            => $_POST['nombre'],
                "apellidos"         => $_POST['apellidos'],
                "telefono"          => $_POST['telefono'],
                "direccion"         => $_POST['direccion'],
                "idpersona"         => $_POST['idpersona']
            ];
            $deuda->edit_person($datos);
        }

        // Lista los deudores con los datos personales y el total de su deuda
        if ($_POST['op'] == "listDepdtors") {
            // Lista los deudores
            $datos = $deuda->listDepdtors();
            // Lista los datos de los deudores
            $datosP = $deuda->listPersons();
            // Lista las deudas de los deudores
            $datosD = $deuda->listDebt();
            // Lista las ventas
            $datosV = $venta->list();
            $data = [];
            foreach ($datos as $registro) {
                foreach ($datosP as $persona) {
                    if ($registro['idpersona'] == $persona['idpersona']) {
                        $deudor = [
                                "iddeudor"          => $registro['iddeudor'],
                                "idpersona"         => $persona['idpersona'],
                                "nombre"            => $persona['nombre'],
                                "apellidos"         => $persona['apellidos'],
                                "dni"               => $persona['dni'],
                                "telefono"          => $persona['telefono'],
                                "fecha_creacion"    => $registro['fecha_creacion'],
                                "estado"            => $registro['estado'],
                                "usuario_creador"   => $registro['usuario_creador'],
                                "aporte"            => $registro['aporte'],
                                "deudas"            => 0,
                                "total"             => 0
                        ];
                    }
                }

                $totalVentas = 0; // Inicializar el total de ventas del deudor en 0

                foreach ($datosD as $registroDeuda) {
                    if ($registro['iddeudor'] == $registroDeuda['iddeudor']) {
                        $deudor['deudas']++;
                        foreach ($datosV as $ventas) {
                            if ($registroDeuda['idventa'] == $ventas['idventa'] && $ventas['estado'] == 2) {
                                $totalVentas += $ventas['total'];
                            }
                        }
                    }
                }
                $deudor['total'] = $totalVentas;
                $data[] = $deudor;
            }
            renderJSON($data);
        }

        // Obtiene las deudas de los deudores
        if ($_POST['op'] == "get_debts") {
            $idDeudor = ["iddeudor" => $_POST['iddeudor']];
            $datos = $deuda->get_debts($idDeudor);
            $datosV = $venta->list();
            $data = [];
            foreach ($datos as $deudas) {
                foreach ($datosV as $ventas) {
                    if ($deudas['idventa'] == $ventas['idventa'] && $ventas['estado'] != 3) {
                        $datav = [
                            "idventa"           => $ventas['idventa'],
                            "iddeudor"          => $deudas['iddeudor'],
                            "iddeuda"           => $deudas['iddeuda'],
                            "productos"         => $ventas['productos'],
                            "total"             => $ventas['total'],
                            "estado"            => $deudas['estado'],
                            "fecha_creacion"    => $ventas['fecha_creacion']
                        ];

                        // Añade las deudas con estado 1 al principio del array
                        if ($deudas['estado'] == 1) {
                            array_unshift($data, $datav);
                        } else {
                            $data[] = $datav;
                        }
                    }
                }
            }
            renderJSON($data);
        }

        // Paga las deudas de un solo monto y si sobra se almacena en el aporte de los deudores
        if ($_POST['op'] == "aporte") {
            $datosDeudor = [
                "iddeudor"          => $_POST['iddeudor'],
                "aporte"            => $_POST['aporte']
            ];
            $datos = $deuda->get_debts(["iddeudor" => $datosDeudor['iddeudor']]);
            $datosV = $venta->list();
            // Obtenemos el aporte actual
            $aporteActual = $deuda->get_debtor(["iddeudor" => $datosDeudor['iddeudor']]);
            // Obtenemos el nuevo aporte total(sumando el aporte ingresado más el aporte actual)
            $totalAporte = $aporteActual['aporte'] + $datosDeudor['aporte'];
            // El aporte lo dejamos en 0
            $deuda->update_aporte(["aporte" => 0, "iddeudor" => $datosDeudor['iddeudor']]);
            // En este array estarán las deudas del deudor
            $data = [];
            foreach ($datos as $deudas) {
                foreach ($datosV as $ventas) {
                    if ($deudas['idventa'] == $ventas['idventa']) {
                        $datav = [
                            "idventa"           => $ventas['idventa'],
                            "iddeudor"          => $deudas['iddeudor'],
                            "iddeuda"           => $deudas['iddeuda'],
                            "total"             => $ventas['total'],
                            "estado"            => $deudas['estado']
                        ];
                    }
                }
                $data[] = $datav;
            }

            $dataDeudas = [];
            // Se cambia el estado de la deuda y además se guarda el aporte en caso sobre el monto
            foreach ($data as $registro) {
                if ($registro['estado'] == 1) {
                    if ($totalAporte >= $registro['total']) {
                        $dataD = [
                            "iddeuda"   => $registro['iddeuda'],
                            "total"     => $registro['total']
                            ];
                        $totalAporte -= $registro['total'];
                        // Cambia el estado de la deuda a 2
                        $deuda->change_estate_debt(["estado" => 2, "iddeuda" => $registro['iddeuda']]);
                        $venta->change_estate(["estado" => 1, "idventa" => $registro['idventa']]);
                        $dataDeudas[] = $dataD;
                    }
                }
            }

            // Lo sumamos con el aporte que sobró
            $nuevoAporte = $totalAporte;
            // Y lo actualizamos
            $deuda->update_aporte(["aporte" => $nuevoAporte, "iddeudor" => $datosDeudor['iddeudor']]);
            echo json_encode($dataDeudas);
        }

        // Obtener los datos del deudor con el id de la venta
        if ($_POST['op'] == "get_sale_debts") {
            // liista los deudores
            $datos = $deuda->listDepdtors();
            // Lista los datos de los deudores
            $datosP = $deuda->listPersons();
            // Lista las deudas de los deudores
            $datosD = $deuda->listDebt();
            $idventa = ["idventa"     => $_POST['idventa']];
            $datosV = $venta->getVenta($idventa);
            $data = [];
            foreach ($datosD as $deudas) {
                if ($idventa['idventa'] == $deudas['idventa']) {
                    $idDeudor = $deudas['iddeudor'];
                    foreach ($datos as $deudores) {
                        if ($idDeudor == $deudores['iddeudor']) {
                            foreach ($datosP as $personas) {
                                if ($deudores['idpersona'] == $personas['idpersona']) {
                                    $data = [
                                        "idpersona"         => $personas['idpersona'],
                                        "iddeudor"          => $deudores['iddeudor'],
                                        "nombre"            => $personas['nombre'],
                                        "apellidos"         => $personas['apellidos'],
                                    ];
                                }
                            }
                        }
                    }
                }
            }

            renderJSON($data);
        }

        // Busqueda de deudas que incluye fechas limites
        if ($_POST['op'] == "buscar_deudas") {
            // Recoger los datos del formulario
            $iddeudor       = isset( $_POST['iddeudor']) ? $_POST['iddeudor'] : '';
            $fecha_inicio   = $_POST['fecha_inicio'] . ' 00:00:00';
            $fecha_fin      = $_POST['fecha_fin'] . ' 23:59:59';
            $estado         = isset($_POST['estado']) ? $_POST['estado'] : '';
            $total_min      = isset($_POST['total_min']) ? $_POST['total_min'] : '';
            $total_max      = isset($_POST['total_max']) ? $_POST['total_max'] : '';

            $datos = $deuda->buscar_deudas();
            $datosV = $venta->list();
            // Inicializar $dataDeuda como un array vacío
            $dataDeuda = [];

            foreach($datos as $registro){
                foreach ($datosV as $ventas) {
                    $fecha_creacion = $registro['fecha_creacion'];
                    if ($registro['idventa'] == $ventas['idventa']) {
                        if (
                            (empty($iddeudor)       || $iddeudor        == $registro['iddeudor']) &&
                            (empty($fecha_inicio)   || $fecha_creacion  >= $fecha_inicio) &&
                            (empty($fecha_fin)      || $fecha_creacion  <= $fecha_fin) &&
                            (empty($estado)         || $estado          == $registro['estado']) &&
                            (empty($total_min)      || $total_min       <= $ventas['total']) &&
                            (empty($total_max)      || $total_max       >= $ventas['total'])
                        ){
                            $dataDeuda[] = [
                                "iddeudor"              => $registro['iddeudor'],
                                "iddeuda"               => $registro['iddeuda'],
                                "idventa"               => $ventas['idventa'],
                                "productos"             => $ventas['productos'],
                                "fecha_creacion"        => $registro['fecha_creacion'],
                                "total"                 => $ventas['total'],
                                "estado"                => $registro['estado']
                            ];
                        }
                    }
                }
            }
            renderJSON($dataDeuda);

        }

        // Busqueda que no incluye las fechas limites
        if ($_POST['op'] == "buscar_deudas2") {
            // Recoger los datos del formulario
            $iddeudor = isset($_POST['iddeudor']) ? $_POST['iddeudor'] : '';
            $fecha = isset($_POST['fecha']) ? $_POST['fecha'] : '';
            $estado = isset($_POST['estado']) ? $_POST['estado'] : '';
            $total_min = isset($_POST['total_min']) ? $_POST['total_min'] : '';
            $total_max = isset($_POST['total_max']) ? $_POST['total_max'] : '';

            // Realizar la búsqueda
            $datos = $deuda->buscar_deudas();
            $datosV = $venta->list();
            $dataDeuda = [];

            foreach ($datos as $registro) {
                foreach ($datosV as $ventas) {
                    if ($registro['idventa'] == $ventas['idventa']) {
                        $fecha_creacion = date('Y-m-d', strtotime($registro['fecha_creacion']));
                        $fecha_inicio = date('Y-m-d', strtotime($fecha));

                        if (
                            (empty($iddeudor)   || $iddeudor == $registro['iddeudor']) &&
                            (empty($fecha)      || $fecha_creacion == $fecha_inicio) &&
                            (empty($estado)     || $estado == $registro['estado']) &&
                            (empty($total_min)  || $total_min <= $ventas['total']) &&
                            (empty($total_max)  || $total_max >= $ventas['total'])
                        ) {
                            $dataDeuda[] = [
                                "iddeudor"          => $registro['iddeudor'],
                                "iddeuda"           => $registro['iddeuda'],
                                "idventa"           => $ventas['idventa'],
                                "productos"         => $ventas['productos'],
                                "fecha_creacion"    => $registro['fecha_creacion'],
                                "total"             => $ventas['total'],
                                "estado"            => $registro['estado']
                            ];
                        }
                    }
                }
            }
            // Devolver los resultados como JSON
            renderJSON($dataDeuda);
        }

        // Busqueda de deudores(incluye rango de deudas)
        if ($_POST['op'] == "search_debtors") {
            // Recoger los datos del formulario
            $iddeudor = isset( $_POST['iddeudor']) ? $_POST['iddeudor'] : '';
            $estado = isset($_POST['estado']) ? $_POST['estado'] : '';
            $total_min = isset($_POST['total_min']) ? $_POST['total_min'] : '';
            $total_max = isset($_POST['total_max']) ? $_POST['total_max'] : '';

            $datos = $deuda->search_debtors();

            // Inicializar $dataDeuda como un array vacío
            $dataDeuda = [];

            foreach ($datos as $registro) {
                if (
                    (empty($iddeudor)   || $iddeudor == $registro['iddeudor']) &&
                    (empty($estado)     || $estado == $registro['estado']) &&
                    (empty($total_min)  || $total_min <= $registro['total_ventas']) &&
                    (empty($total_max)  || $total_max >= $registro['total_ventas'])
                ) {
                    $dataDeuda[] = [
                        "iddeudor"              => $registro['iddeudor'],
                        "nombre"                => $registro['nombre'],
                        "apellidos"             => $registro['apellidos'],
                        "deudas"                => $registro['deudas'],
                        "fecha_creacion"        => $registro['fecha_creacion'],
                        "total_ventas"          => $registro['total_ventas'],
                        "estado"                => $registro['estado']
                    ];
                }
            }
        
            // Devolver los resultados como JSON
            renderJSON($dataDeuda);
        }

        // Registra la deuda
        if ($_POST['op'] == "register_debt") {
            $datosV = $venta->get_last_sale();
            $idventa = $datosV['idventa'];
            $datos_debt = $deuda->listDebt();
            $confirmar = false;
            foreach ($datos_debt as $deudas) {
                if ($idventa == $deudas['idventa']) {
                    $confirmar = true;
                }
            }

            $data = [
                "iddeudor"      => $_POST['iddeudor'],
                "idventa"       => $idventa,
                "comentario"    => $_POST['comentario']
            ];

            if ($confirmar == false) {
                $deuda->register_debt($data);
                $deuda->change_estate([
                    "iddeudor"      => $_POST['iddeudor'],
                    "estado"        => 2
                ]);
            }else{
                echo "Venta ya registrada.";
            }
        }

        // Cambia el estado de la deuda
        if ($_POST['op'] == "change_estate") {
            $datos = [
                "iddeuda"       => $_POST['iddeuda'],
                "estado"        => $_POST['estado']
            ];
            $deuda->change_estate_debt($datos);
        }

        // Cambia el estado del deudor
        if ($_POST['op'] == "change_estate_deptor") {
            $datos = [
                "estado"            => $_POST['estado'],
                "iddeudor"          => $_POST['iddeudor']
            ];
            $deuda->change_estate($datos);
        }

        // Verifica si el deudor solo tiene deudas en estado 2 para cambiarle de estado a "No debe"
        if ($_POST['op'] == "list_debtor_debts") {
            // Lista los deudores
            $datos = $deuda->listDepdtors();
            // Lista las deudas de los deudores
            $datosD = $deuda->listDebt();
        
            foreach ($datos as $deudores) {
                // Suponemos inicialmente que todas las deudas del deudor están en estado 2
                $todasDeudasEstado2 = true;
                
                foreach ($datosD as $deudas) {
                    if ($deudas['iddeudor'] == $deudores['iddeudor']) {
                        if ($deudas['estado'] != 2) {
                            // Al encontrar una deuda que no esté en estado 2, cambiamos la bandera
                            $todasDeudasEstado2 = false;
                            break; // No es necesario seguir revisando las otras deudas
                        }
                    }
                }
                
                // Si todas las deudas del deudor están en estado 2, cambiamos el estado del deudor a 2
                if ($todasDeudasEstado2) {
                    $deuda->change_estate([
                        "estado"        => 1,
                        "iddeudor"        => $deudores['iddeudor']
                    ]);
                }
            }
        }

        // PAGOS

        // Lista los pagos de los deudores
        if ($_POST['op'] == "listar_pagos") {
            $datos = $deuda->listar_pagos();
            echo json_encode($datos);
        }

        // Lista los pagos de los deudores
        if ($_POST['op'] == "registrar_pago") {

            $data = [
                "iddeudor"          => $_POST['iddeudor'],
                "pago"              => $_POST['pago'],
                "comentario"        => $_POST['comentario']
            ];
            $datos = $deuda->registrar_pago($data);
        }

        // Buscar los pagos
        if ($_POST['op'] == "buscar_pagos") {
            $iddeudor  =    isset($_POST['iddeudor']) ? $_POST['iddeudor'] : '';
            $fecha_inicio   = $_POST['fecha_inicio'] . ' 00:00:00';
            $fecha_fin      = $_POST['fecha_fin'] . ' 23:59:59';
            $estado    =    isset($_POST['estado']) ? $_POST['estado'] : '';
            $total_min =    isset($_POST['total_min']) ? $_POST['total_min'] : '';
            $total_max =    isset($_POST['total_max']) ? $_POST['total_max'] : '';

            $datosP = $deuda->listar_pagos();
            $dataPagos = [];

            foreach ($datosP as $pagos) {
                $fecha_creacion = $pagos['fecha_creacion'];
                if (
                    (empty($iddeudor)       || $iddeudor == $pagos['iddeudor']) &&
                    (empty($fecha_inicio)   || $fecha_creacion  >= $fecha_inicio) &&
                    (empty($fecha_fin)      || $fecha_creacion  <= $fecha_fin) &&
                    (empty($estado)         || $estado == $pagos['estado']) &&
                    (empty($total_min)      || $total_min <= $pagos['pago']) &&
                    (empty($total_max)      || $total_max >= $pagos['pago'])
                ) {
                    $dataPagos[] = [
                        "idpago"            => $pagos['idpago'],
                        "iddeudor"          => $pagos['iddeudor'],
                        "pago"              => $pagos['pago'],
                        "fecha_creacion"    => $pagos['fecha_creacion'],
                        "estado"            => $pagos['estado'],
                        "comentario"        => $pagos['comentario']
                    ];
                }
            }
            echo json_encode($dataPagos);
        }

    }

?>