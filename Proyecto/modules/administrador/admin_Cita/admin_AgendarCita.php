<?php

include("../../conexion/conexion.php");

session_start();

$idCliente = $_GET['idCliente'];
$idMascota = $_GET['mascota'];
$idVeterinario = $_GET['veterinario'];
$fecha = $_GET['fecha'];
$horario = $_GET['horario'];
$motivo = $_GET['motivo'];

$query = "INSERT INTO citas VALUES ('', $idCliente, $idMascota, $idVeterinario, '$fecha', '$horario', '$motivo', DEFAULT )";
$result = mysqli_query($conn, $query);
if (!$result) {
    die("Error");
} else {
    echo "Exitoso";
    header('Location: admin_agregarCita.php?value=1');
}
