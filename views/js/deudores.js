const tablaD = document.querySelector("#tabla-deudores");
const tbodyD = tablaD.querySelector("tbody");
let idPersona = 0;

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
                <tr ondblclick='get_debts(${element.iddeudor})'>
                    <td data-label='#'>${contador}</td>
                    <td data-label='Nombre'>${element.nombre}</td>
                    <td data-label='Apellidos'>${element.apellidos}</td>
                    <td data-label='Deudas'>${element.deudas}</td>
                    <td data-label='Total'>S/ ${element.total}</td>
                    <td data-label='Estado'><span class='badge rounded-pill' style='background-color: #005478'>${estado}</td>
                    <td data-label='Acción'>
                        <a class='btn btn-sm btn-outline-success' type='button' onclick='get(${element.idpersona})'>
                        <i class="fa-regular fa-pen-to-square"></i>
                        </a>
                    </td>
                </tr>
            `;
            contador++;
        });
        tbodyD.innerHTML = tbody;
    })
}

// Para abrir el modal de edición
function get(id){
    const nombre_edit = document.querySelector("#nombre-editar");
    const apellidos_edit = document.querySelector("#apellidos-editar");
    const telefono_edit = document.querySelector("#telefono-editar");
    const direccion_edit = document.querySelector("#direccion-editar");
    const modalDatos = document.querySelector("#modal-editar");
    const bootstrapModal = new bootstrap.Modal(modalDatos);
    bootstrapModal.show();
    const parametros = new URLSearchParams();
    parametros.append("op", "get");
    parametros.append("idpersona", id);
    fetch("../controllers/deuda.php", {
        method: 'POST',
        body: parametros
    })
    .then(respuesta => respuesta.json())
    .then(datos => {
        nombre_edit.value = datos.nombre;
        apellidos_edit.value = datos.apellidos;
        telefono_edit.value = datos.telefono;
        direccion_edit.value = datos.direccion;
        idPersona = datos.idpersona;
        console.log(idPersona);
    })
    .catch(error => {
        console.error(error);
    });
}

// Para editar a la persona
function edit_person(){
    const nombre_edit = document.querySelector("#nombre-editar");
    const apellidos_edit = document.querySelector("#apellidos-editar");
    const telefono_edit = document.querySelector("#telefono-editar");
    const direccion_edit = document.querySelector("#direccion-editar");
    const parametros = new URLSearchParams();
    parametros.append("op", "edit_person")
    parametros.append("nombre", nombre_edit.value)
    parametros.append("apellidos", apellidos_edit.value)
    parametros.append("telefono", telefono_edit.value)
    parametros.append("direccion", direccion_edit.value)
    parametros.append("idpersona", idPersona)
    fetch("../controllers/deuda.php", {
        method: 'POST',
        body: parametros
    })
    .then(respuesta => {
        if (respuesta.ok) {
            Swal.fire({
                icon: 'success',
                title: 'Persona actualizada',
                html: `Se ha editado a la persona ${nombre_edit.value}`
            })
            return;
        }
    })
}

// Para registrar a la persona
async function register_person(){
    const txtNombre = document.querySelector("#nombre");
    const txtApellidos = document.querySelector("#apellidos");
    const txtTelefono = document.querySelector("#telefono");
    const txtDireccion = document.querySelector("#direccion");

    const parametros = new URLSearchParams();
    parametros.append("op", "registerPerson")
    parametros.append("nombre", txtNombre.value)
    parametros.append("apellidos", txtApellidos.value)
    parametros.append("telefono", txtTelefono.value)
    parametros.append("direccion", txtDireccion.value)
    fetch("../controllers/deuda.php", {
        method: 'POST',
        body: parametros
    })
    .then(respuesta => {
        if (respuesta.ok) {
            Swal.fire({
                icon: 'success',
                title: 'Persona registrada',
                html: 'Se ha registrado una persona'
            })
            return;
        }
    })
}

// Función que obtiene el ultino idpersona creado
async function get_idpersona(){
    const parametros = new URLSearchParams();
    parametros.append("op", "getPersona");
    fetch("../controllers/deuda.php", {
        method: 'POST',
        body: parametros
    })
    .then(respuesta => respuesta.json())
    .then(datos => {
        register_debtor(datos.idpersona);
    })
    .catch(error => {
        console.error(error);
    });
}

// Función que registra al deudor
function register_debtor(id){
    const parametros = new URLSearchParams();
    parametros.append("op", "registerDebtor")
    parametros.append("idpersona", id)
    fetch("../controllers/deuda.php", {
        method: 'POST',
        body: parametros
    })
    .then(respuesta => {
        if (respuesta.ok) {
            Swal.fire({
                icon: 'success',
                title: 'Deudor registrado',
                html: 'Se ha registrado un nuevo deudor'
            })
            return;
        }
    })
}

// Función para registrar a la persona y al deudor
function register_deudor(){
    const txtNombre = document.querySelector("#nombre");
    const txtApellidos = document.querySelector("#apellidos");
    const txtTelefono = document.querySelector("#telefono");
    const txtDireccion = document.querySelector("#direccion");

    if (!txtNombre.value || !txtApellidos.value || !txtTelefono.value || !txtDireccion.value) {
        Swal.fire({
            icon: 'warning',
            title: 'Campos incompletos',
            text: 'Por favor, completa todos los campos.',
        });
        return;
    }
    
    Swal.fire({
        icon: 'question',
        title: 'Confirmación',
        text: '¿Está seguro de los datos ingresados?',
        showCancelButton: true,
        confirmButtonText: 'Si',
        cancelButtonText: 'No',
    })
    .then(async (result) => { // Marca la función como async aquí
        if (result.isConfirmed) {
            await register_person();
            await get_idpersona();
        }
    });
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
    const modalCarrito = document.querySelector("#modal-ventas");
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

const btnRegister = document.querySelector("#registrar-deudor")
btnRegister.addEventListener("click", register_deudor);

const btnEditar = document.querySelector("#editar-deudor")
btnEditar.addEventListener("click", edit_person);


list();