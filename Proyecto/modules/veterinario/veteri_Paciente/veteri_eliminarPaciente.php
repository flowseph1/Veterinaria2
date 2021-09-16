<?php

session_start();

include("../../conexion/conexion.php");
$idMascosta = $_GET['idMascota'];
$nombreMascota = $_GET['nombreMascota'];

$query = "SELECT Id_EstadoCita FROM citas WHERE Id_Mascota = $idMascosta AND Id_EstadoCita = 1";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_array($result);

if (!isset($row['Id_EstadoCita'])) {
    $query = "DELETE FROM mascotas WHERE Id_Mascota = $idMascosta";
    $result = mysqli_query($conn, $query);
    if (!$result) {
        die("Error");
    }

    $index = array_search($nombreMascota, $_SESSION['mascotas']);
    array_splice($_SESSION['mascotas'], $index, 1);
    array_splice($_SESSION['idMascotas'], $index, 1);
    array_splice($_SESSION['especies'], $index, 1);

    header("Location: mascotas.php?value=1");
} else {
    header("Location: mascotas.php?value=2");
}
