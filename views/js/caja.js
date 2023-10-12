const tablaCarro = document.querySelector("#tabla-carrito");
const tbodyCarro = tablaCarro.querySelector("tbody");
const modalCarrito = document.querySelector("#modal-carrito");
const listaB = document.querySelector("#lista-bebidas");
const listaP = document.querySelector("#lista-platos");

// Listar platos
function listP(){
    const parametros = new URLSearchParams();
    parametros.append("op", "list");
    parametros.append("tipo", "P");
    fetch('../controllers/producto.php', {
        method: 'POST',
        body: parametros
    })
    .then(respuesta => respuesta.json())
    .then(data => {
        let contador = 1;
        let cardRow = '<div class="row">'; // Iniciar una nueva fila de tarjetas

        data.forEach(element => {
            const estado = element.estado == 1 ? 'Activo' : element.estado == 0 ? 'Inactivo' : element.estado;
            // Formatear el precio con dos decimales fijos
            const precioSinDecimales = parseFloat(element.precio).toString();
            
            // Agregar una tarjeta a la fila actual
            cardRow += `
                <div class='col-md-3 mt-3' onclick='ordenar(${element.idproducto})'>
                    <div class="card card-hover border-success" id='carrito-flotante'>
                        <div class='card-header text-bg-success'>
                            <p class='fs-5'><b>${element.producto}</b> </p>
                        </div>
                        <div class="card-body">
                            <p class='fs-5'>Precio: <b>S/. ${precioSinDecimales} </b></p>
                            <p class='fs-5'>Estado: <span class='badge rounded-pill bg-success'>${estado}</td></p>
                        </div>
                    </div>
                </div>
            `;

            // Si se han agregado 4 tarjetas, cerrar la fila actual y comenzar una nueva
            if (contador % 4 === 0) {
                cardRow += '</div>'; // Cerrar la fila actual
                listaP.innerHTML += cardRow; // Agregar la fila al contenedor
                cardRow = '<div class="row">'; // Iniciar una nueva fila
            }
            contador++;
        });

        // Si queda alguna fila sin cerrar, ciérrala
        if (contador % 4 !== 1) {
            cardRow += '</div>';
            listaP.innerHTML += cardRow;
        }
    })
}

// Listar bebidas
function listB(){
    const parametros = new URLSearchParams();
    parametros.append("op", "list");
    parametros.append("tipo", "B");
    fetch('../controllers/producto.php', {
        method: 'POST',
        body: parametros
    })
    .then(respuesta => respuesta.json())
    .then(data => {
        listaP.classList.add('d-none')
        let contador = 1;
        let cardRow = '<div class="row">'; // Iniciar una nueva fila de tarjetas

        data.forEach(element => {
            const estado = element.estado == 1 ? 'Activo' : element.estado == 0 ? 'Inactivo' : element.estado;
            // Formatear el precio con dos decimales fijos
            const precioSinDecimales = parseFloat(element.precio).toString();
            
            // Agregar una tarjeta a la fila actual
            cardRow += `
            <div class='col-md-3 mt-3' onclick='ordenar(${element.idproducto})'>
                <div class="card card-hover border-primary">
                    <div class='card-header text-bg-primary'>
                        <p class='fs-5'><b>${element.producto}</b> </p>
                    </div>
                    <div class="card-body">
                        <p class='fs-5'>Precio: <b>S/. ${precioSinDecimales} </b></p>
                        <p class='fs-5'>Stock: <b>${element.stock} </b></p>
                    </div>
                </div>
            </div>
        `;

            // Si se han agregado 4 tarjetas, cerrar la fila actual y comenzar una nueva
            if (contador % 4 === 0) {
                cardRow += '</div>'; // Cerrar la fila actual
                listaB.innerHTML += cardRow; // Agregar la fila al contenedor
                cardRow = '<div class="row">'; // Iniciar una nueva fila
            }
            contador++;
        });

        // Si queda alguna fila sin cerrar, ciérrala
        if (contador % 4 !== 1) {
            cardRow += '</div>';
            listaB.innerHTML += cardRow;
        }
    })
}

// Función para cambiar a la vista de platos
function limpiarB() {
    listaB.classList.add('d-none');
    listaP.classList.remove('d-none');
}

// Funciñon para cambiar a la vista de bebidas
function limpiarP() {
    listaB.classList.remove('d-none');
    listaP.classList.add('d-none');
}

let idPedido = 0;


// Para registrar un pedido
function pedir() {
    const parametros = new URLSearchParams();
    parametros.append("op", "register_Pedido");
    return fetch("../controllers/venta.php", {
        method: 'POST',
        body: parametros
    })
    .then(respuesta => respuesta.ok);
}

// Para obtener el ultimo pedido registrado
async function getIDP() {
    const parametrosP = new URLSearchParams();
    parametrosP.append("op", "get_pedido");
    const respuesta = await fetch("../controllers/venta.php", {
        method: 'POST',
        body: parametrosP
    });
    const datos = await respuesta.json();
    idPedido = datos.idpedido;
}

// Pare registrar las ordenes del pedido
function realizar_pedido(idP, cantidad){
    const parametros = new URLSearchParams();
    parametros.append("op", "register_Detalle_Pedido");
    parametros.append("idpedido", idPedido);
    parametros.append("idproducto", idP);
    parametros.append("cantidad", cantidad);
    fetch("../controllers/venta.php", {
        method: 'POST',
        body: parametros
    })
    .then(respuesta => respuesta.ok)
}

// Para ejecutar la función realizar_pedido(), el numero de veces que las filas de la tabla
async function register_order(){
    let filasExistente = tbodyCarro.querySelectorAll("tr");
    for (let i = 0; i < filasExistente.length; i++) {
        let fila = filasExistente[i];
        let idproducto = fila.getAttribute("data-id")
        let cantidad = fila.querySelector("td:nth-child(4) input");
        let cantidadActual = parseInt(cantidad.value);
        realizar_pedido(idproducto, cantidadActual);
    }
}

// Se ejecutan las 4 funciones(pedir(),getIDP(), registerORder() y realizar_venta())
async function venta() {
    let txtTotal = document.querySelector("#total").value;
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
            await pedir();
            await getIDP();
            await register_order();
            await realizar_venta(txtTotal);
            location.reload();
        }
    });
}

// Se registra la venta
async function realizar_venta(total) {
    const parametros = new URLSearchParams();
    parametros.append("op", "register_Venta");
    parametros.append("idpedido", idPedido);
    parametros.append("total", total);
    fetch("../controllers/venta.php", {
        method: 'POST',
        body: parametros
    })
    .then(respuesta => {
        if (respuesta.ok) {
            Swal.fire({
                icon: 'success',
                title: 'Venta realizada',
                html: 'Se ha registrado la venta'
            })
        } else {
            throw new Error('Error en la solicitud');
        }
    })
    .catch(error => {
        console.error(error);
    });
}

let contadorCarrito = 1;
let tbody = "";

// Función que le aumenta un numero al carrito
function numerarPedidos() {
    const filasExistente = tbodyCarro.querySelectorAll("tr");
    const carritoCantidad = document.getElementById("carritoCantidad");
    let contador = 0;

    for (let i = 0; i < filasExistente.length; i++) {
        const fila = filasExistente[i];
        const cantidad = parseInt(fila.querySelector("td:nth-child(4) input").value);

        if (!isNaN(cantidad)) {
            contador += cantidad;
        }
    }
    // Actualiza el elemento HTML con el contador
    carritoCantidad.textContent = contador;
}

// Calcular el total de las venta
function total(){
    let labelTotal = document.querySelector("#total");
    const filasExistente = tbodyCarro.querySelectorAll("tr");
    let sumaTotal = 0;

    for (let i = 0;  i< filasExistente.length; i++) {
        const fila = filasExistente[i];
        const valorT = parseFloat(fila.querySelector("td:nth-child(5)").textContent);
        if (!isNaN(valorT)) {
            sumaTotal += valorT;
        }
    }
    labelTotal.value = sumaTotal.toFixed(2);
}

// Crea las ordenes
function ordenar(id) {
    let filasExistente = tbodyCarro.querySelectorAll("tr");
    let filaExistente = null;

    for (let i = 0; i < filasExistente.length; i++) {
        let fila = filasExistente[i];
        let idfila = fila.getAttribute("data-id");
        if (idfila == id) {
            numerarPedidos();
            filaExistente = fila;
            break;
        }
    }

    if (filaExistente) {
        let cantidadElement = filaExistente.querySelector("td:nth-child(4) input");
        let cantidadActual = parseInt(cantidadElement.value);
        let nuevaCantidad = cantidadActual + 1;
        cantidadElement.value = nuevaCantidad;
        const precioSinDecimales = parseFloat(filaExistente.querySelector("td:nth-child(3)").textContent);
        let totalV = nuevaCantidad * precioSinDecimales;
        filaExistente.querySelector("td:nth-child(5)").textContent = totalV.toFixed(2);
        total();
        numerarPedidos();
    } else {
        const parametros = new URLSearchParams();
        parametros.append("op", "get");
        parametros.append("idproducto", id);
        fetch("../controllers/producto.php", {
            method: 'POST',
            body: parametros
        })
        .then(respuesta => respuesta.json())
        .then(datos => {
            const precioSinDecimales = parseFloat(datos.precio);
            let cantidadPedido = 1;
            let total1 = cantidadPedido * precioSinDecimales;

            // Crear una nueva fila de producto
            let nuevaFila = `
                <tr data-id="${datos.idproducto}">
                    <td data-label='#'>${contadorCarrito}</td>
                    <td data-label='Producto'>${datos.producto}</td>
                    <td data-label='Precio'>${precioSinDecimales.toFixed(2)}</td>
                    <td data-label='Cantidad'>
                        <button type='button' class='btn btn-sm btn-outline-primary' onclick="subirCantidad(this)">+</button>
                        <input class='form-control-sm' type="number" value="${cantidadPedido}" oninput="validarCantidad(this)">
                        <button type='button' class='btn btn-sm btn-outline-danger' onclick="bajarCantidad(this)">-</button>
                    </td>
                    <td data-label='Total'>${total1.toFixed(2)}</td>
                    <td data-label='Eliminar'><button title='Eliminar selección' class='btn btn-outline-danger btn-sm' onclick="eliminarFila(this)"> - </button></td>
                </tr>
            `;

            // Agregar la nueva fila al final del tbody sin eliminar las anteriores
            tbodyCarro.insertAdjacentHTML('beforeend', nuevaFila);
            numerarPedidos();
            total();
            contadorCarrito++;
        });
    }
}

// Elimina una fila
function eliminarFila(botonEliminar) {
    const fila = botonEliminar.closest("tr");
    fila.remove();
    // Llama a la función para actualizar el total u otros cálculos si es necesario
    numerarPedidos();
    total();
}

// Sube la cantidad
function subirCantidad(button) {
    const inputCantidad = button.parentElement.querySelector("input");
    let cantidad = parseInt(inputCantidad.value) || 0;
    cantidad += 1;
    inputCantidad.value = cantidad;
    actualizarTotal(button.parentElement.parentElement);
}

// Baja la cantidad
function bajarCantidad(button){
    const inputCantidad = button.parentElement.querySelector("input");
    let cantidad = parseInt(inputCantidad.value) || 0;
    if (cantidad > 1) {
        cantidad -= 1;
        inputCantidad.value = cantidad;
        actualizarTotal(button.parentElement.parentElement);
    }
}

// Valida que la cantidad nunca sea 0
function validarCantidad(input) {
    let cantidad = parseInt(input.value) || 0;
    if (cantidad < 1) {
        input.value = 1;
    }
    actualizarTotal(input.parentElement.parentElement);
}

function actualizarTotal(fila) {
    const precio = parseFloat(fila.querySelector("td:nth-child(3)").textContent);
    const cantidad = parseInt(fila.querySelector("td:nth-child(4) input").value);
    const totalElement = fila.querySelector("td:nth-child(5)");
    const totalV = precio * cantidad;
    totalElement.textContent = totalV;
    total();
}

function abrirCarrito(){
    const bootstrapModal = new bootstrap.Modal(modalCarrito);
    bootstrapModal.show();
}

listB();
listP();

const btnVistaB = document.querySelector("#bebidas-vista");
btnVistaB.addEventListener("click", limpiarP);
const btnVistaP = document.querySelector("#platos-vista");
btnVistaP.addEventListener("click", limpiarB);

const btnCarrito = document.querySelector("#carrito");
btnCarrito.addEventListener("click", abrirCarrito);

const btnVenta = document.querySelector("#realizar-venta");
btnVenta.addEventListener("click", venta);