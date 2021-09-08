const btn = document.querySelector(".boton.verde");
const formulario = document.querySelector("#formulario");

btn.addEventListener("click", () => {
    formulario.submit();
})