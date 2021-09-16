//Funcion para cancelar cuadro de dialogo para eliminar cliente.
const cancelarEliminar = () => {
    const eliminar = document.querySelector(".eliminar");
    eliminar.style.display = "none";

}

//Funcion para aparecer cuadro de dialogo para eliminar cliente.
const accionEliminar = () => {
    const eliminar = document.querySelector(".eliminar");
    eliminar.style.animation = "fadeIn 0.5s ease-out forwards";
    const ClienteAEliminar = document.querySelector("#nombreClienteEliminado");
    const mascota = document.querySelector("#nombreMascotaCita");
    const idCita = document.querySelector("#idCita");
    eliminar.style.display = "flex";
    ClienteAEliminar.innerHTML = '"' + clienteFilas[numeroDeFila].children[0].textContent.toLocaleUpperCase() + '"';
    mascota.innerHTML = '"' + clienteFilas[numeroDeFila].children[2].textContent.toLocaleUpperCase() + '"';
    idCita.value = clienteFilas[numeroDeFila].children[0].textContent;
}

const eliminarCliente = () => {
    const formulario = document.querySelector("#form2");
    formulario.submit();
}