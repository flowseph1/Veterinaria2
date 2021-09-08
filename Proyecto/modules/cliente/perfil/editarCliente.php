<?php

session_start();
include("../../conexion/conexion.php");
$idCliente = $_SESSION['idCliente'];

$nombre = $_POST['nombre'];
$genero = $_POST['genero'];
$usuario = $_POST['usuario'];
$clave = $_POST['password'];

$_SESSION['nombre'] = $nombre;

$query = "UPDATE clientes AS c, usuarios AS u
SET c.Nombre = '$nombre', c.Genero = '$genero',
u.Username = '$usuario', u.Clave = '$clave'
WHERE c.Id_Cliente = $idCliente
AND c.Id_Usuario = u.Id_Usuario ";


$resultado = mysqli_query($conn, $query);
if (!$resultado) {
    die("Error");
} else {
    header("Location: perfil.php?value=1");
}
