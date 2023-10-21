<?php require_once './permisos.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/24503cbed7.js" crossorigin="anonymous"></script>
    <title>Caja</title>
</head>
<body>
<link rel="stylesheet" href="./css/style.css">

    <style>
        /* Estilo para el contenedor del carrito */
        #carrito-contenedor {
            position: fixed;
            bottom: 20px;
            right: 20px;
            cursor: pointer;
            z-index: 999;
            transition: transform 0.2s ease-in-out;
        }

        /* Estilo para el icono del carrito */
        #carrito {
            width: 60px;
            height: 60px;
        }

        /* Estilo para el contador (burbuja) */
        .carrito-cantidad {
            position: absolute;
            top: -10px; /* Ajusta la posición vertical para que esté encima del icono */
            right: -10px; /* Ajusta la posición horizontal para que esté a la derecha del icono */
            background-color: red;
            color: white;
            border-radius: 50%;
            padding: 4px 8px;
            font-size: 14px;
        }
        /* Estilo para el carrito con animación */
        .carrito-burbuja {
            transition: transform 0.2s ease-in-out; /* Mantén la animación */
        }

        /* Agrega la escala en hover solo al icono del carrito */
        .carrito-burbuja:hover #carrito {
            transform: scale(1.1);
        }

        /* Estilos normales para la tarjeta */
        .card {
            background-color: #fff;
            border: 1px solid #ccc;
            transition: background-color 0.3s, border-color 0.3s;
        }

        /* Estilos cuando el mouse flota sobre la tarjeta */
        .card:hover {
            background-color: #f0f0f0;
            border: 1px solid #00cc00;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
            transform: scale(1.04);
        }

    </style>
    
    <div id="carrito-contenedor" class="carrito-burbuja">
        <i id="carrito" class="fa-solid fa-cart-shopping fa-2xl carrito-burbuja" alt="Carrito de compras"></i>
        <span id="carritoCantidad" class="carrito-cantidad">0</span>
    </div>

    <button type="button" class="btn btn-outline-primary mt-3" id="bebidas-vista">Bebidas <i class="fa-solid fa-wine-bottle"></i></button>
    <button type="button" class="btn btn-outline-success mt-3" id="platos-vista">Platos <i class="fa-solid fa-bowl-food"></i></button>
    <div id="lista-bebidas"></div>
    <div id="lista-platos"></div>

    <div class="modal fade" id="modal-carrito" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Carrito</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                
                <div class="table-responsive">
                    <table class="table table-hover" id="tabla-carrito">
                        <thead>
                            <th>#</th>
                            <th>Comida</th>
                            <th>Precio S/.</th>
                            <th>Cantidad</th>
                            <th>Total S/.</th>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-floating mb-3">
                            <input type="number" class="form-control" id="total" name="precio" placeholder="Precio">
                            <label for="precio" class="form-label">Total S/.</label>
                        </div>
                    </div>
                </div>

                <div class="row d-none" id="venta-deuda">

                    <div class="col-md-4">
                        <div class="form-floating mb-3">
                            <select class="form-control" name="" id="deudores">
                            </select>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-floating mb-3">
                            <textarea class="form-control" id="comentario" placeholder="comentario" name="comentario"></textarea>
                            <label for="comentario" class="form-label">Comentario</label>
                        </div>
                    </div>
                </div>

                <button type="button" class="btn btn-outline-primary" id="realizar-venta">Realizar Venta</button>
                <button type="button" class="btn btn-outline-warning" id="btn-fiar">Fiar</button>
                <button type="button" class="btn btn-outline-success d-none" id="prueba">Realizar Prueba</button>
                <button type="button" class="btn btn-outline-warning d-none" id="btn-venta-normal">Venta Normal</button>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
            </div>
        </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="js/caja.js"></script>
</body>
</html>