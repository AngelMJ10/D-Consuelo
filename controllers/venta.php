<?php
    session_start();
    require_once '../models/Venta.php';

    if (isset($_POST['op'])) {
        $venta = new Venta();

        // Registra el pedido
        if ($_POST['op'] == 'register_Pedido') {
            $data = ["idusuario" => $_SESSION["idusuario"]];
            $venta->register_Pedido($data);
        }

        // Registra los detalles del pedido
        if ($_POST['op'] == "register_Detalle_Pedido") {
            $data = [
                "idpedido"      => $_POST["idpedido"],
                "idproducto"    => $_POST["idproducto"],
                "cantidad"      => $_POST["cantidad"]
            ];
            $venta->register_Detalle_Pedido($data);
        }

        // Registra una venta normal
        if ($_POST['op'] == "register_Venta") {
            $data = [
                "idpedido"      => $_POST["idpedido"],
                "total"         => $_POST["total"],
                "idusuario"     => $_SESSION["idusuario"],
                "metodo"        => $_POST['metodo']
            ];
            $venta->register_Venta($data);
        }

        // Registra una venta fiada
        if ($_POST['op'] == "register_sale_debt") {
            $data = [
                "idpedido"      => $_POST["idpedido"],
                "total"         => $_POST["total"],
                "idusuario"     => $_SESSION["idusuario"]
            ];
            $venta->register_sale_debt($data);
        }

        // Cambia el estado
        if ($_POST['op'] == "change_estate") {
            $data = [
                "estado"        => $_POST["estado"],
                "idventa"       => $_POST["idventa"],
            ];
            $venta->change_estate($data);
        }

        // Obtiene el ultimo pedido registrado
        if ($_POST['op'] == "get_pedido") {
            echo json_encode($venta->get_pedido());
        }

        // Lista las ventas
        if ($_POST['op'] == "list") {
            echo json_encode($venta->list());
        }

        // Obtiene los datos de la venta
        if ($_POST['op'] == "getVenta") {
            $data = ['idventa' => $_POST["idventa"]];
            echo json_encode($datos = $venta->getVenta($data));
        }

        // Busca ventas por productos ,total y fechas
        if ($_POST['op'] == "search") {
            // Validar y limpiar los datos del formulario
            $idproducto = isset($_POST['idproducto']) ? $_POST['idproducto'] : '';
            $total = isset($_POST['total']) ? $_POST['total'] : '';
            $fecha = isset($_POST['fecha']) ? $_POST['fecha'] . ' 00:00:00' : '';
            $metodo = isset($_POST['metodo']) ? $_POST['metodo'] : '';
            $estado = isset($_POST['estado']) ? $_POST['estado'] : '';
        
            // Crear un array de datos
            $data = [
                "idproducto"    => $idproducto,
                "total"         => $total,
                'fecha'         => $fecha,
                "metodo"        => $metodo,
                "estado"        => $estado
            ];
        
            // Realizar la búsqueda
            $datos = $venta->search($data);
        
            // Devolver los resultados como JSON
            echo json_encode($datos);
        }
        

        // Calcula el total del día
        if ($_POST['op'] == "total_day") {
            $datos = $venta->list_all();
            $data = [];
            $fecha_actual = date("Y-m-d");
            $totalVentas = 0;
        
            foreach ($datos as $ventas) {
                $fecha_venta = date("Y-m-d", strtotime($ventas['fecha_creacion'])); // Convierte a 'Y-m-d'
                
                if ($fecha_venta == $fecha_actual) {
                    $totalVentas += $ventas['total'];
                }
            }
        
            $data['total'] = $totalVentas;
            echo json_encode($data);
        }

    }

?>