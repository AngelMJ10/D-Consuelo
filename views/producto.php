<?php require_once './permisos.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <!-- Select2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/24503cbed7.js" crossorigin="anonymous"></script>
    <title>Fases</title>
</head>
<body>
<link rel="stylesheet" href="./css/style.css">

    <div class="capa text-center">
        <h1>Productos</h1>
    </div>
    <div class="container py-5">
        <!-- Navs -->
        <ul class="nav nav-tabs mb-4" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="listar-tab" data-bs-toggle="tab" href="#listar" role="tab" aria-controls="listar" aria-selected="true">Listar</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="registrar-tab" data-bs-toggle="tab" href="#registrar" role="tab" aria-controls="registrar" aria-selected="false">Registrar</a>
            </li>
        </ul>

        <!-- Tabs -->
        <div class="tab-content" id="myTabContent">

            <div class="tab-pane fade mb-5" id="registrar" role="tabpanel" aria-labelledby="registrar-tab">
                <div class="card shadow-lg border-0">
                    <div class="card-header text-white capa-listar py-3" style="background: #005478">
                        
                    </div>
                    <div class="card-body">
                        <form>

                            <p>
                                <a class="btn btn-outline-primary" data-bs-toggle="collapse" href="#vista_bebida" role="button" aria-expanded="false" aria-controls="collapseExample">
                                    Bebida
                                </a>
                                <a class="btn btn-outline-success" data-bs-toggle="collapse" href="#vista_comida" role="button" aria-expanded="false" aria-controls="collapseExample">
                                    Comida
                                </a>
                                <a class="btn btn-outline-warning" data-bs-toggle="collapse" href="#vista_menu" role="button" aria-expanded="false" aria-controls="collapseExample">
                                    Menú
                                </a>
                            </p>

                            <div class="collapse mb-3" id="vista_bebida">
                                <h4 id="titulo-register">Registrar Bebidas</h4>
                                <div class="card card-body">
                                    <div class="row mb-2 mt-3">
                                        <div class="col-md-3">
                                            <div class="form-floating mb-3">
                                                <select class="form-control" name="" id="marca_bebida">
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" id="nombre_bebida" name="nombre" placeholder="nombre">
                                                <label for="nombre" class="form-label">Nombre</label>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-floating mb-3">
                                                <input type="number" class="form-control" id="precio_bebida" name="nombre" placeholder="nombre">
                                                <label for="nombre" class="form-label">Precio</label>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-floating mb-3">
                                                <input type="number" class="form-control" id="stock_bebida" name="nombre" placeholder="nombre">
                                                <label for="nombre" class="form-label">Stock</label>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="btn-group col-md-3">
                                        <button type="button" class="btn btn-outline-primary" id="registrar-bebida">Registrar</button>
                                    </div>

                                </div>
                            </div>

                            <div class="collapse mb-3" id="vista_comida">
                                <h4 id="titulo-register">Registrar comida</h4>
                                <div class="card card-body">
                                    <div class="row mb-2 mt-3">

                                        <div class="col-md-3">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" id="nombre_comida" name="nombre" placeholder="nombre">
                                                <label for="nombre" class="form-label">Nombre</label>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-floating mb-3">
                                                <input type="number" class="form-control" id="precio_comida" name="nombre" placeholder="nombre">
                                                <label for="nombre" class="form-label">Precio</label>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <select class="form-control" style="width: 100%;" name="" id="platos-inactivos" multiple="multiple">
                                            </select>
                                        </div>

                                    </div>

                                    <div class="btn-group col-md-3">
                                        <button type="button" id="restaurar-plato" class=" btn btn-outline-danger">Restaurar</button>
                                        <button type="button" class="btn btn-outline-primary" id="registrar-comida">Registrar</button>
                                    </div>
                                    
                                </div>
                            </div>

                            <div class="collapse mb-3" id="vista_menu">
                                <h4 id="titulo-register">Registrar Menú</h4>
                                <div class="card card-body">
                                    <div class="row mb-2 mt-3">

                                        <div class="col-md-3" >
                                            <div class="form-floating mb-3">
                                                <select class="form-control" id="producto_1_menu" name="">
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-floating mb-3">
                                                <select class="form-control"  id="producto_2_menu" name="">
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-floating mb-3">
                                                <input type="number" class="form-control" id="precio_menu" name="nombre" placeholder="nombre">
                                                <label for="nombre" class="form-label">Precio</label>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="btn-group col-md-3">
                                        <button type="button" class="btn btn-outline-primary" id="registrar-combo">Registrar</button>
                                    </div>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

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

                                        <div class="col-md-4">
                                            <div class="form-floating mb-3">
                                                <select class="form-control" name="" id="producto-buscar">
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-floating mb-3">
                                                <select class="form-control" name="" id="marca-buscar">
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-floating mb-3">
                                                <input type="number" class="form-control" id="precio-buscar" name="precio" placeholder="Precio">
                                                <label for="precio" class="form-label">Precio</label>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-floating mb-3">
                                                <select class="form-control" name="" id="tipo-buscar">
                                                    <option value="">Seleccione un tipo</option>
                                                    <option value="P">Plato</option>
                                                    <option value="M">Menú</option>
                                                    <option value="B">Bebida</option>
                                                </select>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row mb-2 mt-2">
                                        <div class="col-md-2">
                                            <div class="form-floating mb-3">
                                                <select class="form-control" name="" id="estado-buscar">
                                                    <option value="">Seleccione un estado</option>
                                                    <option value="2">Inactivo</option>
                                                    <option value="1">Activo</option>
                                                </select>
                                            </div>
                                        </div>

                                        
                                    </div>
                                    <button type="button" id="buscar-producto"  class="btn btn-outline-primary">Buscar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="table-responsive mt-3" id="tabla-producto">
                    <table class="table table-hover text-center"> 

                        <thead>
                            <th>#</th>
                            <th>Producto</th>
                            <th>Precio S/</th>
                            <th>Fecha</th>
                            <th>Stock</th>
                            <th>Estado</th>
                            <th>Acción</th>
                        </thead>

                        <tbody>
                        </tbody>
                    
                    </table>
                </div>
            </div>

        </div>

    </div>

    <!-- Modal de bebida -->
    <div class="modal fade" id="modal-b-editar" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Editar Datos</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>

                    <div id="vista-bebida">
                        <div class="row">

                            <div class="col-md-3">
                                <div class="form-floating mb-3">
                                    <select class="form-control" name="" id="marca-editar">
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="bebida-editar" name="producto" placeholder="Plato">
                                    <label for="Plato" class="form-label">Bebida</label>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-floating mb-3">
                                    <input type="number" class="form-control" id="precio-b-editar" name="precio" placeholder="Precio">
                                    <label for="precio" class="form-label">Precio</label>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-floating mb-3">
                                    <input type="number" class="form-control" id="stock-editar" name="precio" placeholder="Precio">
                                    <label for="precio" class="form-label">Stock</label>
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-floating mb-3">
                                    <select class="form-control" name="" id="estado-b-editar">
                                        <option value="">Seleccione un estado</option>
                                        <option value="2">Inactivo</option>
                                        <option value="1">Activo</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <button type="button" id="editar-bebida"  class="btn btn-outline-primary">Editar</button>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
            </div>
        </div>
    </div>

    <!-- Modal de comida -->
    <div class="modal fade" id="modal-p-editar" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Editar Datos</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>

                    <div id="vista-comida">
                        <div class="row">

                            <div class="col-md-4">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="comida-editar" name="producto" placeholder="Plato">
                                    <label for="Plato" class="form-label">Comida</label>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-floating mb-3">
                                    <input type="number" class="form-control" id="precio-p-editar" name="precio" placeholder="Precio">
                                    <label for="precio" class="form-label">Precio</label>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-floating mb-3">
                                    <select class="form-control" name="" id="estado-p-editar">
                                        <option value="">Seleccione un estado</option>
                                        <option value="2">Inactivo</option>
                                        <option value="1">Activo</option>
                                    </select>
                                </div>
                            </div>

                        </div>

                    </div>

                    <button type="button" id="editar-comida"  class="btn btn-outline-primary">Editar</button>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
            </div>
        </div>
    </div>

    <!-- Modal de combos -->
    <div class="modal fade" id="modal-c-editar" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Editar Datos</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>

                    <div id="vista-menu">
                        <p id="texto-combo"></p>
                        <div class="row">

                            <div class="col-md-3">
                                <div class="form-floating mb-3">
                                    <select class="form-control" name="" id="producto-1-editar">
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-floating mb-3">
                                    <select class="form-control" name="" id="producto-2-editar">
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-floating mb-3">
                                    <input type="number" class="form-control" id="precio-c-editar" name="precio" placeholder="Precio">
                                    <label for="precio" class="form-label">Precio</label>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-floating mb-3">
                                    <select class="form-control" name="" id="estado-c-editar">
                                        <option value="">Seleccione un estado</option>
                                        <option value="2">Inactivo</option>
                                        <option value="1">Activo</option>
                                    </select>
                                </div>
                            </div>

                        </div>

                    </div>

                    <button type="button" id="editar-combo"  class="btn btn-outline-primary">Editar</button>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
            </div>
        </div>
    </div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="js/producto.js"></script>

</body>
</html>