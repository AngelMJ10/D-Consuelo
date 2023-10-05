const tabla = document.querySelector("#tabla-producto");
const tbodyP = tabla.querySelector("tbody");
let tipo = "B";
let idProducto = 0;

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

function register(){
    const txtMarca = document.querySelector("#marca");
    const txtProduct = document.querySelector("#producto");
    const txtPrecio = document.querySelector("#precio");
    const txtStock = document.querySelector("#stock");

    if (tipo == "P") {
        function registerP(){
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
        registerP();
    }
    if (tipo == "B") {
        function registerB(){
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
        registerB();
    }

}

function listarMarcas() {
    const txtMarca = document.querySelector('#marca');
    const txtMarcaEdit = document.querySelector("#marca-editar");
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
        txtMarcaEdit.innerHTML = options;
    })
    .catch(error => {
        console.error('Error:', error);
    });
}

function viewRegisterP(){
    tipo = "P";
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

    // Se arreglan las columnas
    viewProducto.classList.remove("col-md-3");
    viewProducto.classList.add("col-md-4");

    viewPrecio.classList.remove("col-md-3");
    viewPrecio.classList.add("col-md-4");

    titleView.textContent = "Registrar Plato";
}

function viewRegisterB(){
    tipo = "B";
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

    // Se arreglan las columnas
    viewProducto.classList.add("col-md-3");
    viewProducto.classList.remove("col-md-4");

    viewPrecio.classList.add("col-md-3");
    viewPrecio.classList.remove("col-md-4");
    titleView.textContent = "Registrar Bebida";
}

function get(id){
    // Cajas de texto
    const txtMarca = document.querySelector("#marca-editar");
    const txtProducto = document.querySelector("#producto-editar");
    const txtPrecio = document.querySelector("#precio-editar");
    const txtStock = document.querySelector("#stock-editar");
    const txtEstado = document.querySelector("#estado-editar");
    // Columnas
    const viewMarca = document.querySelector("#view-marca-editar");
    const viewProducto = document.querySelector("#view-producto-editar");
    const viewPrecio = document.querySelector("#view-precio-editar");
    const viewStock = document.querySelector("#view-stock-editar");
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
        }
        if (datos.tipo == "B") {
            viewMarca.classList.remove("d-none");
            viewStock.classList.remove("d-none");
            viewPrecio.classList.remove("col-md-4");
            viewProducto.classList.remove("col-md-4");
        }
        idProducto = datos.idproducto;
        txtMarca.value = datos.idmarca;
        txtProducto.value = datos.producto;
        txtPrecio.value = datos.precio;
        txtStock.value = datos.stock;
        txtEstado.value = datos.estado
        console.log(idProducto)
        tipo = datos.tipo;
    })
}

function edit(){
    // Cajas de texto
    const txtMarca = document.querySelector("#marca-editar");
    const txtProducto = document.querySelector("#producto-editar");
    const txtPrecio = document.querySelector("#precio-editar");
    const txtStock = document.querySelector("#stock-editar");
    const txtEstado = document.querySelector("#estado-editar");
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
}


list();
listarMarcas();

const btnBebida = document.querySelector("#list-bebidas");
btnBebida.addEventListener("click", listB);

const btnPlatos = document.querySelector("#list-platos");
btnPlatos.addEventListener("click", listP);

const btnRPlato = document.querySelector("#vista-plato");
btnRPlato.addEventListener("click", viewRegisterP);

const btnRBebida = document.querySelector("#vista-bebida");
btnRBebida.addEventListener("click", viewRegisterB);

const btnRegistrar = document.querySelector("#registrar-producto");
btnRegistrar.addEventListener("click", register)

const btnEditarProducto = document.querySelector("#editar-producto");
btnEditarProducto.addEventListener("click", edit);