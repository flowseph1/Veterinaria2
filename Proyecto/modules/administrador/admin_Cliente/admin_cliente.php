<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="../../../statics/css/main.css" />
    <link rel="stylesheet" href="../../../statics/css/administrador/admin_Cliente/cliente.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Gowun+Dodum&display=swap" rel="stylesheet">
</head>

<body>
    <div class="fondo">

        <?php include("../../../includes/admin_header.php") ?>

        <div class="main-user">

            <?php include("../../../includes/admin_user.php") ?>

            <div class="contenedor">
                <div class="titulo-opcion">
                    <div class="motivo">CLIENTES</div>
                    <div class="atras" onclick="location.href = '../../administrador/administrador.php'">
                        ATRAS
                    </div>
                </div>
                <div class="botones">
                    <div class="boton verde" onclick="location.href = '../admin_Cliente/admin_agregarCliente.php'">
                        <div class="image">
                            <i class="fas fa-plus"></i>
                        </div>
                        <div class="texto">
                            AGREGAR
                        </div>
                    </div>
                    <div class="line">

                    </div>
                    <form action="admin_editarCliente.php" method="get" id="form1">
                        <div class="boton" id="editar">
                            <div class="image">
                                <i class="fas fa-pen"></i>
                            </div>
                            <div class="texto">
                                EDITAR
                            </div>
                        </div>
                        <input type="hidden" name="idCliente" id="idCliente">
                    </form>

                    <div class="boton rojo" id="eliminar" onclick="accionEliminar()">
                        <div class="image">
                            <i class="fas fa-times"></i>
                        </div>
                        <div class="texto">
                            ELIMINAR
                        </div>
                    </div>
                    <div class="difuminacion">

                    </div>
                    <?php

                    if (isset($_GET['eliminacion'])) { ?>


                        <div class="eliminacion-Cliente">
                            <i class="fas fa-times"></i>
                            SE ELIMINO CORRECTAMENTE
                        </div>


                    <?php }  ?>


                </div>
                <div class="clientes">
                    <div class="descripcion">
                        <div class="herramientas">
                            <div class="buscador">
                                <div class="icono-buscar">
                                    <i class="fas fa-search"></i>
                                </div>
                                <div class="cajaTexto-buscar">
                                    <input type="text" spellcheck="false" placeholder="BUSCAR NOMBRE O ID" id="buscar">
                                </div>
                            </div>
                            <div class="limpiar" onclick="limpiar()">
                                LIMPIAR
                            </div>
                        </div>
                        <div class="total-clientes">
                            TOTAL &nbsp;<span class="clientesTotales">2</span>
                        </div>
                    </div>

                    <div class="tabla-clientes">
                        <table id="tb-cliente" class="tabla">
                            <thead>
                                <th>ID</th>
                                <th>NOMBRE</th>
                                <th>CORREO</th>
                                <th>USUARIO</th>
                                <th>CLAVE</th>
                                <th>MASCOTAS</th>
                                <th>FECHA DE REGISTRO</th>
                                <th>ULTIMA CITA</th>


                            </thead>
                            <tbody>


                                <?php
                                include('../../conexion/conexion.php');

                                $query = 'SELECT * FROM clientes';
                                $result = mysqli_query($conn, $query);

                                while ($row = mysqli_fetch_array($result)) { ?>

                                    <tr class="filas" onclick="filas(event)">
                                        <td><?php echo $row['Id_Cliente'] ?></td>
                                        <td><?php echo $row['Nombre'] ?></td>
                                        <td><?php echo $row['Correo_Electronico'] ?></td>
                                        <?php
                                        $userId = $row['Id_Usuario'];
                                        $query3 = "SELECT Username, Clave, Fecha_Registro FROM usuarios WHERE Id_Usuario = $userId";
                                        $result3 = mysqli_query($conn, $query3);
                                        $row3 = mysqli_fetch_array($result3);
                                        ?>

                                        <td><?php echo $row3['Username'] ?></td>
                                        <td><?php echo $row3['Clave'] ?></td>

                                        <td>
                                            <?php
                                            $id_cliente = $row['Id_Cliente'];
                                            $query2 = "SELECT m.Nombre_Mascota FROM mascotas AS m WHERE m.Id_Cliente = '$id_cliente'";
                                            $result2 = mysqli_query($conn, $query2);
                                            while ($row2 = mysqli_fetch_array($result2)) { ?>

                                                <?php echo $row2['Nombre_Mascota'] ?>
                                            <?php } ?>

                                        </td>
                                        <td><?php echo $row3['Fecha_Registro'] ?></td>
                                        <td></td>
                                    </tr>
                                <?php } ?>

                            </tbody>
                        </table>
                    </div>
                </div>


            </div>

        </div>

        <div class="eliminar">
            <div class="mensaje color-blanco-transparente">

                <div class="eliminar-mensaje">
                    ¿ESTA SEGURO QUE DESEA ELIMINAR A: <span id="nombreClienteEliminado"></span> ?
                </div>

                <div class="eliminar-buttons">
                    <form action="admin_eliminarCliente.php" method="get" id="form2">
                        <input type="hidden" name="idCliente" id="idClienteEliminado">
                        <div class="default-btn color-rojo-hover" onclick="eliminarCliente()">
                            ELIMINAR
                        </div>
                    </form>
                    <div class="default-btn color-secundario-hover" onclick="cancelarEliminar()">
                        CANCELAR
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="../../../statics/js/administrador/admin_cliente/admin_cliente.js"></script>
</body>

</html>