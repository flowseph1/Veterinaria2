<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Veterinario | Cirugía</title>
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

        <?php include("../../../includes/veteri_header.php") ?>

        <div class="main-user">

            <?php include("../../../includes/veteri_user.php") ?>

            <div class="contenedor">
                <div class="titulo-opcion">
                    <div class="motivo">CIRUGIAS</div>
                    <div class="atras" onclick="location.href = '../../veterinario/veterinario.php'">
                        ATRAS
                    </div>
                </div>
                <div class="botones">
                    <div class="boton verde" onclick="location.href = '../veteri_Cirugias/veteri_agregarCirugia.php'">
                        <div class="image">
                            <i class="fas fa-plus"></i>
                        </div>
                        <div class="texto">
                            AGREGAR
                        </div>
                    </div>
                    <div class="line">

                    </div>
                    <div class="boton" id="editar" onclick="location.href = '../veteri_Cirugias/veteri_editarCirugia.php'">
                        <div class="image">
                            <i class="fas fa-pen"></i>
                        </div>
                        <div class="texto">
                            EDITAR
                        </div>
                    </div>
                    <div class="boton rojo" id="eliminar" onclick="accionEliminar()">
                        <div class="image">
                            <i class="fas fa-times"></i>
                        </div>
                        <div class="texto">
                            ELIMINAR
                        </div>
                    </div>
                    <div class="difuminacion">

                    
                    <?php
                    if (isset($_GET["value"])) { ?>

                        <div class="agregar-exitoso">
                            <i class="fas fa-check"></i> &nbsp; AGREGADO CORRECTAMENTE
                        </div>
                    <?php } ?>

                    </div>
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
                                <th>ID </th>
                                <th>MASCOTA</th>
                                <th>MOTIVO</th>
                                <th>DESCRIPCION</th>
                                <th>ID CITA</th>
                                <th>FECHA </th>
                                <th>HORA </th>
                                <th>ESTADO</th>
                            </thead>
                            <tbody>
                            <?php
                                include("../../conexion/conexion.php");

                                $idVeterinario = $_SESSION['idVeterinario'];
                                $query = "SELECT a.Id_Cirugia, c.Nombre_Mascota,a.Motivo_Cirugia,d.Tipo_Servicio, b.Id_Cita ,a.Fecha_Cirugia, a.Hora_Cirugia,a.Baja_Cirugia
                                FROM  cirugia AS a, citas AS b, mascotas AS c, tipo_servicios d
                                WHERE a.Id_Mascota= c.Id_Mascota AND b.Id_Mascota=c.Id_Mascota AND d.Id_Tipo_Servicio=a.Id_Servicio AND b.Id_Veterinario=$idVeterinario ;";
                                $result = mysqli_query($conn, $query);
                                    while ($row = mysqli_fetch_array($result)) {
                                        $Id_Cirugia = $row['Id_Cirugia'];
                                        $nombreMascota = $row['Nombre_Mascota'];
                                        $motivo = $row['Motivo_Cirugia'];
                                        $descripcion = $row['Tipo_Servicio'];
                                        $Id_Cita = $row['Id_Cita'];
                                        $fecha = $row['Fecha_Cirugia'];
                                        $hora = $row['Hora_Cirugia'];
                                        $Baja_Cirugia = $row['Baja_Cirugia'];

                                        $formatoFecha = date('d-m-Y', strtotime($fecha));
                                        $formatoHora = date('h:i a', strtotime($hora));
                            ?>

                                        <tr class="filas" onclick="filas(event)">
                                            <td><?php echo $Id_Cirugia ?></td>
                                            <td><?php echo $nombreMascota ?></td>
                                            <td><?php echo $motivo ?></td>
                                            <td><?php echo $descripcion ?></td>
                                            <td><?php echo $IdCita ?></td>
                                            <td><?php echo $fecha ?></td>
                                            <td><?php echo $hora ?></td>
                                            <td><?php echo $Baja_Cirugia ?></td>
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
                    ¿ESTA SEGURO QUE DESEA ELIMINAR A <span id="nombreClienteEliminado"></span> ?
                </div>

                <div class="eliminar-buttons">
                    <div class="default-btn color-rojo-hover">
                        ELIMINAR
                    </div>
                    <div class="default-btn color-secundario-hover" onclick="cancelarEliminar()">
                        CANCELAR
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="/Proyecto/statics/js/veterinario/veterinario.js"></script>
    <script src="/Proyecto/statics/js/tabla.js"></script>
</body>

</html>