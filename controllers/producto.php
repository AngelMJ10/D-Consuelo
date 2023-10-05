<?php

    require_once '../models/Producto.php';

    if (isset($_POST['op'])) {
        $producto = new Producto();

        if ($_POST['op'] == "list") {
            $data = ["tipo"     => $_POST['tipo']];
            $datos = $producto->list($data);
            echo json_encode($datos);
        }

        if ($_POST['op'] == "listAll") {
            $datos = $producto->listAll();
            echo json_encode($datos);
        }

        if ($_POST['op'] == "registerB") {
            $data = [
                "idmarca"       => $_POST['idmarca'],
                "producto"      => $_POST['producto'],
                "precio"        => $_POST['precio'],
                "stock"         => $_POST['stock']
            ];
            $producto->registerB($data);
        }

        if ($_POST['op'] == "registerP") {
            $data = [
                "producto"      => $_POST['producto'],
                "precio"        => $_POST['precio']
            ];
            $producto->registerP($data);
        }

        if ($_POST['op'] == "get") {
            $data = ["idproducto" => $_POST['idproducto']];
            $datos = $producto->get($data);
            echo json_encode($datos);
        }

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
    }

?>