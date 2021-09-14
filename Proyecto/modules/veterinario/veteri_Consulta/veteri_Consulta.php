<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Veterinaria | Consultas</title>
    <link rel="stylesheet" href="../../../statics/css/main.css" />
    <link rel="stylesheet" href="../../../statics/css/administrador/admin_Cliente/cliente.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Gowun+Dodum&display=swap" rel="stylesheet">
</head>

<body>
    <div class="fondo">

        <?php include("../../../includes/veteri_header.php") ?>

        <div class="main-user">

            <?php include("../../../includes/veteri_user.php") ?>

            <div class="contenedor">
                <div class="titulo-opcion">
                    <div class="motivo">ATENDER CONSULTA</div>
                    <div class="atras" onclick="location.href = '../veteri_Cita/veteri_Cita.php'">
                        ATRAS
                    </div>
                </div>
                <div class="botones">
                    <?php
                    if (isset($_GET["idCita"])) {
                        $idCita = 58;
                        $query = "SELECT c.Id_Mascota,m.Nombre_Mascota FROM citas AS c, mascotas AS m WHERE c.Id_Mascota=m.Id_Mascota AND c.Id_Cita= $idCita";
                        $result = mysqli_query($conn, $query);
                        $row = mysqli_fetch_array($result);
                        $nombreMascota = $row['Nombre_Mascota'];
                        $idMascota = $row['Id_Mascota'];
                    ?>


                        <?php
                        $idCita = $_GET["idCita"];
                        $query = "SELECT * FROM historial WHERE Id_Cita = $idCita ORDER BY Id_Historial DESC";
                        $result = mysqli_query($conn, $query);
                        $row = mysqli_num_rows($result);
                        if ($row > 0) { ?>
                            <div class="line"></div>
                            <?php

                            while ($row = mysqli_fetch_array($result)) { ?>

                                <div class="historial-opcion color-blanco-transparente color-secundario-hover" onclick="accionMostrar()">
                                    <div class="historial-opcion-id">
                                        <div class="param">
                                            #HISTORIAL:
                                        </div>
                                        <div class="value">
                                            <?php echo $row['Id_Historial']; ?>
                                        </div>
                                        <div class="historial-opcion-icon">
                                            <i class="fas fa-history"></i>
                                        </div>
                                    </div>
                                    <div class="historial-opcion-fecha">
                                        <div class="param">
                                            FECHA:
                                        </div>
                                        <div class="value f-2x">
                                            <?php

                                            $date = date('d-m-Y', strtotime($row['Fecha_Cita']));

                                            echo $date ?>
                                        </div>
                                    </div>

                                </div>

                            <?php } ?>
                        <?php
                        } else {
                            echo "
                            <div class='line'></div>
                            <div class='alerta-mascota'>
                            <i class='fas fa-exclamation-circle'></i>
                            SIN HISTORIAL CLINICO </div>";
                        }

                        ?>

                </div>
                <div class=" contenedor-default">
                    <?php include("veteri_Historial.php") ?>
                <?php } else {
                    }
                ?>
                <div class="informacion-consulta">
                    <div class="consulta-titulo">
                        1. DATOS GENERALES CONSULTA
                    </div>
                    <div class="consulta-columna consulta-values">
                        <div class="paciente-param">
                            SINTOMAS:
                        </div>
                        <div class="consulta-columna consulta-values">
                            <textarea name="sintomas" id="motivo" cols="300" rows="10" spellcheck="false" class="textarea"></textarea>
                        </div>
                    </div>
                    <div class="historial-titulo">
                        2. DIAGNOSTICO
                    </div>
                    <div class="consulta-columna consulta-values">
                        <div class="paciente-param">
                            DIAGNOSTICO VETERINARIO:
                        </div>
                        <div class="consulta-columna consulta-values">
                            <textarea name="sintomas" id="motivo" cols="300" rows="10" spellcheck="false" class="textarea"></textarea>
                        </div>
                    </div>
                    <div class="botones">
                        <div class="boton verde" onclick="location.href = '../veteri_Medicamentos/veteri_Medicamento.php'">
                            <div class="image">
                                <i class="fas fa-pills"></i>
                            </div>
                            <div class="texto">
                                AGREGAR MEDICAMENTOS
                            </div>
                        </div>
                    </div>
                </div>
                </div>

            </div>

        </div>
    </div>

    <script src="/Proyecto/statics/js/veterinario/veteri_citas.js"></script>
    <script src="/Proyecto/statics/js/veterinario/veteri_historial.js"></script>
    <script src="/Proyecto/statics/js/tabla.js"></script>
</body>

</html>