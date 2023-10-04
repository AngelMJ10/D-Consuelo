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
            tbody += `
                <tr>
                    <td>${contador}</td>
                    <td>${element.producto}</td>
                    <td>${element.precio}</td>
                    <td>${element.fecha_creacion}</td>
                    <td>${element.estado}</td>
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
            tbody += `
                <tr>
                    <td>${contador}</td>
                    <td>${element.producto}</td>
                    <td>${element.precio}</td>
                    <td>${element.fecha_creacion}</td>
                    <td>${element.estado}</td>
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

listP();

const btnBebida = document.querySelector("#list-bebidas");
btnBebida.addEventListener("click", listB);

const btnPlatos = document.querySelector("#list-platos");
btnPlatos.addEventListener("click", listP);