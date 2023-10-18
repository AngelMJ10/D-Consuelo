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
            $datos = $deuda->listDepdtors();
            $datosP = $deuda->listPersons();
            $datosD = $deuda->listDebt();
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
                    }else{
                        $deudor['deudas'] = 0;
                    }
                }
                $deudor['total'] = $totalVentas;
                $data[] = $deudor;
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