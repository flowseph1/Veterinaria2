//********************* Declaración de variables *************************

//Variables que toman los valores del formulario
var rtn = document.getElementById("rtn");
var nombre = document.getElementById("nombre");
var direccion = document.getElementById("direccion");
var telefonoProveedor = document.getElementById("telefono");

//Variables de elementos del DOM
var formulario = document.getElementById("formularioAgregar");
const btonGuardar = document.getElementById("guardar-form");
const btonLimpiar = document.getElementById("limpiar-button");

//*************************** EVENTOS ********************************

//boton que limpia el fomulario
btonLimpiar.addEventListener("click", ()=>{
    formulario.reset();
})

//boton de guardar los datos del fomulario en la base de datos
btonGuardar.addEventListener("click", ()=>{
    console.log("Se hizo click al boton de GUARDAR");
})

//*************************** CUERPO DEL CODIGO ***********************

//Valicaciones de los campos del formulario
rtn.addEventListener("blur", ()=>{
    if(isNaN(rtn.value)|| rtn.value.length=="0"){
        rtn.style.backgroundColor="pink";
        rtn.style.border = "0.5px solid red";
    } else {
        rtn.style.backgroundColor="#f7f7f7bd";
        rtn.style.border = "none";
    }
});

nombre.addEventListener("blur", ()=>{
    if (nombre.value.length == 0 || !isNaN(nombre.value)){
        nombre.style.backgroundColor="pink";
        nombre.style.border = "0.5px solid red";
    } else {
        nombre.style.backgroundColor="#f7f7f7bd";
        nombre.style.border = "none";
    }
});

direccion.addEventListener("blur", ()=>{
    if (direccion.value.length == 0){
        direccion.style.backgroundColor="pink";
        direccion.style.border = "0.5px solid red";
    } else {
        direccion.style.backgroundColor="#f7f7f7bd";
        direccion.style.border = "none";
    }

});

telefonoProveedor.addEventListener("blur", ()=>{
    if (telefonoProveedor.value.length == 0 || isNaN(telefonoProveedor.value)){
        telefonoProveedor.style.backgroundColor="pink";
        telefonoProveedor.style.border = "0.5px solid red";
    } else {
        telefonoProveedor.style.backgroundColor="#f7f7f7bd";
        telefonoProveedor.style.border = "none";
    }

});
