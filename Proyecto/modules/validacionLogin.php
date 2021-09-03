<?php

include("../modules/conexion/conexion.php");

$user = $_POST['usuario'];
$pass = $_POST['contra'];


//Validar si existe usuario en base de datos;



$query = "SELECT * FROM usuarios WHERE Username = '$user' AND Clave = '$pass'"; // Query para obtener informacion de usuario.
$result = mysqli_query($conn, $query); // Se realiza consulta y se guarda resultado en $result.


$row = mysqli_num_rows($result); // Obtener numero de Filas.
if ($row == 1) { // Si hay una fila, existe el usuario y contra.

    $array = mysqli_fetch_array($result); // Obtener arreglo del resultado de query.
    $tipoUsuario = $array['Id_TipoUsuario']; // Se guarda Tipo de Usuario en variable $tipoUsuario.
    $idUsuario = $array['Id_Usuario']; // Se guarda ID de Usuario en variable $idUsuario.

    //Consulta para obtener informacion del cliente.
    $query = "SELECT * FROM clientes WHERE Id_Usuario = '$idUsuario'";
    $result = mysqli_query($conn, $query); // Ejecucion de Query.
    $rows = mysqli_fetch_array($result); // Obteniendo resultados de query.

    //Almacenando informacion del cliente.
    $nombre = $rows['Nombre'];
    $idCliente = $rows['Id_Cliente'];

    // Consulta para obtener informacion de mascota del cliente.
    $query = "SELECT * FROM mascotas WHERE Id_Cliente = '$idCliente'";
    $result = mysqli_query($conn, $query); // Ejecucion de Query.
    $mascotas = array(); //Arreglo de mascotas;
    $idEspecie = array(); //Arreglo de especies;
    while ($rows = mysqli_fetch_array($result)) {
        //Almacenando informacion de mascotas.
        $nombreMascota = $rows['Nombre_Mascota'];
        $especie = $rows['Id_Especie'];
        array_push($mascotas, $nombreMascota);
        array_push($idEspecie, $especie);
    }

    //Consulta para obtener informacion del veterinario.
    $query = "SELECT * FROM personal WHERE Id_Usuario = '$idUsuario' AND Puesto_Trabajo='Veterinario'";
    $result = mysqli_query($conn, $query); // Ejecucion de Query.
    //Almacenando informacion del veterinario.
    $idVeterinario = $rows['Id_Personal'];
    $nombreVet = $rows['Nombre'];

    // Direccionamiento de usuario.
    switch ($tipoUsuario) {
        case '1':
            session_start();
            $_SESSION['nombre'] = $nombre;
            $_SESSION['mascotas'] = $mascotas;
            $_SESSION['especies'] = $idEspecie;
            $_SESSION['idCliente'] = $idCliente;
            header("Location: cliente/cliente.php");
            break;

        case '2':
            session_start();
            $_SESSION['nombre'] = $nombre;
            header("Location: administrador/administrador.php");
            break;

        case '3':
            session_start();
            $_SESSION['idVeterinario'] = $idVeterinario;
            $_SESSION['nombreVet'] = $nombreVet;
                header("Location: veterinario/veterinario.php");
                break;

        default:
            echo "nada";
            break;
    }


    echo $tipoUsuario;
} else {
    header("Location: login.php?value=1");
}
