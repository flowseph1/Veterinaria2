<?php

    include("../../conexion/conexion.php");

    //Tabla de Proveedores
    $rtn        = $_POST['rtn'];
    $nombre     = $_POST['nombre'];
    $direccion  = $_POST['direccion'];
    $telefono   = $_POST['telefono'];
    $estado     = "1";

    //Variable que guarda le insert a la tabla de proveedor
    $sql="INSERT INTO proveedores (RTN_Proveedor, Nombre_Legal, Direccion_Proveedor, Telefono_Proveedor, Estado_Proveedor) 
                                VALUES('$rtn','$nombre','$direccion','$telefono','$estado')";


    //Consultas para verificar la existencia del proveedor en la base de datos
    $verificarRTN = mysqli_query($conn,"SELECT * FROM proveedores WHERE RTN_Proveedor = '$rtn'");
    $verificarNombre = mysqli_query($conn,"SELECT * FROM proveedores WHERE nombre_Legal = '$nombre'");

    //verificacion de si ya exuste el proveedor
    if (mysqli_num_rows($verificarRTN) > 0){
        echo '       
            <script>
                alert("Este RTN de proveedor ya existe!!!");
                window.location="admin_agregarProveedor.php";
            </script>
        ';
    } else if (mysqli_num_rows($verificarNombre) > 0){
        echo '
            <script>
                alert("Este nombre de proveedor ya existe!!!");
                window.location="admin_agregarProveedor.php";
            </script>
        ';
    } else {
        $ejecutar = mysqli_query($conn, $sql);
        mysqli_close($conn);

        echo '
        <script>
            alert("Insert realizada correctamente!!!");
            window.location="admin_Proveedor.php";
        </script>
        ';
    }
?>