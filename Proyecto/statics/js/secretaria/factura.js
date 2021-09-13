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


// Se agrega monto y cantidad.
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
            precio.innerHTML = currency(valorServicios[valueServicios - 1]);
            monto.innerHTML = currency(currencyToNumber(precio.innerHTML) * cantidad.value);
        }
    })

})

// Se calcula monto e importe de factura de cada fila.
filas2.forEach(element => {
    let cant = element.children[1].children[0];
    let price = element.children[2].children[0];
    let amount = element.children[3].children[0];
    let subtotal = document.querySelector("#subtotal").children[0];
    let impuesto = document.querySelector("#impuesto").children[0];
    let total = document.querySelector("#total").children[0];

    cant.addEventListener("keyup", () => {


        amount.innerHTML = currency(currencyToNumber(price.innerHTML) * cant.value);
        let valorImporte = 0;
        for (let i = 0; i < filas2.length; i++) {
            let columnaMonto = filas2[i].children[3].children[0];
            let importe = filas2[i].children[4].children[0];
            if (columnaMonto.innerHTML == "") {
                importe.innerHTML = "";
            } else {
                valorImporte = valorImporte + currencyToNumber(columnaMonto.innerHTML);
                importe.innerHTML = currency(valorImporte);
            }

        }

        //Calculo de subtotal, impuesto y total.
        let valorSubtotal = 0;
        let valorImpuesto = 0;
        let valorTotal = 0;
        for (let i = 0; i < filas2.length; i++) {
            if (filas2[i].children[3].children[0].innerHTML != "") {
                valorSubtotal = valorSubtotal + currencyToNumber(filas2[i].children[3].children[0].innerHTML);
                valorImpuesto = valorSubtotal * 0.15;
                valorTotal = valorSubtotal + valorImpuesto;
            }
        }
        subtotal.innerHTML = currency(valorSubtotal);
        impuesto.innerHTML = currency(valorImpuesto);
        total.innerHTML = currency(valorTotal);
    })

    element.addEventListener("change", () => {

        let index = Array.from(filas2).indexOf(element);
        let valorImporte = 0;
        for (let i = 0; i < filas2.length; i++) {
            let columnaMonto = filas2[i].children[3].children[0];
            let importe = filas2[i].children[4].children[0];
            if (columnaMonto.innerHTML == "") {
                importe.innerHTML = "";
            } else {
                valorImporte = valorImporte + currencyToNumber(columnaMonto.innerHTML);
                importe.innerHTML = currency(valorImporte);
            }

        }


        //Calculo de subtotal, impuesto y total.
        let valorSubtotal = 0;
        let valorImpuesto = 0;
        let valorTotal = 0;
        for (let i = 0; i < filas2.length; i++) {
            if (filas2[i].children[3].children[0].innerHTML != "") {
                valorSubtotal = valorSubtotal + currencyToNumber(filas2[i].children[3].children[0].innerHTML);
                valorImpuesto = valorSubtotal * 0.15;
                valorTotal = valorSubtotal + valorImpuesto;
            }
        }
        subtotal.innerHTML = currency(valorSubtotal);
        impuesto.innerHTML = currency(valorImpuesto);
        total.innerHTML = currency(valorTotal);
    })




})

const valueBoxes = document.querySelectorAll("table .valueBox");
const tabla = document.querySelector('table');

const currency = (string) => {
    let lempira = "L. "
    let stringConverted = string.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');
    return lempira.concat(stringConverted);
}

const currencyToNumber = (string) => {
    string = string.substr(0, string.length - 3);
    string = string.substr(3, string.length);
    string = string.replace(",", "");
    let numero = parseFloat(string);
    return numero;
}

// Imprimir factura.

const imprimir = () => {
    let fonts2 = '<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>';
    let fonts = '<link href="https://fonts.googleapis.com/css2?family=Gowun+Dodum&display=swap" rel="stylesheet">';
    let linkFont = '<link rel="preconnect" href="https://fonts.googleapis.com">';
    cssLinkTag3 = '<link rel="stylesheet" href="/Proyecto/statics/css/main.css" />';
    cssLinkTag = '<link rel="stylesheet" href="/Proyecto/statics/css/secretaria/secretaria.css">';
    cssLinkTag2 = '<link rel="stylesheet" href="/Proyecto/statics/css/secretaria/factura.css">';
    let imagen = '<div class="logo-factura"><img src = "/Proyecto/statics/img/Logo1.svg" /></div >';
    var prtContent = document.querySelector('.contenedor-factura-general');
    var WinPrint = window.open('', '', 'left=0,top=0,width=700,height=830,toolbar=0,scrollbars=0,status=0');
    WinPrint.document.write(cssLinkTag);
    WinPrint.document.write(cssLinkTag3);
    WinPrint.document.write(cssLinkTag2);
    WinPrint.document.write(linkFont);
    WinPrint.document.write(fonts);
    WinPrint.document.write(fonts2);


    //Agregar valores a Select y Inputs Text
    const select = document.querySelectorAll('.select');
    select.forEach(element => {
        if (element.tagName == "INPUT") {
            element.setAttribute("value", element.value);
        } else {
            element.options[element.selectedIndex].setAttribute("selected", "selected");
        }
    })

    let imagenNodo = document.createElement("div");
    imagenNodo.innerHTML = imagen;

    let innerOrigin = prtContent.innerHTML;
    let finish = imagenNodo.innerHTML + innerOrigin;
    WinPrint.document.write(finish);
    WinPrint.document.close();
    WinPrint.focus();
    WinPrint.print();

}
