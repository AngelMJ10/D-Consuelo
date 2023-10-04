const tabla = document.querySelector("#tabla-producto");
const tbodyP = tabla.querySelector("tbody");

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
                    <td>${contador}</td>
                    <td>${element.producto}</td>
                    <td>${precioSinDecimales}</td>
                    <td>${fecha}</td>
                    <td data-label='Stock'><span class='badge rounded-pill' style='background-color: #${color} '>${stock}</td>
                    <td data-label='Estado'><span class='badge rounded-pill' style='background-color: #005478'>${estado}</td>
                    <td>
                        <a class='btn btn-sm btn-outline-success' type='button'>
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
                    <td>${contador}</td>
                    <td>${element.producto}</td>
                    <td>${precioSinDecimales}</td>
                    <td>${fecha}</td>
                    <td data-label='Stock'><span class='badge rounded-pill' style='background-color: #${color} '>${stock}</td>
                    <td data-label='Estado'><span class='badge rounded-pill' style='background-color: #005478'>${estado}</td>
                    <td>
                        <a class='btn btn-sm btn-outline-success' type='button'>
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
                    <td>${contador}</td>
                    <td>${element.producto}</td>
                    <td>${precioSinDecimales}</td>
                    <td>${fecha}</td>
                    <td data-label='Stock'><span class='badge rounded-pill' style='background-color: #${color} '>${stock}</td>
                    <td data-label='Estado'><span class='badge rounded-pill' style='background-color: #005478'>${estado}</td>
                    <td>
                        <a class='btn btn-sm btn-outline-success' type='button'>
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
    const txtProduct = document.querySelector("#product");
    const txtPrecio = document.querySelector("#precio");
    const txtStock = document.querySelector("#stock");
    const parametros = new URLSearchParams();

}

function listarMarcas() {
    const txtMarca = document.querySelector('#marca');
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
    })
    .catch(error => {
        console.error('Error:', error);
    });
}

function viewRegisterP(){
    const titleView = document.querySelector("#titulo-register");
    const viewMarca = document.querySelector("#view-marca");
    const viewStock = document.querySelector("#view-stock");
    const viewProducto = document.querySelector("#view-producto");
    const viewPrecio = document.querySelector("#view-precio");
    const btnRPlato = document.querySelector("#vista-plato");
    const btnRBebida = document.querySelector("#vista-bebida");
    btnRPlato.classList.add("d-none")
    btnRBebida.classList.remove("d-none");
    viewMarca.classList.add("d-none");
    viewStock.classList.add("d-none");

    viewProducto.classList.remove("col-md-3");
    viewProducto.classList.add("col-md-4");

    viewPrecio.classList.remove("col-md-3");
    viewPrecio.classList.add("col-md-4");

    titleView.textContent = "Registrar Plato";
}

function viewRegisterB(){
    const titleView = document.querySelector("#titulo-register");
    const viewMarca = document.querySelector("#view-marca");
    const viewStock = document.querySelector("#view-stock");
    const viewProducto = document.querySelector("#view-producto");
    const viewPrecio = document.querySelector("#view-precio");
    const btnRPlato = document.querySelector("#vista-plato");
    const btnRBebida = document.querySelector("#vista-bebida");
    btnRPlato.classList.remove("d-none")
    btnRBebida.classList.add("d-none");
    viewMarca.classList.remove("d-none");
    viewStock.classList.remove("d-none");

    viewProducto.classList.add("col-md-3");
    viewProducto.classList.remove("col-md-4");

    viewPrecio.classList.add("col-md-3");
    viewPrecio.classList.remove("col-md-4");
    titleView.textContent = "Registrar Bebida";
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