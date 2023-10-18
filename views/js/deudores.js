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
                <tr>
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

list();