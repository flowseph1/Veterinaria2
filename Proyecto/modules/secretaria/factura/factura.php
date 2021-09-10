<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="/Proyecto/statics/css/main.css" />
    <link rel="stylesheet" href="/Proyecto/statics/css/administrador/admin_Cliente/cliente.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Gowun+Dodum&display=swap" rel="stylesheet">
</head>

<body>
    <div class="fondo">

        <?php include("../../../includes/secretaria_header.php") ?>

        <div class="main-user">

            <?php include("../../../includes/secretaria_user.php") ?>

            <div class="contenedor">
                <div class="titulo-opcion">
                    <div class="motivo">FACTURACION</div>
                    <div class="atras" onclick="location.href = '../secretaria.php'">
                        ATRAS
                    </div>
                </div>
                <div class="botones">
                    <div class="bloqueo-boton-general">
                        <div class="boton verde" id="preclinica">
                            <div class="image">
                                <i class="fas fa-receipt"></i>
                            </div>
                            <div class="texto">
                                REALIZAR FACTURA
                            </div>
                        </div>
                        <div class="bloqueo-boton">

                        </div>
                    </div>

                    <div class="line">

                    </div>

                    <?php

                    if (isset($_GET["historial"])) { ?>

                        <div class="alerta-exito">
                            <i class="fas fa-check"></i></i>&nbsp; PRE-CLINICA REALIZADA CORRECTAMENTE
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
                                <th>ID CONSULTA</th>
                                <th>NOMBRE CLIENTE</th>
                                <th>MASCOTA</th>
                                <th>ID CITA</th>
                                <th>VETERINARIO</th>
                                <th>ID RECETA</th>
                                <th>DIAGNOSTICO CONSULTA</th>
                                <th>FECHA CONSULTA</th>
                            </thead>
                            <tbody>
                                <?php

                                date_default_timezone_set('America/Tegucigalpa');

                                include("../../conexion/conexion.php");

                                $idCliente = $_SESSION['idCliente'];
                                $query = "SELECT h.Id_Historial, cl.Nombre, c.Id_Cita, m.Nombre_Mascota, p.Nombre AS Veterinario, r.Id_Receta, co.Id_Consulta, co.Diagnostico_Consulta, co.Fecha_Consulta
                                FROM consulta AS co, historial AS h, clientes AS cl, citas AS c, mascotas AS m, personal AS p, recetas AS r
                                WHERE co.Id_Historial = h.Id_Historial
                                AND co.Id_Cliente = cl.Id_Cliente
                                AND co.Id_Cita = c.Id_Cita
                                AND co.Id_Mascota = m.Id_Mascota
                                AND co.Id_Personal = p.Id_Personal
                                AND co.Id_Receta = r.Id_Receta
                                ORDER BY c.Fecha_Cita ASC";
                                $result = mysqli_query($conn, $query);
                                while ($row = mysqli_fetch_array($result)) {
                                    $idHistorial = $row['Id_Historial'];
                                    $nombreCliente = $row['Nombre'];
                                    $idCita = $row['Id_Cita'];
                                    $nombreMascota = $row['Nombre_Mascota'];
                                    $nombrePersonal = $row['Veterinario'];
                                    $idReceta = $row['Id_Receta'];
                                    $idConsulta = $row['Id_Consulta'];
                                    $diagnostico = $row['Diagnostico_Consulta'];
                                    $fechaConsulta = $row['Fecha_Consulta'];

                                    $formatoFecha = date('d-m-Y', strtotime($fechaConsulta));
                                ?>

                                    <tr class="filas" onclick="filas(event)">
                                        <td><?php echo $idConsulta ?></td>
                                        <td><?php echo $nombreCliente ?></td>
                                        <td><?php echo $nombreMascota ?></td>
                                        <td><?php echo $idCita ?></td>
                                        <td><?php echo $nombrePersonal ?></td>
                                        <td><?php echo $idReceta ?></td>
                                        <td><?php echo $diagnostico ?></td>
                                        <td><?php echo $fechaConsulta ?></td>
                                    </tr>


                                <?php } ?>


                            </tbody>
                        </table>
                    </div>
                </div>


            </div>

        </div>

        <input type="hidden" name="" id="IdElemento">


        <script src="/Proyecto/statics/js/cliente/cliente.js"></script>
        <script src="/Proyecto/statics/js/cliente/cita.js"></script>
        <script src="/Proyecto/statics/js/auxiliar/auxiliar.js"></script>

</body>

</html>