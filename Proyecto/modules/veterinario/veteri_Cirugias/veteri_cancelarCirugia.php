<?php

include("../../conexion/conexion.php");

$idCirugia = $_GET["idCirugia"];

$query = "UPDATE cirugia SET Baja_Cirugia = 1 WHERE Id_Cirugia = $idCirugia";
$result = mysqli_query($conn, $query);

if (!$result) {
    die("Error");
} else {
    header("Location: veteri_Cirugia.php?value=1");
}