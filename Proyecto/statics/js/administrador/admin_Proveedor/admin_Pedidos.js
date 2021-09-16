
//Tabla Click
function filas(event) {
    const filas = document.getElementsByClassName("filas");
    const difuminacion = document.getElementsByClassName("difuminacion")[0];
    const editar = document.getElementById("editar");
    const eliminar = document.getElementById("eliminar");

    for (let index = 0; index < filas.length; index++) {
        filas[index].style.backgroundColor = '';
        filas[index].style.color = '';
    }
    event.currentTarget.style.backgroundColor = '#58585846';
    event.currentTarget.style.color = '#eeeeee';
    editar.style.filter = "opacity(1)"
    eliminar.style.filter = "opacity(1)"
    difuminacion.style.display = "none";

    //Guardar ID de Pedido en input hidden.
    let IdPedido = event.currentTarget.children[0].innerHTML;
    const pedidoID = document.getElementById("IdPedido");
    IdPedido.value = pedidoID;
  }

const editar = document.querySelector("#editar");
editar.addEventListener("click", () => {
    const form1 = document.querySelector("#form1");
    form1.submit();
})

//Boton para limpiar busqueda
const limpiar = () => {
    const filas = document.getElementsByClassName("filas");
    const difuminacion = document.getElementsByClassName("difuminacion")[0];
    const editar = document.getElementById("editar");
    const eliminar = document.getElementById("eliminar");
    const buscador = document.getElementById("buscar");

    for (let index = 0; index < filas.length; index++) {
        filas[index].style.backgroundColor = '';
        filas[index].style.color = '';
        filas[index].style.display = "table-row";
    }
    editar.style.filter = "opacity(0.4)"
    eliminar.style.filter = "opacity(0.4)"
    difuminacion.style.display = "block";
    buscador.value = "";
}

//BUSCADOR
const buscador = document.getElementById("buscar");
buscador.addEventListener("keyup", () => {
    let value = buscador.value;
    const filas = document.getElementsByClassName("filas");

    for (let index = 0; index < filas.length; index++) {
        let id = filas[index].children[0].textContent.toLowerCase();
        let nombre = filas[index].children[2].textContent.toLowerCase();

        if (id.includes(value.toLowerCase()) || nombre.includes(value.toLowerCase())) {
            filas[index].style.display = "table-row";
        } else {
            filas[index].style.display = "none";
        }
    }

})


//Total de Filas
const numFilas = document.querySelectorAll(".filas").length;
const totalFilas = document.getElementsByClassName("pedidosTotales")[0];
totalFilas.innerHTML = numFilas;


// Al dar click fuera de filas se quita fondo gris.
const todasFilas = document.querySelectorAll(".filas");
document.addEventListener("click", (event) => {
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
        const difuminacion = document.getElementsByClassName("difuminacion")[0];
        const editar = document.getElementById("editar");
        const eliminar = document.getElementById("eliminar");
        difuminacion.style.display = "block";
        editar.style.filter = "opacity(0.4)";
        eliminar.style.filter = "opacity(0.4)";
    }
})


//Funcion para cancelar cuadro de dialogo para eliminar proveedor.
const cancelarEliminar = () => {
    const eliminar = document.querySelector(".eliminar");
    eliminar.style.display = "none";

}

//Funcion para aparecer cuadro de dialogo para eliminar proveedor.
const accionEliminar = () => {
    const eliminar = document.querySelector(".eliminar");

    eliminar.style.animation = "fadeIn 0.5s ease-out forwards";

    const ProveedorAEliminar = document.querySelector("#nombreProveedorEliminado");
    const idProveedor = document.querySelector("#idProveedorEliminado");
    eliminar.style.display = "flex";
    ProveedorAEliminar.innerHTML = '"' + ProveedorFilas[numeroDeFila].children[1].textContent.toLocaleUpperCase() + '"';
    idProveedor.value = ProveedorFilas[numeroDeFila].children[0].textContent;
}

var numeroDeFila;
const ProveedorFilas = document.querySelectorAll(".filas");
ProveedorFilas.forEach((item) => {
    item.addEventListener("click", () => {
        let parent = item.parentNode;
        let numeroFila = Array.from(parent.children).indexOf(item);
        numeroDeFila = numeroFila;
    })
})

const eliminarProveedor = () => {
    const formulario = document.querySelector("#form2");
    formulario.submit();
}