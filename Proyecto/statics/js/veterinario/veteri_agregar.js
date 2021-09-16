var mascota = document.getElementByName("mascota");
var horario = document.getElementByName("horario");
var idCita = document.getElementByName("id");
var fechaCita = document.getElementByName("fecha");
var motivoCita = document.getElementByName("motivo");
const inputs = document.querySelectorAll(".entrada");
const tablaMacotas = document.getElementById("tb-mascotas");
const btonLimpiar = document.getElementById("limpiar-button");
const btonAgregar = document.querySelector(".boton verde");
const btonEliminar = document.querySelector(".boton-mascota.rojo");
const allInputs = document.querySelectorAll("input");

var cita = [];
const msjExito = document.querySelector(".msj-exito");
const mostrarMsj = () => {
    msjExito.style.display = "block";
}

msjExito.addEventListener("animationend", () => {
    msjExito.style.display = "none";
})

//Agregar cita, validacion de cita duplicada.
btonAgregar.addEventListener("click", () => {
    let condicionante = false;
    if (cita.length == 0) {
        var cita = {
            mascota : mascota.options[mascota.selectedIndex].value,
            horario: horario.options[horario.selectedIndex].value,
            fechaCita: fechaCita.value,
            motivoCita: motivoCita.value,
        }
        cita.push(cita);
        agregarCita(cita.mascota, cita.horario, cita.fechaCita, cita.motivoCita);
        mostrarMsj();
    } else {
        for (let index = 0; index < cita.length; index++) {
            if (mascota.value == cita[index].mascota) {
                condicionante = true;
                break;
            }
        }
        if (condicionante) {
            duplicado();
        } else {
            var cita = {
                mascota : mascota.options[mascota.selectedIndex].value,
                horario: horario.options[horario.selectedIndex].value,
                fechaCita: fechaCita.value,
                motivoCita: motivoCita.value,
            }
            cita.push(cita);
            agregarCita(cita.mascota); //Funcion para Agregar Cita en GUI
            mostrarMsj();
        }
    }

    /**let numberPet = mascotas.length; // Numero de mascotas agregadas.*/

     //Agregar Datos a input hiddens
     const columna3 = document.querySelector(".columna3");
     let infoMascota = document.createElement("div");
     let nombreMascota = document.createElement("input");
     let horarioCita = document.createElement("input");
     let fechaCita = document.createElement("input");
     let motivoCita = document.createElement("input");
 
     infoMascota.setAttribute("class", "inputs-mascota");
     nombreMascota.setAttribute("type", "hidden");
     horarioCita.setAttribute("type", "hidden");
     fechaCita.setAttribute("type", "hidden");
     motivoCita.setAttribute("type", "hidden");
        /** 
     nombreMascota.setAttribute("name", "mascota[" + numberPet + "]" + "[nombreMascota]");
     fechaNacimiento.setAttribute("name", "mascota[" + numberPet + "]" + "[fechaMascota]");
     sexoMascota.setAttribute("name", "mascota[" + numberPet + "]" + "[sexoMascota]");
     especieMascota.setAttribute("name", "mascota[" + numberPet + "]" + "[especieMascota]");
     razaMascota.setAttribute("name", "mascota[" + numberPet + "]" + "[razaMascota]");
        */
     nombreMascota.value = cita.nombre;
     horarioCita.value = cita.horario;
     fechaCita.value = cita.fecha;
     motivoCita.value = cita.motivo;
 
     infoMascota.appendChild(nombreMascota);
     infoMascota.appendChild(fechaNacimiento);
     infoMascota.appendChild(fechaCita);
     infoMascota.appendChild(motivoCita);
 
     columna3.appendChild(infoMascota);
 })


 const formulario = () => {
    let condicionante = false;
    const values = document.querySelectorAll(".values");
    const formulario = document.querySelector("#formularioAgregar");

    for (let index = 0; index < 5; index++) {
        if (values[index].children[0].value == "") {
            mostrarAlerta(values[index].children[2])
        } else {
            condicionante = true;
        }
    }

    if (condicionante) {
        formulario.submit();
    }
}

//Tabla Click
var index;
function filas(event) {

    const limpiar = document.getElementsByClassName("btn-limpiar");
    const filas = document.getElementsByClassName("filas");
    const bloqueo2 = document.getElementById("bloqueo2");
    const eliminar = document.querySelector(".boton-mascota.rojo");

    for (let index = 0; index < filas.length; index++) {
        filas[index].style.backgroundColor = '';
        filas[index].style.color = '';
    }
    event.currentTarget.style.backgroundColor = '#58585846';
    event.currentTarget.style.color = '#eeeeee';
    bloqueo2.style.display = "none";
    eliminar.style.opacity = "1";

    //Get index.
    let parent = event.currentTarget.parentNode;
    index = Array.prototype.indexOf.call(parent.children, event.currentTarget);
}

// Accion de Boton limpiar.
btonLimpiar.addEventListener("click", () => {
    const select = document.querySelectorAll("select");
    const listaMascotas = document.querySelector(".lista-mascotas");
    allInputs.forEach(item => {
        item.value = "";
    })
    select.forEach(item => {
        item.selectedIndex = 0;
    })
    listaMascotas.innerHTML = "";
    cita = [];
})

const eliminarFila = () => {
    const eliminar = document.querySelector(".boton-mascota.rojo");
    const bloqueo2 = document.getElementById("bloqueo2");
    const body = document.getElementsByTagName("tbody")[0];
    body.removeChild(body.children[index]);
    mascotas.splice(index);
    eliminar.style.opacity = 0.4;
    bloqueo2.style.display = "block";
}

const mostrarAlerta = (item) => {
    item.style.display = "Block";
}

const alerta = document.querySelectorAll(".input-alerta");

alerta.forEach((item) => {
    item.addEventListener("animationend", () => {
        item.style.display = "none";
    })
});




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