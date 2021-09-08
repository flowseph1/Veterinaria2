const mascotas = document.querySelectorAll(".mascota-perfil");
const mascotaOpciones = document.querySelectorAll(".mascota-opciones");

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



const agendarCita = (event) => {
    //Se agrega idMascota a boton de agregarCita en Mascotas
    const idMascota = document.querySelectorAll("#idMascota");
    const tarjetaContent = document.querySelectorAll(".tarjeta-content");
    const parent = event.currentTarget.parentNode.parentNode.parentNode;

    let index = Array.from(tarjetaContent[1].children).indexOf(parent);
    //Obtener index de ids Mascotas
    location.href = "/Proyecto/modules/cliente/citas/agendar_Cita.php?idMascota=" + idMascota[index].value;
}

const historialMascota = (event) => {
    //Se agrega idMascota a boton de agregarCita en Mascotas
    const idMascota = document.querySelectorAll("#idMascota");
    const tarjetaContent = document.querySelectorAll(".tarjeta-content");
    const parent = event.currentTarget.parentNode.parentNode.parentNode;

    let index = Array.from(tarjetaContent[1].children).indexOf(parent);
    location.href = "/Proyecto/modules/cliente/historial/historial.php?mascota=" + idMascota[index].value + "&historial=last";
}