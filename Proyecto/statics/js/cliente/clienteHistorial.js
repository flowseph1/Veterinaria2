const select = document.querySelector("#seleccioneMascota");
select.addEventListener("change", () => {
    let idMascota = select.options[select.selectedIndex].value;
    let link = "historial.php?mascota=" + idMascota + "&historial=last";
    location.href = link;
})


//Completa radioBoxes.
const condicion = document.querySelectorAll('input[name="condicion"]');
const estadoReproductivo = document.querySelectorAll('input[name="estadoReproductivo"]');
const alimentacion = document.querySelectorAll('input[name="alimentacion"]');
const consumo = document.querySelectorAll('input[name="consumo"]');
const comportamiento = document.querySelectorAll('input[name="comportamiento"]');
const postrado = document.querySelectorAll('input[name="postrado"]');
const comoCamina = document.querySelectorAll('input[name="comoCamina"]');
const pelaje = document.querySelectorAll('input[name="pelaje"]');
const mucosaOcular = document.querySelectorAll('input[name="ocular"]');
const mucosaBucal = document.querySelectorAll('input[name="bucal"]');
const mucosaNasal = document.querySelectorAll('input[name="nasal"]');

let valorCondicion = document.querySelector("#condicionCorporal").value - 1;
condicion[valorCondicion].checked = true;

let valorEstadoReproductivo = document.querySelector("#estadoReproductivo").value - 1;
estadoReproductivo[valorEstadoReproductivo].checked = true;

let valorAlimentacion = document.querySelector("#tipoAlimento").value - 1;
alimentacion[valorAlimentacion].checked = true;

let valorConsumoAlimento = document.querySelector("#consumoAlimento").value - 1;
consumo[valorConsumoAlimento].checked = true;

let valorComportamiento = document.querySelector("#comportamiento").value - 1;
comportamiento[valorComportamiento].checked = true;

let valorEstadoAnimal = document.querySelector("#estadoAnimal").value - 1;
postrado[valorEstadoAnimal].checked = true;

let valorEstadoCaminar = document.querySelector("#estadoCaminar").value - 1;
comoCamina[valorEstadoCaminar].checked = true;

let valorPelaje = document.querySelector("#pelaje").value - 1;
pelaje[valorPelaje].checked = true;

let valorMucosaOcular = document.querySelector("#mucosaOcular").value - 1;
mucosaOcular[valorMucosaOcular].checked = true;

let valorMucosaBucal = document.querySelector("#mucosaBucal").value - 1;
mucosaBucal[valorMucosaBucal].checked = true;

let valorMucosaNasal = document.querySelector("#mucosaNasal").value - 1;
mucosaNasal[valorMucosaNasal].checked = true;


//Historial boton opcion

const historialOpcion = document.querySelectorAll(".historial-opcion");

historialOpcion.forEach((item) => {

    item.addEventListener("click", (event) => {
        let idMascota = document.querySelector("#idMascota").value;
        let idHistorial = event.currentTarget.children[0].children[1].innerText;
        location.href = 'historial.php?mascota=' + idMascota + '&historial=' + idHistorial;
    })

})