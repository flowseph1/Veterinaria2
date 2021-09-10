const valorServicios = [
    600,
    800,
    1500,
    300,
    750,
    450,
    450
]

columnas = document.querySelectorAll("td");
const selects = document.querySelectorAll("#servicios");
const filas2 = document.querySelectorAll(".filas2");

selects.forEach(element => {
    //Select
    let cantidad = element.parentNode.parentNode.children[1].children[0];
    let precio = element.parentNode.parentNode.children[2].children[0];
    let monto = element.parentNode.parentNode.children[3].children[0];
    let importe = element.parentNode.parentNode.children[4].children[0];

    element.addEventListener("change", () => {
        if (element.options[element.selectedIndex].value == "") {
            precio.innerHTML = "";
            monto.innerHTML = "";
            cantidad.value = "";
            importe.innerHTML = "";
        } else {
            let valueServicios = element.options[element.selectedIndex].value;
            cantidad.value = 1;
            precio.innerHTML = valorServicios[valueServicios - 1];
            monto.innerHTML = precio.innerHTML * cantidad.value;
        }
    })

})

filas2.forEach(element => {
    let cant = element.children[1].children[0];
    let price = element.children[2].children[0];
    let amount = element.children[3].children[0];
    let imp = element.children[4].children[0];

    cant.addEventListener("keyup", () => {
        amount.innerHTML = price.innerHTML * cant.value;
    })

    amount.addEventListener("DOMNodeInserted", () => {

        try {
            let index = Array.from(filas2).indexOf(element);
            let amountFilaAnterior = filas2[index - 1].children[3].children[0];

            if (amountFilaAnterior.innerHTML == undefined) {
                imp.innerHTML = amount.innerHTML;
            } else {
                imp.innerHTML = parseFloat(amount.innerHTML) + parseFloat(filas2[index - 1].children[4].children[0].innerHTML);
            }
        } catch (error) {
            imp.innerHTML = amount.innerHTML;
        }

    })

})


/*
servicios.array.forEach(element => {
    element.addEventListener("change", () => {
        let valueServicios = servicios.options[servicios.selectedIndex].value;
        columnas[1].children[0].value = 1;
        columnas[2].children[0].innerHTML = valorServicios[valueServicios - 1];

        var precioUnitario = columnas[2].children[0].innerHTML;
        var cantidad = columnas[1].children[0].value;
        columnas[3].children[0].innerHTML = precioUnitario * cantidad;
    })
});



//Valor de Monto
cantidad.addEventListener("keyup", () => {
    monto.innerHTML = precioUnitario.innerHTML * cantidad.value;
})
*/