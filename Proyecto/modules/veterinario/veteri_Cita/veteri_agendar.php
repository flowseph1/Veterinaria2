<?php

session_start();

include("../../conexion/conexion.php");

$idMascota =  $_GET['mascota'];
$fecha = $_GET['fecha'];
$horario = $_GET['horario'];
$motivo = $_GET['motivo'];
$idCliente = $_GET['mascota'];
$idVeterinario = $_SESSION['idVeterinario'];

$query = "INSERT INTO citas VALUES ('', $idCliente, $idMascota, $idVeterinario, '$fecha', '$horario', '$motivo', DEFAUsLT)";
$result = mysqli_query($conn, $query);
if (!$result) {
    die('Fallido');
}

header('Location: veteri_agendarCita.php?value=1');