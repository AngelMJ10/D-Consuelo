<?php

    require_once '../models/Producto.php';

    if (isset($_POST['op'])) {
        $producto = new Producto();

        if ($_POST['op'] == "list") {
            $data = ["tipo"     => $_POST['tipo']];
            $datos = $producto->list($data);
            echo json_encode($datos);
        }
    }

?>