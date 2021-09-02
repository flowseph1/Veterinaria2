//Accion formulario.
const formulario = document.querySelector("#formularioAgregar");
const boton = document.querySelector(".boton.verde");
boton.addEventListener("click", () => {
    formulario.submit();
})


//Funcion para cancelar cuadro de dialogo para eliminar cliente.
const cancelarEliminar = () => {
    const eliminar = document.querySelector(".eliminar");
    eliminar.style.display = "none";

}

//Funcion para aparecer cuadro de dialogo para eliminar cliente.
const accionEliminar = (e) => {
    const eliminar = document.querySelector(".eliminar");

    eliminar.style.animation = "fadeIn 0.5s ease-out forwards";

    const mascotaEliminar = document.querySelector("#mascotaEliminar");
    eliminar.style.display = "flex";

    //Obtener Index de Mascota.
    const contenedorMascotas = document.querySelector(".contenedor-mascotas");
    const perfilMascotas = e.currentTarget.parentNode.parentNode;
    const idMascotaEliminar = document.querySelectorAll("#idMascotaEliminar");
    const idMascota = document.querySelector("#idMascota");

    let index = Array.from(contenedorMascotas.children).indexOf(perfilMascotas);
    console.log(index);

    let nombreMascota = e.currentTarget.parentNode.parentNode.children[0].innerText;
    const inputNombreMascota = document.querySelector("#inputNombreMascota");

    inputNombreMascota.value = nombreMascota;
    idMascota.value = idMascotaEliminar[index].value;
    mascotaEliminar.innerHTML = '"' + nombreMascota + '"';
}


const formulario2 = document.querySelector("#form2");
const boton2 = document.querySelector(".default-btn.color-rojo-hover");
boton2.addEventListener("click", () => {
    formulario2.submit();
})