<?php

include("../../conexion/conexion.php");

$idCita = $_GET["idCita"];

$query = "UPDATE citas SET Id_EstadoCita = 3 WHERE Id_Cita = '$idCita'";
$result = mysqli_query($conn, $query);

if (!$result) {
    die("Error");
} else {
    header("Location: citas.php?value=1");
}
