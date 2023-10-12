<?php
    session_start();
    require_once '../models/Venta.php';

    if (isset($_POST['op'])) {
        $venta = new Venta();

        if ($_POST['op'] == 'register_Pedido') {
            $data = ["idusuario" => $_SESSION["idusuario"]];
            $venta->register_Pedido($data);
        }

        if ($_POST['op'] == "register_Detalle_Pedido") {
            $data = [
                "idpedido"      => $_POST["idpedido"],
                "idproducto"    => $_POST["idproducto"],
                "cantidad"      => $_POST["cantidad"]
            ];
            $venta->register_Detalle_Pedido($data);
        }

        if ($_POST['op'] == "register_Venta") {
            $data = [
                "idpedido"      => $_POST["idpedido"],
                "total"         => $_POST["total"],
                "idusuario"     => $_SESSION["idusuario"]
            ];
            $venta->register_Venta($data);
        }

        if ($_POST['op'] == "get_pedido") {
            echo json_encode($venta->get_pedido());
        }

    }

?>