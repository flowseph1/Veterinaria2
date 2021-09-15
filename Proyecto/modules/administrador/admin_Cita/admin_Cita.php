<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Administrador | Cita</title>
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
                    <div class="motivo">CITAS</div>
                    <div class="atras" onclick="location.href = '../administrador.php'">
                        ATRAS
                    </div>
                </div>
                <div class="botones">
                    <div class="boton verde" onclick="location.href = '../admin_Cita/admin_agregarCita.php'">
                        <div class="image">
                            <i class="far fa-calendar-plus"></i>
                        </div>
                        <div class="texto">
                            AGENDAR CITA
                        </div>
                    </div>
                    <div class="line">

                    </div>
                    <div class="bloqueo-boton-general">
                        <div class="boton rojo" id="eliminar" onclick="accionEliminar()">
                            <div class="image">
                                <i class="fas fa-times"></i>
                            </div>
                            <div class="texto">
                                CANCELAR CITA
                            </div>
                        </div>
                        <div class="bloqueo-boton">

                        </div>
                    </div>

                    <?php

                    if (isset($_GET["value"])) { ?>

                        <div class="alerta-warning">
                            <i class="far fa-calendar-minus"></i>&nbsp; CITA CANCELADA
                        </div>
                    <?php } ?>
                </div>
                <div class="tabla-contenedor">
                    <div class="descripcion">
                        <div class="herramientas">
                            <div class="buscador">
                                <div class="icono-buscar">
                                    <i class="fas fa-search"></i>
                                </div>
                                <div class="cajaTexto-buscar">
                                    <input type="text" spellcheck="false" placeholder="BUSCAR ID O DESCRIPCION DE CITA" id="buscar">
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
                        <table id="tb-cliente" class="tabla-general">
                            <thead>
                                <th>ID CITA</th>
                                <th>ID CLIENTE</th>
                                <th>CLIENTE</th>
                                <th>MASCOTA</th>
                                <th>FECHA CITA</th>
                                <th>HORA</th>
                                <th>VETERINARIO</th>
                                <th>ESTADO</th>
                                <th>DESCRIPCION</th>
                            </thead>
                            <tbody>
                                <?php

                                date_default_timezone_set('America/Tegucigalpa');

                                include("../../conexion/conexion.php");

                                $idCliente = $_SESSION['idAdmin'];
                                $query = "SELECT c.Id_Cita, c.Id_Cliente, cl.Nombre, m.Nombre_Mascota, c.Fecha_Cita, c.Hora_Cita, p.Nombre AS Veterinario, e.Estado_Cita, c.Motivo_Cita
                                FROM citas AS c, mascotas AS m, personal AS p, estadocitas AS e, clientes AS cl
                                WHERE m.Id_Cliente = c.Id_Cliente
                                AND c.Id_Cliente = cl.Id_Cliente
                                AND c.Id_Veterinario = p.Id_Personal
                                AND c.Id_EstadoCita = e.Id_EstadoCita
                                AND c.Id_Mascota = m.Id_Mascota
                                ORDER BY FIELD(c.Id_EstadoCita, '1', '2', '3', '4')";
                                $result = mysqli_query($conn, $query);
                                while ($row = mysqli_fetch_array($result)) {
                                    $idCita = $row['Id_Cita'];
                                    $idCliente = $row['Id_Cliente'];
                                    $nombreCliente = $row['Nombre'];
                                    $nombreMascota = $row['Nombre_Mascota'];
                                    $fechaCita = $row['Fecha_Cita'];
                                    $horaCita = $row['Hora_Cita'];
                                    $veterinarioCita = $row['Veterinario'];
                                    $estadoCita = $row['Estado_Cita'];
                                    $descripcionCita = $row['Motivo_Cita'];

                                    $formatoFecha = date('d-m-Y', strtotime($fechaCita));
                                    $formatoHora = date('h:i a', strtotime($horaCita));
                                ?>

                                    <tr class="filas" onclick="filas(event)">
                                        <td><?php echo $idCita ?></td>
                                        <td><?php echo $idCliente ?></td>
                                        <td><?php echo $nombreCliente ?></td>
                                        <td><?php echo $nombreMascota ?></td>
                                        <td><?php echo $formatoFecha ?></td>
                                        <td><?php echo $formatoHora ?></td>
                                        <td><?php echo $veterinarioCita ?></td>
                                        <td><?php

                                            switch ($estadoCita) {
                                                case 'Pendiente':
                                                    echo "<div class='pendiente'> $estadoCita </div>";
                                                    break;
                                                case 'Cancelada':
                                                    echo "<div class='cancelada'> $estadoCita </div>";
                                                    break;
                                                case 'Realizada':
                                                    echo "<div class='realizada'> $estadoCita </div>";
                                                    break;
                                                case 'Preclinica':
                                                    echo "<div class='consulta-pendiente'> $estadoCita </div>";
                                                    break;
                                                default:
                                                    echo "nada";
                                                    break;
                                            }


                                            ?></td>
                                        <td><?php echo $descripcionCita ?></td>
                                    </tr>


                                <?php } ?>


                            </tbody>
                        </table>
                    </div>
                </div>


            </div>

        </div>

        <input type="hidden" name="idCliente" id="IdElemento">

        <div class="eliminar">
            <div class="mensaje color-blanco-transparente">

                <div class="eliminar-mensaje">
                    ¿Esta seguro que desea cancelar cita: <span id="nombreClienteEliminado"></span>
                    a nombre de: <span id="nombreMascotaCita"></span>?

                </div>

                <div class="eliminar-buttons">
                    <form action="cancelarCita.php" method="get" id="form2">
                        <input type="hidden" name="idCita" id="idCita">
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

        <script src="/Proyecto/statics/js/administrador/admin_cita/tablaAdminCita.js"></script>
        <script src="/Proyecto/statics/js/administrador/admin_cita/adminCita.js"></script>
</body>

</html>