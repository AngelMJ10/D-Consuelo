const tabla = document.querySelector("#tabla-producto");
const tbodyP = tabla.querySelector("tbody");
let tipo = "B";
let idProducto = 0;
let nombres = ``;

// Lista los platos
function listP(){
    const parametros = new URLSearchParams();
    parametros.append("op", "list");
    parametros.append("tipo", "P");
    fetch('../controllers/producto.php', {
        method: 'POST',
        body: parametros
    })
    .then(respuesta => respuesta.json())
    .then(datos => {
        tbodyP.innerHTML = "";
        let contador = 1;
        let tbody = "";
        datos.forEach(element => {
            const fechaCreate = new Date(element.fecha_creacion);
            const fecha = fechaCreate.toISOString().split('T')[0];
            const estado = element.estado == 1 ? 'Activo' : element.estado == 0 ? 'Inactivo' : element.estado;
            const stock = element.stock > 0 ? element.stock : element.tipo == 'P' ? 'Comida' : element.tipo == 'M' ? 'Combo' : element.stock;
            const color  = element.stock > 0 ? '07853C' : element.tipo == 'P' ? 'CBC731' : element.tipo == 'M' ? 'FF0000' : element.stock;
            // Formatear el precio con dos decimales fijos
            const precioSinDecimales = parseFloat(element.precio).toString();
            tbody += `
                <tr>
                    <td data-label='#'>${contador}</td>
                    <td data-label='Producto'>${element.producto}</td>
                    <td data-label='Precio'>${precioSinDecimales}</td>
                    <td data-label='Fecha'>${fecha}</td>
                    <td data-label='Stock'><span class='badge rounded-pill' style='background-color: #${color} '>${stock}</td>
                    <td data-label='Estado'><span class='badge rounded-pill' style='background-color: #005478'>${estado}</td>
                    <td data-label='Acción'>
                        <a class='btn btn-sm btn-outline-success' type='button' onclick='get(${element.idproducto})'>
                        <i class="fa-regular fa-pen-to-square"></i>
                        </a>
                    </td>
                </tr>
            `;
            contador++;
        });
        tbodyP.innerHTML = tbody;
    })
}

// Lista las bebidas
function listB(){
    const parametros = new URLSearchParams();
    parametros.append("op", "list");
    parametros.append("tipo", "B");
    fetch('../controllers/producto.php', {
        method: 'POST',
        body: parametros
    })
    .then(respuesta => respuesta.json())
    .then(datos => {
        tbodyP.innerHTML = "";
        let contador = 1;
        let tbody = "";
        datos.forEach(element => {
            const fechaCreate = new Date(element.fecha_creacion);
            const fecha = fechaCreate.toISOString().split('T')[0];
            const estado = element.estado == 1 ? 'Activo' : element.estado == 0 ? 'Inactivo' : element.estado;
            const stock = element.stock > 0 ? element.stock : element.stock == null ? 'Comida' : element.stock;
            const color  = element.stock > 0 ? '07853C' : element.stock == null ? 'C2C2C2' : element.stock;
            // Formatear el precio con dos decimales fijos
            const precioSinDecimales = parseFloat(element.precio).toString();
            tbody += `
                <tr>
                    <td data-label='#'>${contador}</td>
                    <td data-label='Producto'>${element.producto}</td>
                    <td data-label='Precio'>${precioSinDecimales}</td>
                    <td data-label='Fecha'>${fecha}</td>
                    <td data-label='Stock'><span class='badge rounded-pill' style='background-color: #${color} '>${stock}</td>
                    <td data-label='Estado'><span class='badge rounded-pill' style='background-color: #005478'>${estado}</td>
                    <td data-label='Acción'>
                        <a class='btn btn-sm btn-outline-success' type='button' onclick='get(${element.idproducto})'>
                        <i class="fa-regular fa-pen-to-square"></i>
                        </a>
                    </td>
                </tr>
            `;
            contador++;
        });
        tbodyP.innerHTML = tbody;
    })
}

// Lista los combos
function listC(){
    const parametros = new URLSearchParams();
    parametros.append("op", "list");
    parametros.append("tipo", "M");
    fetch('../controllers/producto.php', {
        method: 'POST',
        body: parametros
    })
    .then(respuesta => respuesta.json())
    .then(datos => {
        tbodyP.innerHTML = "";
        let contador = 1;
        let tbody = "";
        datos.forEach(element => {
            const fechaCreate = new Date(element.fecha_creacion);
            const fecha = fechaCreate.toISOString().split('T')[0];
            const estado = element.estado == 1 ? 'Activo' : element.estado == 0 ? 'Inactivo' : element.estado;
            const stock = element.stock > 0 ? element.stock : element.tipo == 'P' ? 'Comida' : element.tipo == 'M' ? 'Combo' : element.stock;
            const color  = element.stock > 0 ? '07853C' : element.tipo == 'P' ? 'CBC731' : element.tipo == 'M' ? 'FF0000' : element.stock;
            // Formatear el precio con dos decimales fijos
            const precioSinDecimales = parseFloat(element.precio).toString();
            console.log(nombres);
            tbody += `
                <tr>
                    <td data-label='#'>${contador}</td>
                    <td data-label='Producto'>${element.producto}</td>
                    <td data-label='Precio'>${precioSinDecimales}</td>
                    <td data-label='Fecha'>${fecha}</td>
                    <td data-label='Stock'><span class='badge rounded-pill' style='background-color: #${color} '>${stock}</td>
                    <td data-label='Estado'><span class='badge rounded-pill' style='background-color: #005478'>${estado}</td>
                    <td data-label='Acción'>
                        <a class='btn btn-sm btn-outline-success' type='button' onclick='get(${element.idproducto})'>
                        <i class="fa-regular fa-pen-to-square"></i>
                        </a>
                    </td>
                </tr>
            `;
            contador++;
        });
        tbodyP.innerHTML = tbody;
    })
}

// Lista todo
function list(){
    const parametros = new URLSearchParams();
    parametros.append("op", "listAll");
    fetch('../controllers/producto.php', {
        method: 'POST',
        body: parametros
    })
    .then(respuesta => respuesta.json())
    .then(datos => {
        tbodyP.innerHTML = "";
        let contador = 1;
        let tbody = "";
        datos.forEach(element => {
            const fechaCreate = new Date(element.fecha_creacion);
            const fecha = fechaCreate.toISOString().split('T')[0];
            const estado = element.estado == 1 ? 'Activo' : element.estado == 0 ? 'Inactivo' : element.estado;
            const stock = element.stock > 0 ? element.stock : element.tipo == 'P' ? 'Comida' : element.tipo == 'M' ? 'Combo' : element.stock;
            const color  = element.stock > 0 ? '07853C' : element.tipo == 'P' ? 'CBC731' : element.tipo == 'M' ? 'FF0000' : element.stock;
            // Formatear el precio con dos decimales fijos
            const precioSinDecimales = parseFloat(element.precio).toString();
            tbody += `
                <tr>
                    <td data-label='#'>${contador}</td>
                    <td data-label='Producto'>${element.producto}</td>
                    <td data-label='Precio'>${precioSinDecimales}</td>
                    <td data-label='Fecha'>${fecha}</td>
                    <td data-label='Stock'><span class='badge rounded-pill' style='background-color: #${color} '>${stock}</td>
                    <td data-label='Estado'><span class='badge rounded-pill' style='background-color: #005478'>${estado}</td>
                    <td data-label='Acción'>
                        <a class='btn btn-sm btn-outline-success' type='button' onclick='get(${element.idproducto})'>
                        <i class="fa-regular fa-pen-to-square"></i>
                        </a>
                    </td>
                </tr>
            `;
            contador++;
        });
        tbodyP.innerHTML = tbody;
    })
}

// Registra los platos
function registerP(){
    const txtProduct = document.querySelector("#producto");
    const txtPrecio = document.querySelector("#precio");
    const parametros = new URLSearchParams();
    parametros.append("op", "registerP");
    parametros.append("producto", txtProduct.value);
    parametros.append("precio", txtPrecio.value);
    Swal.fire({
        icon: 'question',
        title: 'Confirmación',
        text: '¿Está seguro de los datos ingresados?',
        showCancelButton: true,
        confirmButtonText: 'Si',
        cancelButtonText: 'No',
    }).then((result) => {
        if (result.isConfirmed) {
            fetch("../controllers/producto.php", {
                method: "POST",
                body: parametros
            })
            .then(respuesta =>{
                if(respuesta.ok){
                    Swal.fire({
                        icon: 'success',
                        title: 'Plato registrado',
                        html: `El plato <b>${txtProduct.value}</b> ha sido registrado correctamente.`
                    }).then(() => {
                        location.reload();
                    });
                } else{
                    throw new Error('Error en la solicitud');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                Swal.alert({
                    icon: 'Error',
                    title: 'Error al registrar el plato',
                    text: 'Ocurrió un error al registrar el plato. Por favor intentelo nuevamente.'
                })
            });
        }
    })
}

// Registra las bebidas
function registerB(){
    const txtMarca = document.querySelector("#marca");
    const txtProduct = document.querySelector("#producto");
    const txtPrecio = document.querySelector("#precio");
    const txtStock = document.querySelector("#stock");

    const parametros = new URLSearchParams();
    parametros.append("op", "registerB");
    parametros.append("idmarca", txtMarca.value);
    parametros.append("producto", txtProduct.value);
    parametros.append("precio", txtPrecio.value);
    parametros.append("stock", txtStock.value);
    Swal.fire({
        icon: 'question',
        title: 'Confirmación',
        text: '¿Está seguro de los datos ingresados?',
        showCancelButton: true,
        confirmButtonText: 'Si',
        cancelButtonText: 'No',
    }).then((result) => {
        if (result.isConfirmed) {
            fetch("../controllers/producto.php", {
                method: "POST",
                body: parametros
            })
            .then(respuesta =>{
                if(respuesta.ok){
                    Swal.fire({
                        icon: 'success',
                        title: 'Bebida registrada',
                        html: `La bebida <b>${txtProduct.value}</b> ha sido registrada correctamente.`
                    }).then(() => {
                        location.reload();
                    });
                } else{
                    throw new Error('Error en la solicitud');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                Swal.alert({
                    icon: 'Error',
                    title: 'Error al registrar la bebida',
                    text: 'Ocurrió un error al registrar la beboda. Por favor intentelo nuevamente.'
                })
            });
        }
    })
}

// Registra los combos
function registerC(){
    const txtPrecio = document.querySelector("#precio");
    const txtProducts1 = document.querySelector('#view-producto-1').value;
    const txtProducts2 = document.querySelector('#view-producto-2').value;
    const txtPrecioC = document.querySelector("#precio_combo");
    const txtProducts_C = `${txtProducts1} + ${txtProducts2}`;
    const parametros = new URLSearchParams();
    parametros.append("op", "register_combo");
    parametros.append("producto", txtProducts_C);
    parametros.append("precio", txtPrecioC.value);
    Swal.fire({
        icon: 'question',
        title: 'Confirmación',
        text: '¿Está seguro de los datos ingresados?',
        showCancelButton: true,
        confirmButtonText: 'Si',
        cancelButtonText: 'No',
    }).then((result) => {
        if (result.isConfirmed) {
            fetch("../controllers/producto.php", {
                method: "POST",
                body: parametros
            })
            .then(respuesta =>{
                if(respuesta.ok){
                    Swal.fire({
                        icon: 'success',
                        title: 'Combo registrado',
                        html: `El combo de  <b>${txtProducts_C}</b> ha sido registrado correctamente.`
                    }).then(() => {
                        location.reload();
                    });
                } else{
                    throw new Error('Error en la solicitud');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                Swal.alert({
                    icon: 'Error',
                    title: 'Error al registrar el combo',
                    text: 'Ocurrió un error al registrar el combo. Por favor intentelo nuevamente.'
                })
            });
        }
    })
}

// Función que decide cual función de registro usar
function register(){
    const txtMarca = document.querySelector("#marca");
    const txtProduct = document.querySelector("#producto");
    const txtPrecio = document.querySelector("#precio");
    const txtStock = document.querySelector("#stock");

    const txtProducts1 = document.querySelector('#view-producto-1').value;
    const txtProducts2 = document.querySelector('#view-producto-2').value;
    const txtPrecioC = document.querySelector("#precio_combo");
    const txtProducts_C = `${txtProducts1} + ${txtProducts2}`;

    if (tipo == "P") {
        registerP();
    }

    if (tipo == "B") {
        registerB();
    }

    if (tipo == "M") {
        registerC();
    }

}

// Lista las marcas
function listarMarcas() {
    const txtMarca = document.querySelector('#marca');
    const txtMarcaEdit = document.querySelector("#marca-editar");
    const txtMarcaSearch = document.querySelector("#marca-buscar");
    const parametrosURL = new URLSearchParams();
    parametrosURL.append("op", "listar");

    fetch('../controllers/marca.php',{
        method: 'POST',
        body: parametrosURL 
    })
    .then(respuesta => respuesta.json())
    .then(data =>{
        let options = "<option value='0'>Seleccione la marca</option>";
        data.forEach(element => {
            options += `
                <option value='${element.idmarca}'>${element.marca}</option>
            `;
        });
        txtMarca.innerHTML = options;
        txtMarcaSearch.innerHTML = options;
        txtMarcaEdit.innerHTML = options;
    })
    .catch(error => {
        console.error('Error:', error);
    });
}

// Busca los productos
function search(){
    const producto = document.querySelector("#producto-buscar");
    const idmarca = document.querySelector("#marca-buscar");
    const precio = document.querySelector("#precio-buscar");
    const estado = document.querySelector("#estado-buscar");
    const tipo = document.querySelector("#tipo-buscar");
    const parametros = new URLSearchParams();
    parametros.append("op", "search");
    parametros.append("idproducto", producto.value);
    parametros.append("tipo", tipo.value);
    parametros.append("estado", estado.value);
    parametros.append("idmarca", idmarca.value);
    parametros.append("precio", precio.value);
    fetch('../controllers/producto.php', {
        method: 'POST',
        body: parametros
    })
    .then(respuesta => respuesta.json())
    .then(datos => {
        tbodyP.innerHTML = "";
        let contador = 1;
        let tbody = "";
        datos.forEach(element => {
            const fechaCreate = new Date(element.fecha_creacion);
            const fecha = fechaCreate.toISOString().split('T')[0];
            const estado = element.estado == 1 ? 'Activo' : element.estado == 0 ? 'Inactivo' : element.estado;
            const stock = element.stock > 0 ? element.stock : element.tipo == 'P' ? 'Comida' : element.tipo == 'M' ? 'Combo' : element.stock;
            const color  = element.stock > 0 ? '07853C' : element.tipo == 'P' ? 'CBC731' : element.tipo == 'M' ? 'FF0000' : element.stock;
            // Formatear el precio con dos decimales fijos
            const precioSinDecimales = parseFloat(element.precio).toString();
            tbody += `
                <tr>
                    <td data-label='#'>${contador}</td>
                    <td data-label='Producto'>${element.producto}</td>
                    <td data-label='Precio'>${precioSinDecimales}</td>
                    <td data-label='Fecha'>${fecha}</td>
                    <td data-label='Stock'><span class='badge rounded-pill' style='background-color: #${color} '>${stock}</td>
                    <td data-label='Estado'><span class='badge rounded-pill' style='background-color: #005478'>${estado}</td>
                    <td data-label='Acción'>
                        <a class='btn btn-sm btn-outline-success' type='button' onclick='get(${element.idproducto})'>
                        <i class="fa-regular fa-pen-to-square"></i>
                        </a>
                    </td>
                </tr>
            `;
            contador++;
        });
        tbodyP.innerHTML = tbody;
    })
}


// Lista los platos disponibles para el combo
function list_products(){
    const txtProducts1 = document.querySelector('#view-producto-1');
    const txtProducts2 = document.querySelector('#view-producto-2');
    const txtProductoC1 = document.querySelector("#producto-1-editar");
    const txtProductoC2 = document.querySelector("#producto-2-editar");
    const parametros = new URLSearchParams();
    parametros.append("op", "list");
    parametros.append("tipo", "P");
    fetch('../controllers/producto.php', {
        method: 'POST',
        body: parametros
    })
    .then(respuesta => respuesta.json())
    .then(datos => {
        let options = "<option value='0'>Seleccione el producto</option>";
        datos.forEach(element => {
            if (element.tipo == 'P') {
                options+= `
                    <option value='${element.producto}'>${element.producto}</option>
                `;
            }
        });
        txtProducts1.innerHTML = options;
        txtProducts2.innerHTML = options;
        txtProductoC1.innerHTML = options;
        txtProductoC2.innerHTML = options;
    })
}

// Lista los platos disponibles para el combo
function listar_todo(){
    const txtProducto = document.querySelector("#producto-buscar");
    const parametros = new URLSearchParams();
    parametros.append("op", "list_All_estate");
    fetch('../controllers/producto.php', {
        method: 'POST',
        body: parametros
    })
    .then(respuesta => respuesta.json())
    .then(datos => {
        let options = "<option value='0'>Seleccione el producto</option>";
        datos.forEach(element => {
            options+= `
                <option value='${element.idproducto}'>${element.producto}</option>
            `;
        });
        txtProducto.innerHTML = options;
    })
}

// Arregla la vista para el registro de platos
function viewRegisterP(){
    tipo = "P";
    const viewPB = document.querySelector("#vista_pb")
    const view_combo = document.querySelector("#vista_combo")
    const titleView = document.querySelector("#titulo-register");
    const viewMarca = document.querySelector("#view-marca");
    const viewStock = document.querySelector("#view-stock");
    const viewProducto = document.querySelector("#view-producto");
    const viewPrecio = document.querySelector("#view-precio");
    const btnRPlato = document.querySelector("#vista-plato");
    const btnRBebida = document.querySelector("#vista-bebida");
    // Se agrega la clase d-none a los campos de bebida
    btnRPlato.classList.add("d-none")
    btnRBebida.classList.remove("d-none");
    viewMarca.classList.add("d-none");
    viewStock.classList.add("d-none");

    // Se quita la clase d-none de la vista de platos y bebidas 
    viewPB.classList.remove("d-none");
    view_combo.classList.add("d-none");

    // Se arreglan las columnas
    viewProducto.classList.remove("col-md-3");
    viewProducto.classList.add("col-md-4");

    viewPrecio.classList.remove("col-md-3");
    viewPrecio.classList.add("col-md-4");

    titleView.textContent = "Registrar Plato";
}

// Arregla la vista para el registro de bebidas
function viewRegisterB(){
    tipo = "B";
    const viewPB = document.querySelector("#vista_pb")
    const view_combo = document.querySelector("#vista_combo")
    const titleView = document.querySelector("#titulo-register");
    const viewMarca = document.querySelector("#view-marca");
    const viewStock = document.querySelector("#view-stock");
    const viewProducto = document.querySelector("#view-producto");
    const viewPrecio = document.querySelector("#view-precio");
    const btnRPlato = document.querySelector("#vista-plato");
    const btnRBebida = document.querySelector("#vista-bebida");
     // Se remueve la clase d-none a los campos de bebida
    btnRPlato.classList.remove("d-none")
    btnRBebida.classList.add("d-none");
    viewMarca.classList.remove("d-none");
    viewStock.classList.remove("d-none");

    // Se quita la clase d-none de la vista de platos y bebidas 
    viewPB.classList.remove("d-none");
    view_combo.classList.add("d-none");

    // Se arreglan las columnas
    viewProducto.classList.add("col-md-3");
    viewProducto.classList.remove("col-md-4");

    viewPrecio.classList.add("col-md-3");
    viewPrecio.classList.remove("col-md-4");
    titleView.textContent = "Registrar Bebida";
}

// Arregla la vista para el registro de combos
function viewRegisterC(){
    tipo = "M";
    const titleView = document.querySelector("#titulo-register");
    const viewPB = document.querySelector("#vista_pb")
    const view_combo = document.querySelector("#vista_combo")
     // Se remueve la clase d-none a los campos de bebida
    viewPB.classList.add("d-none");
    view_combo.classList.remove("d-none");

    titleView.textContent = "Registrar Combo";
    console.log(tipo);
}

// Obtiene los datos del producto
function get(id){
    // Cajas de texto
    const txtMarca = document.querySelector("#marca-editar");
    const txtProducto = document.querySelector("#producto-editar");
    const txtPrecio = document.querySelector("#precio-editar");
    const txtStock = document.querySelector("#stock-editar");
    const txtEstado = document.querySelector("#estado-editar");
    const txtProductoC1 = document.querySelector("#texto-combo");
    // Columnas
    const viewMarca = document.querySelector("#view-marca-editar");
    const viewProducto = document.querySelector("#view-producto-editar");
    const viewPrecio = document.querySelector("#view-precio-editar");
    const viewStock = document.querySelector("#view-stock-editar");
    const viewProducto1 = document.querySelector("#view-combo-producto-editar");
    const viewProducto2 = document.querySelector("#view-combo-producto-2-editar");
    // Modal
    const modal = document.querySelector("#modal-editar");
    const parametros = new URLSearchParams();
    parametros.append("op", "get");
    parametros.append("idproducto", id);
    fetch("../controllers/producto.php", {
        method: "POST",
        body: parametros
    })
    .then(respuesta => respuesta.json())
    .then(datos => {
        const bootstrapModal = new bootstrap.Modal(modal);
        bootstrapModal.show();
        if (datos.tipo == "P") {
            viewMarca.classList.add("d-none");
            viewStock.classList.add("d-none");
            viewPrecio.classList.add("col-md-4");
            viewProducto.classList.add("col-md-4");
            viewProducto1.classList.add("d-none");
            viewProducto2.classList.add("d-none");
            txtProductoC1.classList.add("d-none");
        }
        if (datos.tipo == "B") {
            viewMarca.classList.remove("d-none");
            viewStock.classList.remove("d-none");
            viewPrecio.classList.remove("col-md-4");
            viewProducto.classList.remove("col-md-4");
            viewProducto1.classList.add("d-none");
            viewProducto2.classList.add("d-none");
            txtProductoC1.classList.add("d-none");
        }
        if (datos.tipo == "M") {
            viewMarca.classList.add("d-none");
            viewStock.classList.add("d-none");
            viewProducto.classList.add("d-none");
            viewProducto1.classList.remove("d-none");
            viewProducto2.classList.remove("d-none");
            txtProductoC1.classList.remove("d-none");
        }
        idProducto = datos.idproducto;
        txtMarca.value = datos.idmarca;
        txtProducto.value = datos.producto;
        txtProductoC1.textContent = `Combo: ${datos.producto}`;
        txtPrecio.value = datos.precio;
        txtStock.value = datos.stock;
        txtEstado.value = datos.estado
        console.log(idProducto)
        tipo = datos.tipo;
    })
}

// Edita el producto
function edit(){
    // Cajas de texto
    const txtMarca = document.querySelector("#marca-editar");
    const txtProducto = document.querySelector("#producto-editar");
    const txtPrecio = document.querySelector("#precio-editar");
    const txtStock = document.querySelector("#stock-editar");
    const txtEstado = document.querySelector("#estado-editar");

    const txtProductoC1 = document.querySelector("#producto-1-editar").value;
    const txtProductoC2 = document.querySelector("#producto-2-editar").value;
    const txtProductoC = `${txtProductoC1} + ${txtProductoC2}`;
    
    const parametros = new URLSearchParams();
    console.log(tipo)

    if (tipo == "B") {
        parametros.append("op", "edit");
        parametros.append("idmarca", txtMarca.value);
        parametros.append("producto", txtProducto.value);
        parametros.append("precio", txtPrecio.value);
        parametros.append("stock", txtStock.value);
        parametros.append("estado", txtEstado.value);
        parametros.append("idproducto", idProducto);
        Swal.fire({
            icon: 'question',
            title: 'Confirmación',
            text: '¿Está seguro de los datos ingresados?',
            showCancelButton: true,
            confirmButtonText: 'Si',
            cancelButtonText: 'No',
        }).then((result) => {
            if (result.isConfirmed) {
                fetch("../controllers/producto.php", {
                    method: "POST",
                    body: parametros
                })
                .then(respuesta =>{
                    if(respuesta.ok){
                        Swal.fire({
                            icon: 'success',
                            title: 'Producto editado',
                            html: `El producto <b>${txtProducto.value}</b> ha sido actualizado correctamente.`
                        }).then(() => {
                            location.reload();
                        });
                    } else{
                        throw new Error('Error en la solicitud');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    Swal.alert({
                        icon: 'Error',
                        title: 'Error al actualizar el producto',
                        text: 'Ocurrió un error al actualizar el producto. Por favor intentelo nuevamente.'
                    })
                });
            }
        })
    }

    if (tipo == "P") {
        parametros.append("op", "editP");
        parametros.append("producto", txtProducto.value);
        parametros.append("precio", txtPrecio.value);
        parametros.append("estado", txtEstado.value);
        parametros.append("idproducto", idProducto);
        Swal.fire({
            icon: 'question',
            title: 'Confirmación',
            text: '¿Está seguro de los datos ingresados?',
            showCancelButton: true,
            confirmButtonText: 'Si',
            cancelButtonText: 'No',
        }).then((result) => {
            if (result.isConfirmed) {
                fetch("../controllers/producto.php", {
                    method: "POST",
                    body: parametros
                })
                .then(respuesta =>{
                    if(respuesta.ok){
                        Swal.fire({
                            icon: 'success',
                            title: 'Producto editado',
                            html: `El producto <b>${txtProducto.value}</b> ha sido actualizado correctamente.`
                        }).then(() => {
                            location.reload();
                        });
                    } else{
                        throw new Error('Error en la solicitud');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    Swal.alert({
                        icon: 'Error',
                        title: 'Error al actualizar el producto',
                        text: 'Ocurrió un error al actualizar el producto. Por favor intentelo nuevamente.'
                    })
                });
            }
        })
    }

    if (tipo == "M") {
        parametros.append("op", "editC");
        parametros.append("producto", txtProductoC);
        parametros.append("precio", txtPrecio.value);
        parametros.append("estado", txtEstado.value);
        parametros.append("idproducto", idProducto);
        Swal.fire({
            icon: 'question',
            title: 'Confirmación',
            text: '¿Está seguro de los datos ingresados?',
            showCancelButton: true,
            confirmButtonText: 'Si',
            cancelButtonText: 'No',
        }).then((result) => {
            if (result.isConfirmed) {
                fetch("../controllers/producto.php", {
                    method: "POST",
                    body: parametros
                })
                .then(respuesta =>{
                    if(respuesta.ok){
                        Swal.fire({
                            icon: 'success',
                            title: 'Combo editado',
                            html: `El combo <b>${txtProductoC}</b> ha sido actualizado correctamente.`
                        }).then(() => {
                            location.reload();
                        });
                    } else{
                        throw new Error('Error en la solicitud');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    Swal.alert({
                        icon: 'Error',
                        title: 'Error al actualizar el combo',
                        text: 'Ocurrió un error al actualizar el producto. Por favor intentelo nuevamente.'
                    })
                });
            }
        })
    }
}

// Función para deshabilitar los productos
function disable_products() {
    const parametros = new URLSearchParams();
    parametros.append("op", "disable_products");
    fetch('../controllers/producto.php', {
        method: 'POST',
        body: parametros
    })
    .then(respuesta => {
        if(respuesta.ok){
            console.log("SE PUDO")
        } else{
            throw new Error('Error en la solicitud');
        }
    })
}

// Función para programar la ejecución diaria a las 00:00 horas
function ejecutarDiariamente() {
    // Llama a disable_products inmediatamente
    disable_products();

    const horaEjecucion = new Date();

    // Establecer la hora de ejecución diaria a las 00:00:00
    horaEjecucion.setHours(0, 0, 0, 0);

    // Calcular los milisegundos hasta la próxima ejecución
    let milisegundosHastaEjecucion = horaEjecucion.getTime() - Date.now();
    if (milisegundosHastaEjecucion < 0) {
        // Si la hora de ejecución ya ha pasado hoy, establecer la hora de ejecución para mañana
        horaEjecucion.setDate(horaEjecucion.getDate() + 1);
        milisegundosHastaEjecucion = horaEjecucion.getTime() - Date.now();
    }

    // Establecer el intervalo para la próxima ejecución
    setTimeout(() => {
        // Ejecutar disable_products y volver a programar la próxima ejecución
        disable_products();
        ejecutarDiariamente();
    }, milisegundosHastaEjecucion);
}

// Llama a ejecutarDiariamente para programar la ejecución diaria
ejecutarDiariamente();


list();
listarMarcas();
list_products();
listar_todo();

const btnSearch = document.querySelector("#buscar-producto");
btnSearch.addEventListener("click", search);

const btnBebida = document.querySelector("#list-bebidas");
btnBebida.addEventListener("click", listB);

const btnPlatos = document.querySelector("#list-platos");
btnPlatos.addEventListener("click", listP);

const btnCombos = document.querySelector("#list-combos");
btnCombos.addEventListener("click", listC);

const btnRPlato = document.querySelector("#vista-plato");
btnRPlato.addEventListener("click", viewRegisterP);

const btnRBebida = document.querySelector("#vista-bebida");
btnRBebida.addEventListener("click", viewRegisterB);

const btnRCombo = document.querySelector("#vista-combo");
btnRCombo.addEventListener("click", viewRegisterC);

const btnRegistrar = document.querySelector("#registrar-producto");
btnRegistrar.addEventListener("click", register)

const btnEditarProducto = document.querySelector("#editar-producto");
btnEditarProducto.addEventListener("click", edit);