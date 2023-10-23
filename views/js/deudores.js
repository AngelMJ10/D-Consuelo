const tablaD = document.querySelector("#tabla-deudores");
const tbodyD = tablaD.querySelector("tbody");

function list(){
    const parametros = new URLSearchParams();
    parametros.append("op", "listDepdtors");
    fetch("../controllers/deuda.php", {
        method: 'POST',
        body: parametros
    })
    .then(respuesta => respuesta.json())
    .then(datos =>{
        let tbody = "";
        tbodyD.innerHTML = "";
        let contador = 1;
        datos.forEach(element => {
            const estado = element.estado == 1 ? 'No debe' : element.estado == 2 ? 'Debe' : element.estado;
            tbody += `
                <tr onclick='get_debts(${element.iddeudor})'>
                    <td data-label='#'>${contador}</td>
                    <td data-label='Nombre'>${element.nombre}</td>
                    <td data-label='Apellidos'>${element.apellidos}</td>
                    <td data-label='Deudas'>${element.deudas}</td>
                    <td data-label='Total'>S/ ${element.total}</td>
                    <td data-label='Estado'><span class='badge rounded-pill' style='background-color: #005478'>${estado}</td>
                </tr>
            `;
            contador++;
        });
        tbodyD.innerHTML = tbody;
    })
}

function get_debts(id){
    const tablaDeudas = document.querySelector("#tabla-deudas");
    const tbodyDeudas = tablaDeudas.querySelector("tbody");
    const modal = document.querySelector("#modal-deudas");
    const parametros = new URLSearchParams();
    parametros.append("op", "get_debts");
    parametros.append("iddeudor", id);
    fetch("../controllers/deuda.php", {
        method: 'POST',
        body: parametros
    })
    .then(respuesta => respuesta.json())
    .then(datos =>{
        let contador = 1;
        const bootstrapModal = new bootstrap.Modal(modal);
        bootstrapModal.show();
        let tbody = "";
        datos.forEach(element => {
            const fechaCreate = new Date(element.fecha_creacion);
            const fecha = fechaCreate.toISOString().split('T')[0];
            const estado = element.estado == 1 ? 'No pagado' : element.estado == 0 ? 'Pagado' : element.estado;
            tbody += `
                <tr ondblclick ='get_sale(${element.idventa})'>
                    <td data-label='#'>${contador}</td>
                    <td data-label='Productos'>${element.productos}</td>
                    <td data-label='Total'>S/ ${element.total}</td>
                    <td data-label='Fecha'>${fecha}</td>
                    <td data-label='Estado'><span class='badge rounded-pill' style='background-color: #005478'>${estado}</td>
                    <td data-label='Acción'>
                        <a class='btn btn-sm btn-outline-success' type='button'>
                            <i class="fa-solid fa-cash-register"></i>
                        </a>
                    </td>
                </tr>
            `;
            contador++;
        });
        tbodyDeudas.innerHTML = tbody;
    })
}

function get_sale(id){
    const modalCarrito = document.querySelector("#modal-editar");
    const tablaV = document.querySelector("#tabla-ventas");
    const tbodyV = tablaV.querySelector("tbody");
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
        });
        tbodyV.innerHTML = tbody;
        txtTotal.value = datos[0]['totalV'];
    })
}

list();