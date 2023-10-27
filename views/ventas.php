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
    <title>Fases</title>
</head>
<body>
<link rel="stylesheet" href="./css/style.css">
    <style>
        .table-responsive {
            max-height: 300px; /* Establece la altura máxima que deseas para el contenedor */
            overflow-y: auto; /* Agrega una barra de desplazamiento vertical cuando sea necesario */
        }
    </style>
    <div class="capa text-center">
        <h1>Ventas</h1>
    </div>
    <div class="container py-5">
        <!-- Navs -->
        <ul class="nav nav-tabs mb-4" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="listar-tab" data-bs-toggle="tab" href="#listar" role="tab" aria-controls="listar" aria-selected="true">Listar</a>
            </li>
        </ul>

        <!-- Tabs -->
        <div class="tab-content" id="myTabContent">

        <div class="tab-pane fade show active" id="listar" role="tabpanel" aria-labelledby="listar-tab">

            <div class="accordion" id="acordion1">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#filtros" aria-expanded="true" aria-controls="collapseOne">
                        Filtros
                        </button>
                    </h2>
                    <div id="filtros" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#acordion1">
                        <div class="accordion-body">
                            <form>
                                <div class="row mb-2 mt-2">

                                    <div class="col-md-3">
                                        <div class="form-floating mb-3">
                                            <select class="form-control" name="" id="producto-buscar">
                                                <option value="0">Seleccione un producto</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-floating mb-3">
                                            <input type="number" class="form-control" id="total-buscar" name="Plato" placeholder="Plato">
                                            <label for="total" class="form-label">Total</label>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-floating mb-3">
                                            <input type="date" class="form-control" id="fecha-buscar" name="precio" placeholder="Precio">
                                            <label for="precio" class="form-label">Fecha</label>
                                        </div>
                                    </div>

                                    
                                    <div class="col-md-3">
                                        <div class="form-floating mb-3">
                                            <select class="form-control" name="" id="estado-buscar">
                                                <option value="0">Seleccione un estado</option>
                                                <option value="1">Pagado</option>
                                                <option value="2">Fiado</option>
                                            </select>
                                        </div>
                                    </div>

                                </div>
                                <button type="button" id="buscar-venta"  class="btn btn-outline-primary">Buscar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="table-responsive mt-3" id="tabla-ventas">
                <table class="table table-hover text-center"> 

                    <thead>
                        <th>#</th>
                        <th>Productos</th>
                        <th>Fecha</th>
                        <th>Total</th>
                        <th>Estado</th>
                        <th>Acción</th>
                    </thead>

                    <tbody id="scrollable-tbody"></tbody>
                
                </table>
            </div>

            <div class="row mt-3">
                <div class="col-md-3">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="total_day" readonly name="total" placeholder="Total del día">
                        <label for="precio" class="form-label">Total de día:</label>
                    </div>
                </div>
            </div>
            
        </div>

        </div>

    </div>

    <div class="modal fade" id="modal-editar" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Editar Datos</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table table-hover" id="tabla-datos">
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
                            <input type="number" class="form-control" readonly id="total" name="precio" placeholder="Precio">
                            <label for="precio" class="form-label">Total S/.</label>
                        </div>
                    </div>
                    <div class="col-md-4" id="datos-deudor">
                        
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
            </div>
        </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="js/venta.js"></script>
</body>
</html>