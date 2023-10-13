const tabla = document.querySelector("#tabla-ventas");
const tbodyV = tabla.querySelector("tbody");

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
                <tr>
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

listar();