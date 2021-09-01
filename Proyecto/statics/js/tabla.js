//Tabla Click
function filas(event) {
    const filas = document.getElementsByClassName("filas");
    const bloqueoBoton = document.querySelector(".bloqueo-boton");
    const botonRojo = document.querySelector(".boton.rojo");
    for (let index = 0; index < filas.length; index++) {
        filas[index].style.backgroundColor = '';
        filas[index].style.color = '';
    }
    event.currentTarget.style.backgroundColor = '#58585846';
    event.currentTarget.style.color = '#eeeeee';

    let estadoCita = event.currentTarget.children[5].innerText;
    if (estadoCita == 'Cancelada' || estadoCita == 'Realizada') {
        bloqueoBoton.style.display = "block";
        botonRojo.style.filter = 'opacity(0.4)';
    }
    else {
        bloqueoBoton.style.display = "none";
        botonRojo.style.filter = 'opacity(1)';
    }


    //Guardar ID de cliente en input hidden.
    let clienteId = event.currentTarget.children[0].innerHTML;
    const idCliente = document.getElementById("IdElemento");
    idCliente.value = clienteId;
    //editar.setAttribute("onclick", "location.href = '../admin_Cliente/admin_editarCliente.php?idCliente=" + clienteId);
    //eliminar.setAttribute("onclick", "location.href = '../admin_Cliente/admin_eliminarCliente.php?idCliente=" + clienteId);
}

const limpiar = () => {
    const filas = document.getElementsByClassName("filas");
    const buscador = document.getElementById("buscar");

    for (let index = 0; index < filas.length; index++) {
        filas[index].style.backgroundColor = '';
        filas[index].style.color = '';
        filas[index].style.display = "table-row";
    }

    buscador.value = "";
}

//BUSCADOR
const buscador = document.getElementById("buscar");
buscador.addEventListener("keyup", () => {
    let value = buscador.value;
    const filas = document.getElementsByClassName("filas");

    for (let index = 0; index < filas.length; index++) {
        let id = filas[index].children[0].textContent.toLowerCase();
        let descripcion = filas[index].children[6].textContent.toLowerCase();

        if (id.includes(value.toLowerCase()) || descripcion.includes(value.toLowerCase())) {
            filas[index].style.display = "table-row";
        } else {
            filas[index].style.display = "none";
        }
    }

})

//Total de Filas
const numFilas = document.getElementsByClassName("filas").length;
const totalFilas = document.getElementsByClassName("clientesTotales")[0];
totalFilas.innerHTML = numFilas;

// Al dar click fuera de filas se quita fondo gris.
const todasFilas = document.querySelectorAll(".filas");
document.addEventListener("click", (event) => {
    const bloqueoBoton = document.querySelector(".bloqueo-boton");
    const botonRojo = document.querySelector(".boton.rojo");
    var cond;
    todasFilas.forEach((item) => {
        if (item.contains(event.target)) {
            cond = true;
        }
    })

    if (cond) {
    } else {
        todasFilas.forEach((item) => {
            item.style.backgroundColor = "";
            item.style.color = "";
        })
        bloqueoBoton.style.display = "block";
        botonRojo.style.filter = "opacity(0.4)";
    }
})

var numeroDeFila;
const clienteFilas = document.querySelectorAll(".filas");
clienteFilas.forEach((item) => {
    item.addEventListener("click", () => {
        let parent = item.parentNode;
        let numeroFila = Array.from(parent.children).indexOf(item);
        numeroDeFila = numeroFila;
    })
})
