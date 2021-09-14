<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Administrador | Reportes</title>
    <link rel="stylesheet" href="../../../statics/css/main.css" />
    <link rel="stylesheet" href="../../../statics/css/administrador/admin_Cliente/cliente.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css"
        integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Gowun+Dodum&display=swap" rel="stylesheet">
</head>

<body>
    <div class="fondo">
        
        <?php include("../../../includes/admin_header.php") ?>

        <div class="main-user">

            <?php include("../../../includes/admin_user.php") ?>


            <div class="contenedor">
                <div class="titulo-opcion">
                    <div class="motivo">REPORTE DE PERROS</div>
                    <div class="atras" onclick="location.href = '../admin_Reporte/admin_Reporte.php'">
                        ATRAS
                    </div>
                </div>
                <div class="agregar cliente">
                    <div class="forma">
                        <div class="personal">
                        
                                <div class="tabla-clientes">
                                    <table id="tb-cliente" class="tabla">
                                        <thead>
                                            <th>ID</th>
                                            <th>NOMBRE DE MASCOTA</th>
                                            <th>ESPECIE</th>
                                            <th>RAZA</th>
                                        </thead>
                                        <tbody>
                                           
                                        <?php
                                        include('../../conexion/conexion.php');

                                        $query = 'SELECT * FROM mascotas WHERE Id_Especie = "1"';
                                        $result = mysqli_query($conn, $query);

                                        while ($row = mysqli_fetch_array($result)) { ?>

                                            <tr class="filas" onclick="filas(event)">
                                                <td><?php echo $row['Id_Mascota'] ?></td>
                                                <td><?php echo $row['Nombre_Mascota'] ?></td>
                                                <?php
                                                $especieId = $row['Id_Especie'];
                                                $query3 = "SELECT Tipo_Especie FROM tipo_especies WHERE Id_Especie = $especieId";
                                                $result3 = mysqli_query($conn, $query3);
                                                $row3 = mysqli_fetch_array($result3);
                                                ?>

                                                <td><?php echo $row3['Tipo_Especie'] ?></td>

                                                <td>
                                                    <?php
                                                    $id_raza = $row['Id_Raza'];
                                                    $query2 = "SELECT m.Nombre_Raza FROM razas AS m WHERE m.Id_Raza = '$id_raza'";
                                                    $result2 = mysqli_query($conn, $query2);
                                                    while ($row2 = mysqli_fetch_array($result2)) { ?>

                                                    <?php echo $row2['Nombre_Raza'] ?>
                                                    <?php } ?>

                                                </td>
                                                
                                                <td></td>
                                            </tr>
                                        <?php } ?>

                                        </tbody>
                                    </table>
                                </div>

                            
                        </div>
                   </div>

                </div>
            </div>
        </div>
        <script src="/Veterinaria/Proyecto/statics/js/administrador/admin_cliente/admin_cliente.js"></script>
        <script src="/Veterinaria/Proyecto/statics/js/administrador/admin_cliente/admin_agregarCliente.js"></script>
    </div>
</body>


</html>