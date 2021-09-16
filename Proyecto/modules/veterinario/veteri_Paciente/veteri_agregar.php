<?php

session_start();
include("../../conexion/conexion.php");

$idCliente = $_SESSION['idCliente'];
$nombreMascota = $_POST['nombre'];
$fechaMascota = $_POST['fechaNacimiento'];
$sexoMascota = $_POST['sexo'];
$especieMascota = $_POST['especie'];
$razaMascota = $_POST['raza'];

array_push($_SESSION['mascotas'], $nombreMascota);
array_push($_SESSION['especies'], $especieMascota);

$query = "INSERT INTO mascotas VALUES (NULL, $idCliente, '$nombreMascota', '$fechaMascota', NULL, '$sexoMascota', $especieMascota, $razaMascota, DEFAULT )";
$resultado = mysqli_query($conn, $query);
if (!$resultado) {
    die("Error");
} else {
    //Obtener ID de mascota.
    $query2 = "SELECT Id_Mascota FROM mascotas ORDER BY Id_Mascota DESC LIMIT 1";
    $resultado2 = mysqli_query($conn, $query2);
    $row2 = mysqli_fetch_array($resultado2);
    $idMascota = $row2['Id_Mascota'];
    array_push($_SESSION['idMascotas'], $idMascota);
    header("Location:  agregarMascotas.php?value=1");
}
