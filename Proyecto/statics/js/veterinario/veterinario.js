const mascotas = document.querySelectorAll(".mascota-perfil");
const mascotaOpciones = document.querySelectorAll(".mascota-opciones");

// Seleccion de Mascota / Al hacer click se muestran opciones de mascotas.
mascotas.forEach((mascota) => {
    mascota.addEventListener("click", (event) => {

        for (let i = 0; i < mascotaOpciones.length; i++) {
            mascotaOpciones[i].style.display = "none";
            mascotas[i].style.backgroundColor = "";
            mascotas[i].style.color = "";
        }
        let hijo = event.currentTarget;
        let parent = event.currentTarget.parentNode;
        let abuelo = parent.parentNode;
        let bisabuelo = abuelo.parentNode;
        let index = Array.from(bisabuelo.children).indexOf(abuelo);
        mascotaOpciones[index].style.display = "block";
        hijo.style.backgroundColor = "#363636a9"
        hijo.style.color = "#eeeeee"
    })
})

// Deseleccionar Mascota en Cliente USER.
document.addEventListener("click", (event) => {
    let cond = false;


    mascotas.forEach((item) => {
        if (item.contains(event.target)) {
            cond = true;
        }

    })

    if (cond) {
    } else {
        mascotaOpciones.forEach((item) => {
            item.style.display = "none";

        })
        mascotas.forEach((item) => {
            item.style.backgroundColor = "";
            item.style.color = "";
        })
    }

})

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
    mascota.innerHTML = '"' + clienteFilas[numeroDeFila].children[1].textContent.toLocaleUpperCase() + '"';
    idCita.value = clienteFilas[numeroDeFila].children[0].textContent;
}

const eliminarCliente = () => {
    const formulario = document.querySelector("#form2");
    formulario.submit();
}