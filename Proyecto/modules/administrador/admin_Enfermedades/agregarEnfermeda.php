<?php

include("../../conexion/conexion.php");

$enfermedad = $_GET['enfermedad'];
$tratamiento = $_GET['tratamientos'];
$medicamento = $_GET['medicamentos'];

$query = "INSERT INTO enfermedades VALUES (NULL, '$enfermedad','$tratamiento', '$medicamento')";
$result = mysqli_query($conn, $query,);
if (!$result) {
    die('Error');
} else {
    echo 'correcto';
    header("Location: admin_agregarEnfermedad.php?value=1");
}
