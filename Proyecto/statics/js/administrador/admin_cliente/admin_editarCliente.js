// Al dar click fuera de filas se quita fondo gris.
document.addEventListener("click", (event) => {
    const filasMacotas = document.querySelectorAll(".filas");
    var cond;
    filasMacotas.forEach((item) => {
        if (item.contains(event.target)) {
            cond = true;
        }
    })

    if (cond) {
        console.log("dentro");
    } else {
        filasMacotas.forEach((item) => {
            item.style.backgroundColor = "";
            item.style.color = "";
        })
        const bloqueo2 = document.getElementsByClassName("bloqueo2")[0];
        const eliminar = document.querySelector(".boton-mascota.rojo");
        bloqueo2.style.display = "block";
        eliminar.style.opacity = 0.4;
    }
})

//Llenar arreglo de mascotas.
const opcionMascotas = document.querySelectorAll(".opcion-mascota");
opcionMascotas.forEach(item => {
    let mascota2 = {
        nombre: item.children[3].value,
        date: item.children[4].value,
        sexo: item.children[5].value,
        especie: item.children[6].value,
        raza: item.children[7].value
    }
    mascotas.push(mascota2);
});


//Editar Mascota - Click en mascota para mostrar en formulario
const nombreMascota = document.querySelector("#nameMascota");
const fechaMascotas = document.querySelector("#dateMascota");
const sexoMascotas = document.querySelector("#sexMascota");
const especieMascotas = document.querySelector("#especie");
const razaMascotas = document.querySelector("#raza");
var sexo = 0;
opcionMascotas.forEach((item) => {
    item.addEventListener("click", () => {
        nombreMascota.value = item.children[3].value;
        fechaMascotas.value = item.children[4].value;
        if (item.children[5].value.toLowerCase() == "femenino" ||
            item.children[5].value.toLowerCase() == "hembra") {
            sexo = 2;
        }
        if (item.children[5].value.toLowerCase() == "masculino" ||
            item.children[5].value.toLowerCase() == "macho") {
            sexo = 1;
        }
        sexoMascotas.options[sexo].selected = true;
        especieMascotas.selectedIndex = item.children[6].value
        razaMascotas.selectedIndex = item.children[7].value
    })
})