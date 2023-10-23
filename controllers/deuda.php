<?php
    session_start();
    require_once '../models/Deuda.php';
    require_once '../models/Venta.php';

    if (isset($_POST['op'])) {
        $deuda = new Deuda();
        $venta = new Venta();

        if ($_POST['op'] == "registerPerson") {
            $datos = [
                "nombre"            => $_POST['nombre'],
                "apellidos"         => $_POST['apellidos'],
                "dni"               => $_POST['dni'],
                "telefono"          => $_POST['telefono'],
                "direccion"         => $_POST['direccion']
            ];
            $deuda->registerPerson($datos);
        }

        if ($_POST['op'] == "registerDebtor") {
            $datos = [
                "idpersona"                 => $_POST['idpersona'],
                "usuario_creador"           => $_POST['idusuario']
            ];
            $deuda->registerDebtor($datos);
        }

        if ($_POST['op'] == "getPersona") {
            $datos = $deuda->getPersona();
            echo json_encode($datos);
        }

        if ($_POST['op'] == "listDepdtors") {
            // liista los deudores
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
                            if ($registroDeuda['idventa'] == $ventas['idventa']) {
                                $totalVentas += $ventas['total'];
                            }
                        }
                    }
                }
                $deudor['total'] = $totalVentas;
                $data[] = $deudor;
            }
            echo json_encode($data);
        }

        if ($_POST['op'] == "get_debts") {
            $idDeudor = ["iddeudor" => $_POST['iddeudor']];
            $datos = $deuda->get_debts($idDeudor);
            $datosV = $venta->list();
            $data = [];
            foreach ($datos as $deudas) {
                foreach ($datosV as $ventas) {
                    if ($deudas['idventa'] == $ventas['idventa']) {
                        $datav = [
                            "idventa"           => $ventas['idventa'],
                            "iddeudor"          => $deudas['iddeudor'],
                            "iddeuda"           => $deudas['iddeuda'],
                            "productos"         => $ventas['productos'],
                            "total"             => $ventas['total'],
                            "estado"            => $deudas['estado'],
                            "fecha_creacion"    => $ventas['fecha_creacion']
                        ];
                    }
                }
                $data[] = $datav;
            }
            echo json_encode($data);
        }

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

            echo json_encode($data);
        }

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
                $deuda->change_estate(["iddeudor"      => $_POST['iddeudor']]);
            }else{
                echo "Venta ya registrada.";
            }
        }

    }

?>