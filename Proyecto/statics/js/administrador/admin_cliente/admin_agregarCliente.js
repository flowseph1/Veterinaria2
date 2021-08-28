var nombre = document.getElementById("name");
var date = document.getElementById("date");
var sexo = document.getElementById("sexo");
var especie = document.getElementById("especie");
var raza = document.getElementById("raza");
const bloqueo = document.getElementById("bloqueo");
const inputs = document.querySelectorAll(".entrada");
const tablaMacotas = document.getElementById("tb-mascotas");
const btonLimpiar = document.getElementById("limpiar-button");
const btonAgregar = document.querySelector(".boton-mascota.verde");
const btonEliminar = document.querySelector(".boton-mascota.rojo");
const allInputs = document.querySelectorAll("input");

var mascotas = [];


const msjExito = document.querySelector(".msj-exito");
const mostrarMsj = () => {
    msjExito.style.display = "block";
}

msjExito.addEventListener("animationend", () => {
    msjExito.style.display = "none";
})

//Agregar Mascota, validacion de mascota duplicada.
btonAgregar.addEventListener("click", () => {
    let condicionante = false;
    if (mascotas.length == 0) {
        var mascota = {
            nombre: nombre.value,
            date: date.value,
            sexo: sexo.options[sexo.selectedIndex].text.toLowerCase(),
            especie: especie.options[especie.selectedIndex].value,
            raza: raza.options[raza.selectedIndex].value,
        }
        mascotas.push(mascota);
        agregarMascotas(mascota.nombre, mascota.date, mascota.sexo);
        mostrarMsj();
    } else {
        for (let index = 0; index < mascotas.length; index++) {
            if (nombre.value == mascotas[index].nombre) {
                condicionante = true;
                break;
            }
        }
        if (condicionante) {
            duplicado();
        } else {
            var mascota = {
                nombre: nombre.value,
                date: date.value,
                sexo: sexo.options[sexo.selectedIndex].text.toLowerCase(),
                especie: especie.options[especie.selectedIndex].value,
                raza: raza.options[raza.selectedIndex].value,
            }
            mascotas.push(mascota);
            agregarMascotas(mascota.nombre); //Funcion para Agregar Mascota en GUI
            mostrarMsj();
        }
    }

    let numberPet = mascotas.length; // Numero de mascotas agregadas.

    //Agregar Datos a input hiddens
    const columna3 = document.querySelector(".columna3");
    let infoMascota = document.createElement("div");
    let nombreMascota = document.createElement("input");
    let fechaNacimiento = document.createElement("input");
    let sexoMascota = document.createElement("input");
    let especieMascota = document.createElement("input");
    let razaMascota = document.createElement("input");

    infoMascota.setAttribute("class", "inputs-mascota");
    nombreMascota.setAttribute("type", "hidden");
    fechaNacimiento.setAttribute("type", "hidden");
    sexoMascota.setAttribute("type", "hidden");
    especieMascota.setAttribute("type", "hidden");
    razaMascota.setAttribute("type", "hidden");

    nombreMascota.setAttribute("name", "mascota[" + numberPet + "]" + "[nombreMascota]");
    fechaNacimiento.setAttribute("name", "mascota[" + numberPet + "]" + "[fechaMascota]");
    sexoMascota.setAttribute("name", "mascota[" + numberPet + "]" + "[sexoMascota]");
    especieMascota.setAttribute("name", "mascota[" + numberPet + "]" + "[especieMascota]");
    razaMascota.setAttribute("name", "mascota[" + numberPet + "]" + "[razaMascota]");

    nombreMascota.value = mascota.nombre;
    fechaNacimiento.value = mascota.date;
    sexoMascota.value = mascota.sexo;
    especieMascota.value = mascota.especie;
    razaMascota.value = mascota.raza;

    infoMascota.appendChild(nombreMascota);
    infoMascota.appendChild(fechaNacimiento);
    infoMascota.appendChild(sexoMascota);
    infoMascota.appendChild(especieMascota);
    infoMascota.appendChild(razaMascota);

    columna3.appendChild(infoMascota);
})



const duplicado = () => {
    const divDuplicado = document.querySelector(".duplicado");
    divDuplicado.style.display = "block";
    divDuplicado.addEventListener("animationend", () => {
        divDuplicado.style.display = "none";
    })
}

//Se agrega div de mascota en lista de mascotas.
const agregarMascotas = (nombre) => {

    const especie = document.getElementById("especie");
    const listaMacotas = document.querySelector(".lista-mascotas");
    let opcion = document.createElement("div");
    let tituloMascota = document.createElement("div");
    let iconoX = document.createElement("i");
    let iconoX2 = document.createElement("i");
    let nombreMascota = document.createTextNode(nombre);
    opcion.setAttribute("class", "opcion-mascota");
    tituloMascota.setAttribute("class", "opcion-mascota-nombre");
    iconoX.setAttribute("class", "fas fa-times");
    iconoX.setAttribute("onClick", "quitarMascota(event)");

    tituloMascota.appendChild(nombreMascota);


    switch (especie.options[especie.selectedIndex].text) {
        case 'PERRO':
            iconoX2.setAttribute("class", "fas fa-dog");
            break;
        case 'GATO':
            iconoX2.setAttribute("class", "fas fa-cat");
            break;
        default:
            iconoX2.setAttribute("class", "fas fa-paw");
            break;
    }


    opcion.appendChild(iconoX2);
    opcion.appendChild(tituloMascota);
    opcion.appendChild(iconoX);

    listaMacotas.appendChild(opcion);
}

const quitarMascota = (event) => {
    const listaMascotas = document.querySelector(".lista-mascotas");
    const msjDelete = document.querySelector(".msj-delete");
    let mascota = event.currentTarget.parentNode;
    let lista = mascota.parentNode

    const index2 = Array.from(lista.children).indexOf(mascota);
    //let index2 = Array.prototype.indexOf.call(lista.children, event.currentTarget);

    //Se quita mascota de arreglo mascotas.
    mascotas.splice(index2, 1);
    listaMascotas.removeChild(mascota);
    console.log(index2);
    //Se muestra mensaje de Eliminacion.
    msjDelete.style.display = 'block';
    msjDelete.addEventListener("animationend", () => {
        msjDelete.style.display = 'none';
    })

    //Eliminar input de mascota.
    const inputMascota = document.querySelectorAll(".inputs-mascota");
    inputMascota[index2].remove();

    //Reajustar nombre de inputs.
    const inputs = document.querySelectorAll(".inputs-mascota");
    const nameAtributtes = ["nombreMascota", "fechaMascota", "sexoMascota", "especieMascota", "razaMascota"]
    for (let i = 0; i < inputs.length; i++) {
        for (let j = 0; j < inputs[i].children.length; j++) {
            inputs[i].children[j].setAttribute("name", "mascota[" + (i + 1) + "]" + "[" + nameAtributtes[j] + "]");
        }
    }

}

// Boton agregar se habilita una vez se agreguen datos en inputs de seccion mascota.
inputs.forEach(item => {
    item.addEventListener("change", () => {
        if (nombre.value != "" && date.value != "" && sexo.options[sexo.selectedIndex].text != "SELECCIONE"
            && especie.options[especie.selectedIndex].text != "SELECCIONE"
            && raza.options[raza.selectedIndex].text != "SELECCIONE") {
            bloqueo.style.display = "none";
            btonAgregar.style.opacity = 1;
        } else {
            bloqueo.style.display = "block";
            btonAgregar.style.opacity = 0.4;
        }
    })
    item.addEventListener("keyup", () => {
        if (nombre.value == "") {
            bloqueo.style.display = "block";
            btonAgregar.style.opacity = 0.4;
        }
        if (nombre.value != "" && date.value != "" && sexo.options[sexo.selectedIndex].text != ""
            && especie.options[especie.selectedIndex].text != ""
            && raza.options[raza.selectedIndex].text != "") {
            bloqueo.style.display = "none";
            btonAgregar.style.opacity = 1;
        }

    })
})


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
    mascotas = [];
})


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


const eliminarFila = () => {
    const eliminar = document.querySelector(".boton-mascota.rojo");
    const bloqueo2 = document.getElementById("bloqueo2");
    const body = document.getElementsByTagName("tbody")[0];
    body.removeChild(body.children[index]);
    mascotas.splice(index);
    eliminar.style.opacity = 0.4;
    bloqueo2.style.display = "block";
}


const subirArchivo = document.getElementById("imageFile");
subirArchivo.addEventListener("change", () => {
    const valorFile = document.querySelector(".valorFile");
    const valor = subirArchivo.files[0].name;;
    if (valor != '') {
        valorFile.innerHTML = valor;
    }
})

const razaPerros = [
    {
        id: 1,
        nombre: 'Labrador'
    },
    {
        id: 2,
        nombre: 'French Bulldogs'
    },
    {
        id: 3,
        nombre: 'Bulldogs'
    },
    {
        id: 4,
        nombre: 'Poodles'
    },
    {
        id: 5,
        nombre: 'Beagles'
    },
    {
        id: 6,
        nombre: 'Rottweilers'
    },
    {
        id: 7,
        nombre: 'Boxers'
    },
    {
        id: 8,
        nombre: 'Gran Danes'
    },
    {
        id: 9,
        nombre: 'Huskies Siberiano'
    },
    {
        id: 10,
        nombre: 'Doberman'
    },
    {
        id: 11,
        nombre: 'Schnauzers'
    },
    {
        id: 12,
        nombre: 'Terriers'
    },
    {
        id: 13,
        nombre: 'Pugs'
    },
    {
        id: 13,
        nombre: 'Chihuahuas'
    },
    {
        id: 14,
        nombre: 'Pastor Aleman'
    },
    {
        id: 15,
        nombre: 'Dalmatas'
    },
    {
        id: 16,
        nombre: 'Otros'
    }
]

const razaGatos = [
    {
        id: 16,
        nombre: 'Persa'
    },
    {
        id: 17,
        nombre: 'Azul ruso'
    },
    {
        id: 18,
        nombre: 'Siamés'
    },
    {
        id: 19,
        nombre: 'Angora turco'
    },
    {
        id: 20,
        nombre: 'Siberiano'
    },
    {
        id: 21,
        nombre: 'Maine Coon'
    },
    {
        id: 22,
        nombre: 'Bengalí'
    },
    {
        id: 23,
        nombre: 'Otros'
    }
]


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

const mostrarAlerta = (item) => {
    item.style.display = "Block";
}

const alerta = document.querySelectorAll(".input-alerta");

alerta.forEach((item) => {
    item.addEventListener("animationend", () => {
        item.style.display = "none";
    })
});



/*
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

*/
//Combo box especies y mascotas

especie.addEventListener("change", () => {
    raza.innerHTML = "";
    let opcion = document.createElement("option")
    let texto = document.createTextNode("SELECCIONE");
    opcion.selected
    opcion.disabled
    opcion.value
    opcion.appendChild(texto);
    raza.appendChild(opcion);

    switch (especie.options[especie.selectedIndex].text) {
        case "PERRO":
            for (let i = 0; i < razaPerros.length; i++) {
                let opcion = document.createElement("option")
                opcion.setAttribute("value", razaPerros[i].id);
                let texto = document.createTextNode(razaPerros[i].nombre.toUpperCase());
                opcion.appendChild(texto);
                raza.appendChild(opcion);
            }
            break;
        case "GATO":
            for (let i = 0; i < razaGatos.length; i++) {
                let opcion = document.createElement("option")
                opcion.setAttribute("value", razaGatos[i].id);
                let texto = document.createTextNode(razaGatos[i].nombre.toUpperCase());
                opcion.appendChild(texto);
                raza.appendChild(opcion);
            }
            break;
        default:
            break;
    }

})
