<?php
    session_start();
    require_once '../models/Venta.php';
    require_once '../models/Producto.php';
    require_once '../models/Deuda.php';

    if (isset($_POST['op'])) {
        $venta = new Venta();
        $producto = new Producto();
        $deuda = new Deuda();

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
                "metodo"         => $_POST["metodo"],
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

        // Busca ventas por productos ,total y fechas limites
        if ($_POST['op'] == "search") {
            // Crear un array de datos
            $data = [
                "idusuario"         => isset($_POST['idusuario']) ? $_POST['idusuario'] : '',
                "total"             => isset($_POST['total']) ? $_POST['total'] : '',
                'fecha'             => isset($_POST['fecha']) ? $_POST['fecha'] : '',
                'fecha_inicio'      => $_POST['fecha_inicio'] . ' 00:00:00',
                'fecha_fin'         => $_POST['fecha_fin'] . ' 23:59:59',
                "metodo"            => isset($_POST['metodo']) ? $_POST['metodo'] : '',
                "estado"            => isset($_POST['estado']) ? $_POST['estado'] : ''
            ];

            // Realizar la búsqueda
            $datos = $venta->search($data);
            // Devolver los resultados como JSON
            echo json_encode($datos);
        }

        // Buscar sin fechas limites
        if ($_POST['op'] == "buscarVenta") {
            // Crear un array de datos
            $data = [
                "idusuario"         => isset($_POST['total']) ? $_POST['idusuario'] : '',
                "total"             => isset($_POST['total']) ? $_POST['total'] : '',
                'fecha'             => isset($_POST['fecha']) ? $_POST['fecha'] : '',
                "metodo"            => isset($_POST['metodo']) ? $_POST['metodo'] : '',
                "estado"            => isset($_POST['estado']) ? $_POST['estado'] : ''
            ];
        
            // Realizar la búsqueda
            $datos = $venta->buscarVenta($data);
        
            // Devolver los resultados como JSON
            echo json_encode($datos);
        }

        // Buscar por producto
        if ($_POST['op'] == "buscar_3") {
            $idusuario = isset($_POST['idusuario']) ? $_POST['idusuario'] : '';
            $idproducto = isset($_POST['idproducto']) ? $_POST['idproducto'] : '';
            $fecha_inicio = $_POST['fecha_inicio'];
            $fecha_fin = $_POST['fecha_fin'];
            $total = isset($_POST['total']) ? $_POST['total'] : '';
            $metodo = isset($_POST['metodo']) ? $_POST['metodo'] : '';
            $estado = isset($_POST['estado']) ? $_POST['estado'] : '';

            $datosV = $venta->list();
            $datosDP = $venta->listar_detalle_pedido();
            $datosP = $producto->list_All_estate();
            $datosD = $deuda->listDebt();
            $data2 = [];

            // Organizar los datos de productos y deudas por ID
            $productosPorId = [];
            $deudasPorId = [];
            
            foreach ($datosP as $producto) {
                $productosPorId[$producto['idproducto']] = $producto;
            }

            foreach ($datosD as $deuda) {
                $deudasPorId[$deuda['idventa']] = $deuda;
            }

            foreach ($datosV as $ventas) {
                foreach ($datosDP as $detallesP) {
                    // Verificar si hay una deuda asociada a esta venta
                    $deudaAsociada = isset($deudasPorId[$ventas['idventa']]);

                    if ($detallesP['idpedido'] == $ventas['idpedido'] && isset($productosPorId[$detallesP['idproducto']])) {
                        $producto = $productosPorId[$detallesP['idproducto']];
                        $fecha_creacion = $ventas['fecha_creacion'];
                        $totalPedido = $producto['precio'] * $detallesP['cantidad'];

                        if (
                            (empty($fecha_inicio) || strtotime($fecha_creacion) >= strtotime($fecha_inicio)) &&
                            (empty($fecha_fin) || strtotime($fecha_creacion) <= strtotime($fecha_fin)) &&
                            (empty($idusuario) || $idusuario == $ventas['idusuario']) &&
                            (empty($idproducto) || $idproducto == $detallesP['idproducto']) &&
                            (empty($metodo) || $metodo == $ventas['metodo']) &&
                            (empty($total) || $total == $totalPedido) &&
                            (empty($estado) || $estado == $ventas['estado'])
                        ) {
                            $datosN = [
                                "deuda" => $deudaAsociada ? 1 : 0,
                                "idventa" => $ventas['idventa'],
                                "idpedido" => $ventas['idpedido'],
                                "idDetallePedido" => $detallesP['idDetallePedido'],
                                "fecha_creacion" => $ventas['fecha_creacion'],
                                "idusuario" => $ventas['idusuario'],
                                "estado" => $ventas['estado'],
                                "metodo" => $ventas['metodo'],
                                "idproducto" => $detallesP['idproducto'],
                                "producto" => $producto['producto'],
                                "precio" => $producto['precio'],
                                "cantidad" => $detallesP['cantidad'],
                                "totalP" => $totalPedido
                            ];
                            $data2[] = $datosN;
                        }
                    }
                }
            }

            echo json_encode($data2);
        }

        //Buscar entre fechas
        if ($_POST['op'] == "buscar_1") {
            $idusuario     = isset($_POST['idusuario']) ? $_POST['idusuario'] : '';
            $fecha_inicio   = $_POST['fecha_inicio'];
            $fecha_fin      = $_POST['fecha_fin'];
            $total          = isset($_POST['total']) ? $_POST['total'] : '';
            $metodo         = isset($_POST['metodo']) ? $_POST['metodo'] : '';
            $estado         = isset($_POST['estado']) ? $_POST['estado'] : '';
        
            $datosV = $venta->list();
            $datosD = $deuda->listDebt();
            $data = [];
        
            // Crear un array asociativo para almacenar las deudas por ID de venta
            $deudasPorVenta = [];
            foreach ($datosD as $deuda) {
                $deudasPorVenta[$deuda['idventa']] = $deuda;
            }
        
            foreach ($datosV as $venta) {
                $fecha_creacion = $venta['fecha_creacion'];
                if (
                    (empty($fecha_inicio) || strtotime($fecha_creacion) >= strtotime($fecha_inicio)) &&
                    (empty($fecha_fin) || strtotime($fecha_creacion) <= strtotime($fecha_fin)) &&
                    (empty($idusuario) || $idusuario == $venta['idusuario']) &&
                    (empty($metodo) || $metodo == $venta['metodo']) &&
                    (empty($total) || $total == $venta['total']) &&
                    (empty($estado) || $estado == $venta['estado'])
                ) {
                    // Verificar si hay una deuda asociada a esta venta
                    $deudaAsociada = isset($deudasPorVenta[$venta['idventa']]);
        
                    $datosN = [
                        "deuda" => $deudaAsociada ? 1 : 0,
                        "idventa" => $venta['idventa'],
                        "idpedido" => $venta['idpedido'],
                        "fecha_creacion" => $venta['fecha_creacion'],
                        "idusuario" => $venta['idusuario'],
                        "estado" => $venta['estado'],
                        "metodo" => $venta['metodo'],
                        "productos" => $venta['productos'],
                        "total" => $venta['total']
                    ];
                    $data[] = $datosN;
                }
            }
        
            echo json_encode($data);
        }

        //Buscar por fecha
        if ($_POST['op'] == "buscar_2") {
            $idusuario     = isset($_POST['idusuario']) ? $_POST['idusuario'] : '';
            $fecha          = isset($_POST['fecha']) ? $_POST['fecha'] : '';
            $total          = isset($_POST['total']) ? $_POST['total'] : '';
            $metodo         = isset($_POST['metodo']) ? $_POST['metodo'] : '';
            $estado         = isset($_POST['estado']) ? $_POST['estado'] : '';
        
            $datosV = $venta->list();
            $datosD = $deuda->listDebt();
            $data = [];
        
            // Crear un array asociativo para almacenar las deudas por ID de venta
            $deudasPorVenta = [];
            foreach ($datosD as $deuda) {
                $deudasPorVenta[$deuda['idventa']] = $deuda;
            }
        
            foreach ($datosV as $ventas) {
                $fecha_creacion = date('Y-m-d', strtotime($ventas['fecha_creacion']));
                $fecha_inicio = date('Y-m-d', strtotime($fecha));
                if (
                    (empty($fecha)      || $fecha_creacion == $fecha_inicio) &&
                    (empty($idusuario) || $idusuario == $ventas['idusuario']) &&
                    (empty($metodo) || $metodo == $ventas['metodo']) &&
                    (empty($total) || $total == $ventas['total']) &&
                    (empty($estado) || $estado == $ventas['estado'])
                ) {
                    // Verificar si hay una deuda asociada a esta venta
                    $deudaAsociada = isset($deudasPorVenta[$ventas['idventa']]);
        
                    $datosN = [
                        "deuda" => $deudaAsociada ? 1 : 0,
                        "idventa" => $ventas['idventa'],
                        "idpedido" => $ventas['idpedido'],
                        "fecha_creacion" => $ventas['fecha_creacion'],
                        "idusuario" => $ventas['idusuario'],
                        "estado" => $ventas['estado'],
                        "metodo" => $ventas['metodo'],
                        "productos" => $ventas['productos'],
                        "total" => $ventas['total']
                    ];
                    $data[] = $datosN;
                }
            }
        
            echo json_encode($data);
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