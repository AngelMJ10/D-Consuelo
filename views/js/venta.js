const tabla = document.querySelector("#tabla-ventas");
const tbodyV = tabla.querySelector("tbody");
const modalCarrito = document.querySelector("#modal-editar");

function listar(){
    const parametros = new URLSearchParams();
    parametros.append("op", "list");
    fetch('../controllers/venta.php', {
        method: 'POST',
        body: parametros
    })
    .then(respuesta => respuesta.json())
    .then(datos => {
        let contador = 1;
        let tbody = "";
        datos.forEach(element => {
            const fechaCreate = new Date(element.fecha_creacion);
            const fecha = fechaCreate.toISOString().split('T')[0];
            // Formatear el precio con dos decimales fijos
            const precioSinDecimales = parseFloat(element.total).toString();
            const estado = element.estado == 1 ? 'Pagado' : element.estado == 2 ? 'Fiado' : element.estado;
            tbody += `
                <tr ondblclick="get(${element.idventa})">
                    <td data-label='#'>${contador}</td>
                    <td data-label='Productos'>${element.productos}</td>
                    <td data-label='Fecha'>${fecha}</td>
                    <td data-label='Total'> S/ ${precioSinDecimales}</td>
                    <td data-label='Estado'><span class='badge rounded-pill' style='background-color: #005478'>${estado}</td>
                    <td data-label='Acción'>
                        <a class='btn btn-sm btn-outline-success' type='button'>
                        <i class="fa-regular fa-pen-to-square"></i>
                        </a>
                    </td>
                </tr>
            `;
            contador++;
        });
        console.log("hola")
        tbodyV.innerHTML = tbody;
    })
}

function get(id){
    const txtDeudor = document.querySelector("#datos-deudor");
    const tablaD = document.querySelector("#tabla-datos");
    const tbodyD = tablaD.querySelector("tbody");
    const txtTotal = document.querySelector("#total");
    const parametros = new URLSearchParams();
    parametros.append("op", "getVenta");
    parametros.append("idventa", id);
    const bootstrapModal = new bootstrap.Modal(modalCarrito);
    bootstrapModal.show();
    fetch("../controllers/venta.php", {
        method: 'POST',
        body: parametros
    })
    .then(respuesta => respuesta.json())
    .then(datos => {
        tbodyD.innerHTML = "";
        let tbody = "";
        let contador = 1;
        datos.forEach(element => {
            const precio = parseFloat(element.precio).toString();
            const total = parseFloat(element.total).toString();
            tbody += `
                <tr>
                    <td data-label='#'>${contador}</td>
                    <td data-label='Productos'>${element.producto}</td>
                    <td data-label='Precio'> S/ ${precio}</td>
                    <td data-label='Cantidad'> ${element.cantidad}</td>
                    <td data-label='Total'> S/ ${total}</td>
                </tr>
            `;
            contador++;
            if (element.estado == 2) {
                getDebt(id);
            }else{
                txtDeudor.innerHTML = "";
            }
        });
        tbodyD.innerHTML = tbody;
        txtTotal.value = datos[0]['totalV'];
    })
}

// Función para traer los datos del deudor en caso la venta sea fiada
function getDebt(id){
    const txtDeudor = document.querySelector("#datos-deudor");
    const parametros = new URLSearchParams();
    parametros.append("op", "get_sale_debts");
    parametros.append("idventa", id);
    fetch("../controllers/deuda.php", {
        method: 'POST',
        body: parametros
    })
    .then(respuesta => respuesta.json())
    .then(datos => {
        txtDeudor.innerHTML = "";
        txtDeudor.innerHTML= `
            <p><b>Deudor: </b> ${datos.apellidos} ${datos.nombre}</p>
        `;
    })
}

function search(){
    const txtProducto = document.querySelector("#producto-buscar");
    const txtTotal = document.querySelector("#total-buscar");
    const txtFecha = document.querySelector("#fecha-buscar");
    const txtEstado = document.querySelector("#estado-buscar");
    const parametros = new URLSearchParams();
    parametros.append("op", "search");
    parametros.append("idproducto", txtProducto.value);
    parametros.append("total", txtTotal.value);
    parametros.append("fecha", txtFecha.value);
    parametros.append("estado", txtEstado.value);
    fetch("../controllers/venta.php",{
        method: 'POST',
        body: parametros
    })
    .then(respuesta => respuesta.json())
    .then(datos => {
        tbodyV.innerHTML = "";
        let contador = 1;
        let tbody = "";
        datos.forEach(element => {
            const fechaCreate = new Date(element.fecha_creacion);
            const fecha = fechaCreate.toISOString().split('T')[0];
            // Formatear el precio con dos decimales fijos
            const precioSinDecimales = parseFloat(element.total).toString();
            const estado = element.estado == 1 ? 'Pagado' : element.estado == 2 ? 'Fiado' : element.estado;
            tbody += `
                <tr ondblclick="get(${element.idventa})">
                    <td data-label='#'>${contador}</td>
                    <td data-label='Productos'>${element.productos}</td>
                    <td data-label='Fecha'>${fecha}</td>
                    <td data-label='Total'> S/ ${precioSinDecimales}</td>
                    <td data-label='Estado'><span class='badge rounded-pill' style='background-color: #005478'>${estado}</td>
                    <td data-label='Acción'>
                        <a class='btn btn-sm btn-outline-success' type='button'>
                        <i class="fa-regular fa-pen-to-square"></i>
                        </a>
                    </td>
                </tr>
            `;
            contador++;
        });
        tbodyV.innerHTML = tbody;
    })
    
}

function listProducts() {
    const txtProducto = document.querySelector("#producto-buscar");
    const parametros = new URLSearchParams();
    parametros.append("op", "listAll");
    fetch("../controllers/producto.php",{
        method: 'POST',
        body: parametros
    })
    .then(respuesta => respuesta.json())
    .then(datos => {
        let option = "";
        datos.forEach(element => {
            option += `<option value='${element.idproducto}'>${element.producto}</option>`;
        });
        txtProducto.innerHTML += option;
    })
}

function total_day(){
    const txtTotal = document.querySelector("#total_day")
    const params = new URLSearchParams();
    params.append("op", "total_day");
    fetch("../controllers/venta.php", {
        method: 'POST',
        body: params
    })
    .then(respuesta => respuesta.json())
    .then(datos => {
        txtTotal.value = `S/ ${datos.total}`;
    })
}

total_day();
listProducts();
listar();

const btnBuscar = document.querySelector("#buscar-venta");
btnBuscar.addEventListener("click", search)