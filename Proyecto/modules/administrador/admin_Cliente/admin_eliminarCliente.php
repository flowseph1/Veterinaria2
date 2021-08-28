<?php

include '../../conexion/conexion.php';

$idCliente = $_GET['idCliente'];

$query = "SELECT Id_Usuario FROM clientes WHERE Id_Cliente = '$idCliente'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_array($result);
$idUsuario = $row['Id_Usuario'];

$query = "DELETE FROM mascotas WHERE Id_Cliente = '$idCliente'";
$result = mysqli_query($conn, $query);
if (!$result) {
    die("Failed to delete");
}

$query = "DELETE FROM clientes WHERE Id_Cliente = '$idCliente'";
$result = mysqli_query($conn, $query);
if (!$result) {
    die("Failed to delete");
}

$query = "DELETE FROM usuarios WHERE Id_Usuario = '$idUsuario'";
$result = mysqli_query($conn, $query);
if (!$result) {
    die("Failed to delete");
}

header('Location: admin_cliente.php?eliminacion=1');
