<?php
    session_start();
    require_once '../models/Producto.php';

    if (isset($_POST['op'])) {
        $producto = new Producto();

        // Lista de un tipo de producto
        if ($_POST['op'] == "list") {
            $data = ["tipo"     => $_POST['tipo']];
            $datos = $producto->list($data);
            echo json_encode($datos);
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

        //  Lista todos los productos
        if ($_POST['op'] == "listAll") {
            $datos = $producto->listAll();
            echo json_encode($datos);
        }

        // Registra las bebidas
        if ($_POST['op'] == "registerB") {
            $data = [
                "idmarca"       => $_POST['idmarca'],
                "producto"      => $_POST['producto'],
                "precio"        => $_POST['precio'],
                "stock"         => $_POST['stock']
            ];
            $producto->registerB($data);
        }

        // Registra los platos
        if ($_POST['op'] == "registerP") {
            $data = [
                "producto"      => $_POST['producto'],
                "precio"        => $_POST['precio']
            ];
            $producto->registerP($data);
        }

        if ($_POST['op'] == "register_combo") {
            $data = [
                "producto"      => $_POST['producto'],
                "precio"        => $_POST['precio']
            ];
            $producto->register_combo($data);
        }

        // Obtiene la información del producto
        if ($_POST['op'] == "get") {
            $data = ["idproducto" => $_POST['idproducto']];
            $datos = $producto->get($data);
            echo json_encode($datos);
        }

        // Edita el producto
        if ($_POST['op'] == "edit") {
            $data = [
                "idmarca"       => $_POST['idmarca'],
                "producto"      => $_POST['producto'],
                "precio"        => $_POST['precio'],
                "stock"         => $_POST['stock'],
                "estado"        => $_POST['estado'],
                "idproducto"    => $_POST['idproducto'],
            ];
            $producto->edit($data);
        }

        // Edita el plato
        if ($_POST['op'] == "editP") {
            $data = [
                "idmarca"       => null,
                "producto"      => $_POST['producto'],
                "precio"        => $_POST['precio'],
                "stock"         => null,
                "estado"        => $_POST['estado'],
                "idproducto"    => $_POST['idproducto'],
            ];
            $producto->edit($data);
        }

        // Edita el combo
        if ($_POST['op'] == "editC") {
            $data = [
                "idmarca"       => null,
                "producto"      => $_POST['producto'],
                "precio"        => $_POST['precio'],
                "stock"         => null,
                "estado"        => $_POST['estado'],
                "idproducto"    => $_POST['idproducto'],
            ];
            $producto->edit($data);
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

        // Deshabilita el producto
        if ($_POST['op'] == 'disable_product') {
            $datosBebida = $producto->empty_stock();
            foreach ($datosBebida as $registro) {
                $datos = ["idproducto" => $registro['idproducto']];
                $producto->disable_product($datos);
            }
        }

    }

?>