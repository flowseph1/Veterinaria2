<?php

    include("../../conexion/conexion.php");

    //Tabla de Proveedores
    $IdProveedor = $_POST['IdProveedor'];
    $nombre     = $_POST['nombre'];
    $direccion  = $_POST['direccion'];
    $telefono   = $_POST['telefono'];
    $estado     = $_POST['estadoProveedor'];


    $sql1 = "UPDATE proveedores SET Nombre_Legal='$nombre' WHERE Id_Proveedor='$IdProveedor'";
    $sql2 = "UPDATE proveedores SET Direccion_Proveedor='$direccion' WHERE Id_Proveedor='$IdProveedor'";
    $sql3 = "UPDATE proveedores SET Telefono_Proveedor='$telefono' WHERE Id_Proveedor='$IdProveedor'";
    $sql4 = "UPDATE proveedores SET Estado_Proveedor='$estado' WHERE Id_Proveedor='$IdProveedor'";

    $ejecutar = mysqli_query($conn, $sql1);
    $ejecutar = mysqli_query($conn, $sql2);
    $ejecutar = mysqli_query($conn, $sql3);
    $ejecutar = mysqli_query($conn, $sql4);

    mysqli_close($conn);
    echo '
    <script>
        alert("Actualizacion de los datos exitoso!!!");
        window.location="admin_Proveedor.php";
    </script>
    ';

?>