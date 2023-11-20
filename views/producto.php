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
                        <h4 id="titulo-register">Registrar Bebidas</h4>

                        <div class="row mb-2 mt-3" id="vista_pb">

                            <div class="col-md-3">
                                <div class="form-floating mb-3">
                                    <select class="form-control" name="" id="marca">
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="producto" name="Plato" placeholder="Plato">
                                    <label for="Plato" class="form-label">Producto</label>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-floating mb-3">
                                    <input type="number" class="form-control" id="precio" name="precio" placeholder="Precio">
                                    <label for="precio" class="form-label">Precio</label>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-floating mb-3" id="view-stock">
                                    <input type="number" class="form-control" id="stock" name="precio" placeholder="Precio">
                                    <label for="precio" class="form-label">Stock</label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-2 mt-3 d-none" id="vista_de_platos">

                            <div class="col-md-3">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="producto-plato" name="Plato" placeholder="Plato">
                                    <label for="Plato" class="form-label">Producto</label>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-floating mb-3">
                                    <input type="number" class="form-control" id="precio-plato" name="precio" placeholder="Precio">
                                    <label for="precio" class="form-label">Precio</label>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <select class="form-control" style="width: 100%;" name="" id="platos-inactivos" multiple="multiple">
                                </select>
                            </div>

                        </div>

                        <div class="row mb-2 mt-3 d-none" id="vista_combo">

                            <div class="col-md-3" >
                                <div class="form-floating mb-3">
                                    <select class="form-control" id="view-producto-1" name="">
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-floating mb-3">
                                    <select class="form-control"  id="view-producto-2" name="">
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-3" id="view-precio">
                                <div class="form-floating mb-3">
                                    <input type="number" class="form-control" id="precio_combo" name="precio" placeholder="Precio">
                                    <label for="precio" class="form-label">Precio</label>
                                </div>
                            </div>
                            
                        </div>

                        <button type="button" id="registrar-producto"  class="btn btn-outline-primary">Agregar</button>
                        <button type="button" id="vista-plato" class="btn btn-outline-success">Platos</button>
                        <button type="button" id="vista-bebida" class="d-none btn btn-outline-success">Bebidas</button>
                        <button type="button" id="vista-combo" class=" btn btn-outline-warning">Combo</button>
                        <button type="button" id="restaurar-plato" class=" btn btn-outline-danger">Restaurar</button>
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
                                                    <option value="0">Inactivo</option>
                                                    <option value="1">Activo</option>
                                                </select>
                                            </div>
                                        </div>

                                        
                                    </div>
                                    <button type="button" id="buscar-producto"  class="btn btn-outline-primary">Buscar</button>
                                    <button type="button" id="list-platos"  class="btn btn-outline-success">Platos</button>
                                    <button type="button" id="list-bebidas"  class="btn btn-outline-info">Bebidas</button>
                                    <button type="button" id="list-combos"  class="btn btn-outline-warning">Combos</button>
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

    <div class="modal fade" id="modal-editar" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Editar Datos</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row mb-2 mt-2">
                        <p class="fs-5 fw-semibold d-none" id="texto-combo"></p>
                        <div class="col-md-3" id="view-marca-editar">
                            <div class="form-floating mb-3">
                                <select class="form-control" name="" id="marca-editar">
                                </select>
                            </div>
                        </div>

                        <div class="col-md-3 d-none" id="view-combo-producto-editar">
                            <div class="form-floating mb-3">
                                <select class="form-control" name="" id="producto-1-editar">
                                </select>
                            </div>
                        </div>

                        <div class="col-md-3 d-none" id="view-combo-producto-2-editar">
                            <div class="form-floating mb-3">
                                <select class="form-control" name="" id="producto-2-editar">
                                </select>
                            </div>
                        </div>

                        <div class="col-md-3" id="view-producto-editar">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="producto-editar" name="producto" placeholder="Plato">
                                <label for="Plato" class="form-label">Producto</label>
                            </div>
                        </div>
                        <div class="col-md-3" id="view-precio-editar">
                            <div class="form-floating mb-3">
                                <input type="number" class="form-control" id="precio-editar" name="precio" placeholder="Precio">
                                <label for="precio" class="form-label">Precio</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-floating mb-3">
                                <select class="form-control" name="" id="estado-editar">
                                    <option value="">Seleccione un estado</option>
                                    <option value="0">Inactivo</option>
                                    <option value="1">Activo</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-2 mt-2">
                        <div class="col-md-3" id="view-stock-editar">
                            <div class="form-floating mb-3">
                                <input type="number" class="form-control" id="stock-editar" name="precio" placeholder="Precio">
                                <label for="precio" class="form-label">Stock</label>
                            </div>
                        </div>
                    </div>

                    <button type="button" id="editar-producto"  class="btn btn-outline-primary">Editar</button>

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