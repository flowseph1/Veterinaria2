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


const mostrarAlerta = (item) => {
    item.style.display = "Block";
}

const alerta = document.querySelectorAll(".input-alerta");

alerta.forEach((item) => {
    item.addEventListener("animationend", () => {
        item.style.display = "none";
    })
});

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


//Accion formulario.
const formulario = document.querySelector("#formularioAgregar");
const boton = document.querySelector(".boton.verde");
boton.addEventListener("click", () => {
    formulario.submit();
})

