<?php

session_start();

include("../../conexion/conexion.php");

$idMascota =  $_GET['mascota'];
$idVeterinario = $_GET['veterinario'];
$fecha = $_GET['fecha'];
$horario = $_GET['horario'];
$motivo = $_GET['motivo'];
$idCliente = $_SESSION['idCliente'];

$query = "INSERT INTO citas VALUES (null, $idCliente, $idMascota, $idVeterinario, '$fecha', '$horario', '$motivo', DEFAULT)";
$result = mysqli_query($conn, $query);
if (!$result) {
    die('Fallido');
}

header('Location: agendar_Cita.php?value=1');
