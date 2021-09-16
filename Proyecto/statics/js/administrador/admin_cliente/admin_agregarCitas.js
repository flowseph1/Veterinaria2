const idCliente = document.querySelector('#idCliente');
idCliente.addEventListener("keyup", () => {
    location.href = location.pathname + "?idCliente=" + idCliente.value;
})

//Click en submit formulario
const form = document.querySelector("#formulario1");
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

    let parameters = "?idCliente=" + idCliente.value +
        "&mascota=" + selectMascota.options[selectMascota.selectedIndex].value +
        "&veterinario=" + veterinario.options[veterinario.selectedIndex].value +
        "&date=" + fecha.value +
        "&motivo=" + motivoCita.innerHTML;

    location.href = location.pathname;
    location.href = parameters;
})

if (typeof (document.querySelector('#hiddenIdCliente')) != "undefined" && document.querySelector('#hiddenIdCliente') != null) {
    const hiddenIdCliente = document.querySelector('#hiddenIdCliente');
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


const agendarCita = () => {
    form.submit();
}