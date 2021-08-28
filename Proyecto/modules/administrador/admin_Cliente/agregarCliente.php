<?php

include('../../conexion/conexion.php');

$nombre = $_POST['nombre'];
$correo = $_POST['correo'];
$genero = $_POST['genero'];
$usuario = $_POST['usuario'];
$password = $_POST['password'];
$tipoUsuario = 1;

echo $nombre . "<br>";
echo $correo . "<br>";
echo (count($_POST['mascota']));
echo "<br>";


// Agrega a Usuario de Cliente
$query = "INSERT INTO usuarios VALUES ('', '$usuario', '$password', DEFAULT, '$tipoUsuario', NULL)";
$result = mysqli_query($conn, $query);

// Se obtiene el numero de ID del Usuario del cliente creado.
$query3 = "SELECT Id_Usuario from usuarios WHERE Username = '$usuario'";
$result3 = mysqli_query($conn, $query3);
$row = mysqli_fetch_array($result3);
$idUser = $row['Id_Usuario']; // Se guarda el id en la variable $idUser

// Se agrega a Cliente con todos los datos de cliente incluido el ID User.
$query2 = "INSERT INTO clientes VALUES (NULL, '$nombre', '$genero', '$correo', '$idUser', DEFAULT)";
$result2 = mysqli_query($conn, $query2);
if (!$result2) {
    echo 'Fallido';
}

//Obtener ID de cliente.
$query = "SELECT Id_Cliente FROM clientes WHERE Nombre = '$nombre' AND Correo_Electronico = '$correo'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_array($result);
$idCliente = $row['Id_Cliente'];


// Se agregan mascotas de cliente.
for ($i = 0; $i < count($_POST['mascota']); $i++) {
    $nombreMascota = $_POST['mascota'][$i + 1]['nombreMascota'];
    $fechaMascota = $_POST['mascota'][$i + 1]['fechaMascota'];
    $sexoMascota = $_POST['mascota'][$i + 1]['sexoMascota'];
    $especieMascota = $_POST['mascota'][$i + 1]['especieMascota'];
    $razaMascota = $_POST['mascota'][$i + 1]['razaMascota'];

    $query = "INSERT INTO mascotas VALUES (NULL, '$idCliente', '$nombreMascota' , '$fechaMascota', NULL, '$sexoMascota', '$especieMascota', '$razaMascota', NULL)";
    $result = mysqli_query($conn, $query);
    if (!$result) {
        echo "Error";
    }
}


header("Location: admin_agregarCliente.php?value=1");
