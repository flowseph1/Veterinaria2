<?php

session_start();
include("../../conexion/conexion.php");
$idVeterinario = $_SESSION['idVeterinario'];

$nombre = $_POST['nombre'];
$id = $_POST['id'];
$usuario = $_POST['usuario'];
$clave = $_POST['password'];

$_SESSION['nombreVet'] = $nombre;

$query = "UPDATE personal AS p, usuarios AS u
SET p.Nombre = '$nombre', p.Identificacion_Personal = '$id',
u.Username = '$usuario', u.Clave = '$clave'
WHERE p.Id_Personal = $idVeterinario
AND p.Id_Usuario = u.Id_Usuario ";


$resultado = mysqli_query($conn, $query);
if (!$resultado) {
    die("Error");
} else {
    header("Location: perfil.php?value=1");
}
