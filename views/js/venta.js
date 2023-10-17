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
            tbody += `
                <tr ondblclick="get(${element.idventa})">
                    <td data-label='#'>${contador}</td>
                    <td data-label='Productos'>${element.productos}</td>
                    <td data-label='Fecha'>${fecha}</td>
                    <td data-label='Total'> S/ ${precioSinDecimales}</td>
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
        console.log(id);
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
        });
        tbodyD.innerHTML = tbody;
        txtTotal.value = datos[0]['totalV'];
    })
}

function search(){
    const txtProducto = document.querySelector("#producto-buscar");
    const txtTotal = document.querySelector("#total-buscar");
    const txtFecha = document.querySelector("#fecha-buscar");
    const parametros = new URLSearchParams();
    parametros.append("op", "search");
    parametros.append("idproducto", txtProducto.value);
    parametros.append("total", txtTotal.value);
    parametros.append("fecha", txtFecha.value);
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
            tbody += `
                <tr ondblclick="get(${element.idventa})">
                    <td data-label='#'>${contador}</td>
                    <td data-label='Productos'>${element.productos}</td>
                    <td data-label='Fecha'>${fecha}</td>
                    <td data-label='Total'> S/ ${precioSinDecimales}</td>
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

listProducts();
listar();

const btnBuscar = document.querySelector("#buscar-venta");
btnBuscar.addEventListener("click", search)