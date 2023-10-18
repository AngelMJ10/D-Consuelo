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

        if ($_POST['op'] == "register_sale_debt") {
            $data = [
                "idpedido"      => $_POST["idpedido"],
                "total"         => $_POST["total"],
                "idusuario"     => $_SESSION["idusuario"]
            ];
            $venta->register_sale_debt($data);
        }

        if ($_POST['op'] == "get_pedido") {
            echo json_encode($venta->get_pedido());
        }

        if ($_POST['op'] == "list") {
            echo json_encode($venta->list());
        }

        if ($_POST['op'] == "getVenta") {
            $data = ['idventa' => $_POST["idventa"]];
            echo json_encode($datos = $venta->getVenta($data));
        }

        if ($_POST['op'] == "search") {
            $data = [
                "idproducto"    => isset($_POST['idproducto']) ? $_POST['idproducto'] : '',
                "total"         => isset($_POST['total']) ? $_POST['total'] : '',
                "fecha"         => isset($_POST['fecha']) ? $_POST['fecha'] : ''
            ];
            $datos = $venta->search($data);
            echo json_encode($datos);
        }

    }

?>