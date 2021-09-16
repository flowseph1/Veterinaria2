

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


// Al hacer click fuera de opcion mascota se quita menu de mascotas.
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


//Click en submit formulario
const form = document.querySelector("form");
const boton = document.querySelector(".boton.verde");

boton.addEventListener('click', () => {
    form.submit();
})


const inputMascota = document.querySelector("#inputMascota").value;

const option = document.querySelector("option[value='" + inputMascota + "']");
option.selected = true;

const fecha = document.querySelector('#fecha');
const selectMascota = document.querySelector('#mascotas');
const veterinario = document.querySelector('#veterinario');
const motivoCita = document.querySelector('textarea');

fecha.addEventListener("change", () => {

    let parameters = "?mascota=" + selectMascota.options[selectMascota.selectedIndex].value +
        "&veterinario=" + veterinario.options[veterinario.selectedIndex].value +
        "&date=" + fecha.value +
        "&motivo=" + motivoCita.innerHTML;

    location.href = location.pathname;
    location.href = parameters;
})

if (typeof (document.querySelector('#hiddenMascota')) != "undefined" && document.querySelector('#hiddenMascota') != null) {
    const hiddenMascota = document.querySelector('#hiddenMascota');
    const hiddenVeterinario = document.querySelector('#hiddenVeterinario');
    const hiddenFecha = document.querySelector('#hiddenFecha');
    const hiddenMotivo = document.querySelector('#hiddenMotivo');

    fecha.value = hiddenFecha.value;
    selectMascota.value = hiddenMascota.value;
    veterinario.value = hiddenVeterinario.value;
    motivoCita.value = hiddenMotivo.value;
}

const transformarHorario = (horarios) => {
    horarios = horarios.substring(0, horarios.length - 3);
    return horarios;
}

const horariosOcupados = document.querySelectorAll('.horarioOcupado');
horariosOcupados.forEach(element => {
    let horarioTransformado = transformarHorario(element.value);
    let option = document.querySelector('option[value="' + horarioTransformado + '"]');
    option.setAttribute("disabled", "disabled");
    option.innerHTML = option.innerHTML + " OCUPADO";
})



