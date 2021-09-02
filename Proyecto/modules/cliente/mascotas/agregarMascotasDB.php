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
    header("Location:  agregarMascotas.php?value=1");
}
