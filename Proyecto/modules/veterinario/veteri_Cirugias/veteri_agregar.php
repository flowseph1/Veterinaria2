<?php

session_start();

include("../../conexion/conexion.php");
 //Datos de la Cirugia.
$idMascota =  $_GET['mascota'];
$servicio = $_GET['servicio'];
$motivo = $_GET['motivo'];
$fecha = $_GET['fecha'];
$horario = $_GET['horario'];
$idVeterinario = $_SESSION['idVeterinario'];

 //Consulta para obtener informacion del cliente.
$query = "SELECT Id_Cliente FROM mascotas WHERE Id_Mascota=$idMascota";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_array($result);
$idCliente = $row['Id_Cliente'];

 //Consulta para obtener informacion de la cirugia.
$query = "SELECT t.Tipo_Servicio,s.Nombre_Servicio FROM servicios s, tipo_servicios t WHERE s.Id_Tipo_Servicio=t.Id_Tipo_Servicio AND s.id_servicio=$servicio";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_array($result);
$tipoServicio = $row['Tipo_Servicio'];
$nombreServicio = $row['Nombre_Servicio'];



$query = "INSERT INTO cirugia VALUES ('', $motivo,CONCAT(t.Tipo_Servicio,\" por \",s.Nombre_Servicio),$idMascota,$idVeterinario,$servicio,DEFAULT)";
$result = mysqli_query($conn, $query);
if (!$result) {
    die('Fallido');
}

header('Location: veteri_agendarCita.php?value=1');