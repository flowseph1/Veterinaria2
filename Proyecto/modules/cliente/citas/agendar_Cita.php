<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="/Proyecto/statics/css/main.css" />
    <link rel="stylesheet" href="/Proyecto/statics/css/cliente/_cliente.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Gowun+Dodum&display=swap" rel="stylesheet">
</head>

<body>
    <div class="fondo">

        <?php include("../../../includes/cliente_header.php") ?>

        <div class="main-user">

            <?php include("../../../includes/cliente_user.php") ?>



            <div class="contenedor">
                <div class="titulo-opcion">
                    <div class="motivo">AGENDAR CITA</div>
                    <div class="atras" onclick="location.href = '../citas/citas.php'">
                        ATRAS
                    </div>
                </div>
                <div class="botones">
                    <div class="boton verde">
                        <div class="image save">
                            <i class="far fa-calendar-plus"></i>
                        </div>
                        <div class="texto">
                            AGENDAR
                        </div>
                    </div>
                    <div class="line">

                    </div>
                    <div class="boton limpiar-button" id="limpiar-button">
                        <div class="texto-limpiar">
                            LIMPIAR
                        </div>
                    </div>

                    <?php

                    if (isset($_GET["value"])) { ?>

                        <div class="alerta-exito">
                            <i class="fas fa-check"></i> &nbsp; AGENDADO CORRECTAMENTE
                        </div>
                    <?php } ?>

                </div>

                <?php
                if (isset($_GET['mascota'])) {
                    $mascota = $_GET['mascota'];
                    $veterinario = $_GET['veterinario'];
                    $fecha = $_GET['date'];
                    $motivo = $_GET['motivo'];

                    echo "<input type='hidden' value='$mascota' id='hiddenMascota'>" .
                        "<input type='hidden' value='$veterinario' id='hiddenVeterinario'>" .
                        "<input type='hidden' value='$fecha' id='hiddenFecha'>" .
                        "<input type='hidden' value='$motivo' id='hiddenMotivo'>";
                }
                ?>

                <div class="agregar cliente">
                    <form action="agendar.php">
                        <div class="forma">
                            <div class="personal cita">
                                <div class="informacion-personal">
                                    AGENDAR CITA
                                </div>
                                <div class="line-horizontal">
                                </div>
                                <div class="info-personal">
                                    <div class="col">
                                        <div class="params">ELEGIR MASCOTA
                                        </div>
                                        <div class="params">VETERINARIO
                                        </div>
                                        <div class="params">FECHA
                                        </div>
                                    </div>
                                    <div class="col inputs">
                                        <div class="values">
                                            <select name="mascota" id="mascotas" class="selection" name="genero">
                                                <option value="" disabled selected value>SELECCIONE</option>
                                                <?php

                                                $mascota = $_GET['idMascota'];

                                                include("../../conexion/conexion.php");
                                                $idCliente = $_SESSION['idCliente'];
                                                $query = "SELECT Nombre_Mascota, Id_Mascota FROM mascotas WHERE Id_Cliente  = '$idCliente'";
                                                $result = mysqli_query($conn, $query);
                                                while ($row = mysqli_fetch_array($result)) {
                                                    $nombreMascota = $row['Nombre_Mascota'];
                                                    $idMascota = $row['Id_Mascota'];
                                                    echo "<option value='$idMascota'>$nombreMascota</option>";
                                                }
                                                ?>
                                                <input type="hidden" name="" value="<?php echo $mascota; ?>" id="inputMascota">
                                            </select>
                                            <div class="params-op">
                                                OBLIGATORIO
                                            </div>
                                        </div>
                                        <div class="values">
                                            <select name="veterinario" id="veterinario" class="selection" name="genero">
                                                <option value="" disabled selected value>SELECCIONE</option>
                                                <?php

                                                $query = "SELECT p.Nombre, p.Id_Personal FROM personal AS p, usuarios AS u WHERE u.Id_TipoUsuario = 3 AND p.Id_Usuario = u.Id_Usuario ";
                                                $result = mysqli_query($conn, $query);
                                                while ($row = mysqli_fetch_array($result)) { ?>

                                                    <option value=<?php echo $row['Id_Personal'] ?> value><?php echo $row['Nombre'] ?></option>

                                                <?php  } ?>

                                            </select>
                                            <div class="params-op">
                                                OBLIGATORIO
                                            </div>
                                        </div>
                                        <div class="values">
                                            <input type="date" name="fecha" id="fecha">
                                            <?php
                                            if (isset($_GET['mascota'])) {

                                                $date2 = $_GET['date'];

                                                $query = "SELECT * FROM citas WHERE Fecha_Cita = '$date2'";
                                                $result = mysqli_query($conn, $query);
                                                while ($rows = mysqli_fetch_array($result)) {
                                                    $horario = $rows['Hora_Cita'];
                                                    echo "<input type='hidden' value='$horario' class='horarioOcupado'>";
                                                }
                                            }
                                            ?>
                                            <div class="params-op">
                                                OBLIGATORIO
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">

                                        <div class="params">HORARIO
                                        </div>
                                        <div class="params textareas">MOTIVO DE CITA
                                        </div>
                                    </div>
                                    <div class="col">

                                        <div class="values">
                                            <select name="horario" id="" class="selection" name="genero">
                                                <option value="" disabled selected value>SELECCIONE</option>
                                                <option value="08:00">08:00 AM</option>
                                                <option value="09:00">09:00 AM</option>
                                                <option value="10:00">10:00 AM</option>
                                                <option value="11:00">11:00 AM</option>
                                                <option value="13:00">1:00 PM</option>
                                                <option value="14:00">2:00 PM</option>
                                                <option value="15:00">3:00 PM</option>
                                                <option value="16:00">4:00 PM</option>

                                            </select>
                                            <div class="params-op">
                                                OBLIGATORIO
                                            </div>
                                        </div>
                                        <div class="values textareas">
                                            <textarea name="motivo" id="motivo" cols="30" rows="5" spellcheck="false"></textarea>
                                            <div class="params-op">
                                                OBLIGATORIO
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>



                        </div>
                    </form>
                </div>
            </div>
        </div>
        <script src="/Proyecto/statics/js/cliente/agendar_Cita.js"></script>
        <script src="/Proyecto/statics/js/main.js"></script>
</body>

</html>