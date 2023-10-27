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

// Función para pagar la deuda
function pay(iddeuda, idventa){
    Swal.fire({
        icon: 'question',
        title: 'Confirmación',
        text: '¿Está seguro de pagar esta deuda?',
        showCancelButton: true,
        confirmButtonText: 'Si',
        cancelButtonText: 'No',
    })
    .then(async (result) => { // Marca la función como async aquí
        if (result.isConfirmed) {
            await pay_debt(iddeuda);
            await pay_sale(idventa);
        }
    });
}


// Función para cambiar el estado de la deuda
async function pay_debt(iddeuda){
    const parametros = new URLSearchParams();
    parametros.append("op", "change_estate");
    parametros.append("iddeuda", iddeuda);
    parametros.append("estado", 2);
    fetch("../controllers/deuda.php", {
        method: 'POST',
        body: parametros
    })
    .then(respuesta => {
        if (respuesta.ok) {
            Swal.fire({
                icon: 'success',
                title: 'Deuda Salda',
                html: 'Se ha saldado la deuda'
            })
        } else {
            throw new Error('Error en la solicitud');
        }
    })
    .catch(error => {
        console.error(error);
    });
}


// Función para cambiar el estado de la venta
async function pay_sale(idventa){
    const parametros = new URLSearchParams();
    parametros.append("op", "change_estate");
    parametros.append("idventa", idventa);
    parametros.append("estado", 1);
    fetch("../controllers/venta.php", {
        method: 'POST',
        body: parametros
    })
    .then(respuesta => {
        if (respuesta.ok) {
            Swal.fire({
                icon: 'success',
                title: 'Venta Actualizada',
                html: 'Se ha actualizado la venta'
            })
        } else {
            throw new Error('Error en la solicitud');
        }
    })
    .catch(error => {
        console.error(error);
    });
}

// Función para poder obtener las deudas
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
            const estado = element.estado == 1 ? 'No pagado' : element.estado == 2 ? 'Pagado' : element.estado;
            if (element.estado == 1) {
                tbody += `
                <tr ondblclick ='get_sale(${element.idventa})'>
                    <td data-label='#'>${contador}</td>
                    <td data-label='Productos'>${element.productos}</td>
                    <td data-label='Total'>S/ ${element.total}</td>
                    <td data-label='Fecha'>${fecha}</td>
                    <td data-label='Estado'><span class='badge rounded-pill' style='background-color: #005478'>${estado}</td>
                    <td data-label='Acción'>
                        <a class='btn btn-sm btn-outline-success' title='Clic, para saldar la deuda'
                            onclick='pay(${element.iddeuda}, ${element.idventa})' type='button'>
                            <i class="fa-solid fa-cash-register"></i>
                        </a>
                    </td>
                </tr>
            `;
            }else{
                tbody += `
                <tr ondblclick ='get_sale(${element.idventa})'>
                    <td data-label='#'>${contador}</td>
                    <td data-label='Productos'>${element.productos}</td>
                    <td data-label='Total'>S/ ${element.total}</td>
                    <td data-label='Fecha'>${fecha}</td>
                    <td data-label='Estado'><span class='badge rounded-pill' style='background-color: #005478'>${estado}</td>
                    <td data-label='Acción'>
                        <a class='btn btn-sm btn-outline-primary' title='Clic, para reactivar la deuda' 
                            onclick='reactivar_deuda(${element.iddeuda}, ${element.idventa})' type='button'>
                            <i class="fa-solid fa-money-bill"></i>
                        </a>
                    </td>
                </tr>
            `;
            }
            
            contador++;
        });
        tbodyDeudas.innerHTML = tbody;
    })
}


// Función para obtener los detalles de las ventas
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

function reactivar_deuda(iddeuda, idventa) {
    Swal.fire({
        icon: 'question',
        title: 'Confirmación',
        text: '¿Está seguro reactivar la deuda?',
        showCancelButton: true,
        confirmButtonText: 'Si',
        cancelButtonText: 'No',
    })
    .then(async (result) => { // Marca la función como async aquí
        if (result.isConfirmed) {
            await pay_debt_1(iddeuda);
            await pay_sale_2(idventa);
        }
    });
}

// Función para cambiar el estado de la deuda
async function pay_debt_1(iddeuda){
    const parametros = new URLSearchParams();
    parametros.append("op", "change_estate");
    parametros.append("iddeuda", iddeuda);
    parametros.append("estado", 1);
    fetch("../controllers/deuda.php", {
        method: 'POST',
        body: parametros
    })
    .then(respuesta => {
        if (respuesta.ok) {
            Swal.fire({
                icon: 'success',
                title: 'Deuda reacivada',
                html: 'Se ha reactivado la deuda'
            })
        } else {
            throw new Error('Error en la solicitud');
        }
    })
    .catch(error => {
        console.error(error);
    });
}

// Función para cambiar el estado de la venta
async function pay_sale_2(idventa){
    const parametros = new URLSearchParams();
    parametros.append("op", "change_estate");
    parametros.append("idventa", idventa);
    parametros.append("estado", 2);
    fetch("../controllers/venta.php", {
        method: 'POST',
        body: parametros
    })
    .then(respuesta => {
        if (respuesta.ok) {
            Swal.fire({
                icon: 'success',
                title: 'Venta Actualizada',
                html: 'Se ha agregado a la deuda'
            })
        } else {
            throw new Error('Error en la solicitud');
        }
    })
    .catch(error => {
        console.error(error);
    });
}


list();