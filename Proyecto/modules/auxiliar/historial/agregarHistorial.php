<?php

session_start();
include("../../conexion/conexion.php");

$idCita = $_POST['idCita'];
$idCliente = $_POST['idCliente'];
$idMascotas = $_POST['idMascota'];
$idEspecie = $_POST['idEspecie'];
$idRaza = $_POST['idRaza'];
$condicion = $_POST['condicion'];
$estadoReproductivo = $_POST['estadoReproductivo'];
$alimentacion = $_POST['alimentacion'];
$consumo = $_POST['consumo'];
$comportamiento = $_POST['comportamiento'];
$postrado = $_POST['postrado'];
$comoCamina = $_POST['comoCamina'];
$pelaje = $_POST['pelaje'];
$nombreCliente = $_POST['nombreCliente'];
$nombreMascota = $_POST['nombreMascota'];
$sexoMascota = $_POST['sexoMascota'];
$edadMascota = $_POST['edadMascota'];
$temperatura = $_POST['temperatura'];
$pulso = $_POST['pulso'];
$timpanizado = $_POST['timpanizado'];
$atonia = $_POST['atonia'];
$ocular = $_POST['ocular'];
$bucal = $_POST['bucal'];
$nasal = $_POST['nasal'];
$observacionEstado = $_POST['observacionEstado'];
$observacionAlimento = $_POST['observacionAlimento'];
$comentarioPrincipal = $_POST['comentarioPrincipal'];
$fechaCita = $_POST['fechaCita'];

$query = "INSERT INTO historial
        VALUES ('', $idCita, $idCliente, $idMascotas, $idEspecie, $idRaza,
        $condicion, $estadoReproductivo, $alimentacion, $consumo ,
        $comportamiento, $postrado, $comoCamina, $pelaje, '$nombreCliente',
        '$nombreMascota', '$sexoMascota', $edadMascota, $temperatura,
        $pulso, '$timpanizado', '$atonia', $ocular, $bucal, $nasal,
        '$observacionEstado', '$observacionAlimento', '$comentarioPrincipal',
        '$fechaCita')";

$result = mysqli_query($conn, $query);
if (!$result) {
    die('Error');
} else {

    $query = "UPDATE citas
                SET Id_EstadoCita = 4
                WHERE Id_Cita = $idCita";
    $result = mysqli_query($conn, $query);

    header("Location: preclinica.php?historial=1");
}
