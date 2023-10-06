const tablaCarro = document.querySelector("#tabla-carrito");
const tbodyCarro = tablaCarro.querySelector("tbody");
const modalCarrito = document.querySelector("#modal-carrito");
const listaB = document.querySelector("#lista-bebidas");
const listaP = document.querySelector("#lista-platos");

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

function pedir(){
    const parametros = new URLSearchParams();
    parametros.append("op", "register_Pedido");
    fetch("../controllers/venta.php", {
        method: 'POST',
        body: parametros
    })
    .then(respuesta => respuesta.ok)
}

function realizar_pedido(idpedido, idP, cantidad){
    const parametros = new URLSearchParams();
    parametros.append("op", "register_Detalle_Pedido");
    parametros.append("idpedido", );
    parametros.append("idproducto", );
    parametros.append("cantidad", );
}

let contadorCarrito = 1;
let tbody = "";

function numerarPedidos() {
    let filasExistente = tbodyCarro.querySelectorAll("tr");
    const carritoCantidad = document.getElementById("carritoCantidad");
    let contador = 1;

    for (let i = 0; i < filasExistente.length; i++) {
        const fila = filasExistente[i];
        let inputCantidad = fila.querySelector("input");

        if (!isNaN(inputCantidad)) {
            contador += inputCantidad;
        }
    }

    console.log(contador);
    // Actualiza el elemento HTML con el contador
    carritoCantidad.textContent = contador;
}

function ordenar(id) {
    let filasExistente = tbodyCarro.querySelectorAll("tr");
    let filaExistente = null;

    for (let i = 0; i < filasExistente.length; i++) {
        let fila = filasExistente[i];
        let idfila = fila.getAttribute("data-id");
        if (idfila == id) {
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
                            <button type='button' class='btn btn-sm btn-outline-primary'>+</button>
                            <input class='form-control-sm' type="number" value="${cantidadPedido}">
                            <button type='button' class='btn btn-sm btn-outline-danger'>-</button>
                    </td>
                    <td data-label='Total'>${total1.toFixed(2)}</td>
                </tr>
            `;

            // Agregar la nueva fila al final del tbody sin eliminar las anteriores
            tbodyCarro.insertAdjacentHTML('beforeend', nuevaFila);

            contadorCarrito++;
        });
    }
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