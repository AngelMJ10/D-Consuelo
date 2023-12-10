<?php
    session_start();
    require_once '../models/Producto.php';

    if (isset($_POST['op'])) {
        $producto = new Producto();

        if ($_POST['op'] == "listar") {
            $tipo = isset($_POST['tipo']) ? $_POST['tipo'] : '';
            $estado = isset($_POST['estado']) ? $_POST['estado'] : '';
            $datos = $producto->listar();
            $data = [];
            foreach ($datos as $productos) {
                if (
                    (empty($tipo)   || $tipo == $productos['tipo']) &&
                    (empty($estado) || $estado === $productos['estado']) 
                ) {
                    $data[] = $productos;
                }
            }
            echo json_encode($data);
        }

        // Trae dos registros
        if ($_POST['op'] == "list_by_ids") {
            $data = [
                "idproducto1"     => $_POST['idproducto1'],
                "idproducto2"     => $_POST['idproducto2'],
            ];
            $datos = $producto->list_by_ids($data);
            echo json_encode($datos);
        }

        // Registra los productos
        if ($_POST['op'] == "registrar") {
            // Crear un array con los datos, permitiendo valores nulos si están vacíos
            $data = [
                "idmarca"       => empty($_POST['idmarca']) ? null : $_POST['idmarca'],
                "producto"      => empty($_POST['producto']) ? null : $_POST['producto'],
                "tipo"          => empty($_POST['tipo']) ? null : $_POST['tipo'],
                "precio"        => empty($_POST['precio']) ? null : $_POST['precio'],
                "stock"         => empty($_POST['stock']) ? null : $_POST['stock']
            ];

            // Llamar al método registrar
            $producto->registrar($data);
        }

        // Busca los productos
        if ($_POST['op'] == "search") {
            $data = [
                "idproducto"        => isset($_POST['idproducto']) ? $_POST['idproducto'] : '',
                "tipo"              => isset($_POST['tipo']) ? $_POST['tipo'] : '',
                "estado"            => isset($_POST['estado']) ? $_POST['estado'] : '',
                "idmarca"           => isset($_POST['idmarca']) ? $_POST['idmarca'] : '',
                "precio"            => isset($_POST['precio']) ? $_POST['precio'] : ''
            ];
            $datos = $producto->search($data);
            echo json_encode($datos);
        }

        // Obtiene la información del producto
        if ($_POST['op'] == "get") {
            $data = ["idproducto" => $_POST['idproducto']];
            $datos = $producto->get($data);
            echo json_encode($datos);
        }

        // Edita el producto
        if ($_POST['op'] == "editar") {
            $data = [
                "idmarca"       => empty($_POST['idmarca']) ? null : $_POST['idmarca'],
                "producto"      => empty($_POST['producto']) ? null : $_POST['producto'],
                "estado"          => empty($_POST['estado']) ? null : $_POST['estado'],
                "precio"        => empty($_POST['precio']) ? null : $_POST['precio'],
                "stock"         => empty($_POST['stock']) ? null : $_POST['stock'],
                "idproducto"    => empty($_POST['idproducto']) ? null : $_POST['idproducto']
            ];
            $producto->editar($data);
        }

        // Descuenta el stock
        if ($_POST['op'] == "deleteStock") {
            $idproducto = [
                "idproducto"    => $_POST['idproducto']
            ];
            $cantidad = $_POST['cantidad'];
            $datosP = $producto->get($idproducto);
            $newStock = $datosP['stock'] - $cantidad;
            $datos = [
                "idproducto" => $_POST['idproducto'],
                "stock" => $newStock
            ];
            $producto->deleteStock($datos);
        }

        // Deshabilita el producto(datosbebida nos da los ids de los productos con stock 0)
        if ($_POST['op'] == 'disable_product') {
            $datosBebida = $producto->empty_stock();
            foreach ($datosBebida as $registro) {
                $datos = [
                    "estado" => 2,
                    "idproducto" => $registro['idproducto']
                ];
                $producto->change_estado($datos);
            }
        }

        // Cambia el estado del producto
        if ($_POST['op'] == 'change_estado') {
            $datos = [
                "estado" => $_POST['estado'],
                "idproducto" => $_POST['idproducto']
            ];
            $producto->change_estado($datos);
        }

    }

?>