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

        <?php include("../../../includes/veteri_header.php") ?>

        <div class="main-user">

            <?php include("../../../includes/veteri_user.php") ?>

            <div class="contenedor">
                <div class="titulo-opcion">
                    <div class="motivo">HISTORIAL CLINICO</div>
                    <div class="atras" onclick="location.href = '../cliente.php'">
                        ATRAS
                    </div>
                </div>
                <div class="botones">

                    <div class="" onclick="location.href = ''">

                        <div class="texto">
                            SELECCIONE PACIENTE
                        </div>
                    </div>

                    <?php
                    if (isset($_GET["mascota"])) { ?>

                        <?php
                        $idMascota = $_GET["mascota"];
                        $query = "SELECT * FROM historial WHERE Id_Mascota = $idMascota ORDER BY Id_Historial DESC";
                        $result = mysqli_query($conn, $query);
                        $row = mysqli_num_rows($result);
                        if ($row > 0) { ?>
                            <div class="line"></div>
                            <?php

                            while ($row = mysqli_fetch_array($result)) { ?>
                                <div class="historial-opcion color-blanco-transparente color-secundario-hover">
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

                <?php
                        $cond = false;
                        if ($_GET["historial"] == 'last') {
                            $idMascota = $_GET["mascota"];
                            $query = "SELECT *, te.Tipo_Especie, r.Nombre_Raza
                                    FROM historial AS h, tipo_especies AS te, razas AS r
                                    WHERE h.Id_Mascota = $idMascota
                                    AND h.Id_Especie = te.Id_Especie
                                    AND h.Id_Raza = r.Id_Raza
                                    ORDER BY Fecha_Cita DESC";
                            $result = mysqli_query($conn, $query);
                            $row = mysqli_fetch_array($result);
                            if ($row > 1) {
                                $cond = true;
                            }
                        } else {
                            $idMascota = $_GET["mascota"];
                            $idHistorial = $_GET["historial"];
                            $query = "SELECT *, te.Tipo_Especie, r.Nombre_Raza
                                    FROM historial AS h, tipo_especies AS te, razas AS r
                                    WHERE h.Id_Historial = $idHistorial
                                    AND h.Id_Especie = te.Id_Especie
                                    AND h.Id_Raza = r.Id_Raza
                                    ";
                            $result = mysqli_query($conn, $query);
                            $row = mysqli_fetch_array($result);
                            if ($row > 1) {
                                $cond = true;
                            }
                        }
                ?>
                <?php

                        if ($cond) { ?>
                    <div class=" contenedor-default">
                        <div class="informacion-paciente">
                            <div class="historial-titulo">
                                1. DATOS GENERALES

                                <div class="historial-id">
                                    HISTORIAL # <?php echo $row['Id_Historial'] ?>
                                </div>
                            </div>
                            <div class="historial-info">
                                <div class="historial-columna">
                                    <div class="paciente-param">
                                        NOMBRE
                                    </div>

                                </div>
                                <div class="historial-columna historial-values">
                                    <div class="paciente-value valueBox">
                                        <?php echo $row['Nombre_Mascota'] ?>
                                        <input type="hidden" id="idMascota" value="<?php echo $idMascota ?>">
                                    </div>

                                </div>
                                <div class=" historial-columna">
                                    <div class="paciente-param">
                                        SEXO
                                    </div>
                                </div>
                                <div class="historial-columna historial-values">
                                    <div class="paciente-value valueBox">
                                        <?php echo $row['Sexo_Mascota'] ?>
                                    </div>
                                </div>
                                <div class="historial-columna">
                                    <div class="paciente-param">
                                        EDAD
                                    </div>

                                </div>
                                <div class="historial-columna historial-values">
                                    <div class="paciente-value valueBox">
                                        <?php echo $row['Edad_Mascota'] ?>
                                    </div>

                                </div>
                                <div class="historial-columna">
                                    <div class="paciente-param">
                                        ESPECIE
                                    </div>
                                </div>
                                <div class="historial-columna historial-values">
                                    <div class="paciente-value valueBox">
                                        <?php echo $row['Tipo_Especie'] ?>
                                    </div>
                                </div>
                                <div class="historial-columna">
                                    <div class="paciente-param">
                                        RAZA
                                    </div>

                                </div>
                                <div class="historial-columna historial-values">
                                    <div class="paciente-value valueBox">
                                        <?php echo $row['Nombre_Raza'] ?>

                                    </div>
                                </div>
                                <div class="historial-columna">
                                    <div class="paciente-param">
                                        DUEÑO
                                    </div>
                                </div>
                                <div class="historial-columna historial-values">
                                    <div class="paciente-value valueBox">
                                        <?php echo $row['Nombre_Cliente'] ?>
                                    </div>
                                </div>

                                <div class="historial-columna">
                                    <div class="paciente-param">
                                        #CITA
                                    </div>
                                </div>
                                <div class="historial-columna historial-values">
                                    <div class="paciente-value valueBox">
                                        <?php echo $row['Id_Cita'] ?>
                                    </div>
                                </div>
                                <div class="historial-columna">
                                    <div class="paciente-param">
                                        FECHA CITA
                                    </div>
                                </div>
                                <div class="historial-columna historial-values">
                                    <div class="paciente-value valueBox">
                                        <?php echo $row['Fecha_Cita'] ?>
                                        <input type="hidden" name="fechaCita" value="<?php echo $row['Fecha_Cita'] ?>">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="resena-paciente">
                            <div class="historial-titulo">
                                2. RESENA DEL PACIENTE
                            </div>
                            <div class="historial-info">

                                <div class="historial-columna historial-values">
                                    <div class="paciente-param">
                                        CONDICION CORPORAL
                                    </div>
                                    <div class="paciente-value">

                                        <input type="hidden" id="condicionCorporal" value="<?php echo $row['Id_ConcicionCorporal'] ?>">

                                        <div class="historial-value">
                                            <label class="custom-radio">
                                                <input type="radio" name="condicion" id="" value="1" disabled>
                                                <span class="radio-button">
                                                    <i class="fas fa-check"></i>
                                                </span>
                                                <span class="valueBox">Muy Delgado</span> <br>
                                            </label>
                                        </div>
                                        <div class="historial-value">
                                            <label class="custom-radio">
                                                <input type="radio" name="condicion" id="" value="2" disabled>
                                                <span class="radio-button">
                                                    <i class="fas fa-check"></i>
                                                </span>
                                                <span class="valueBox">Delgado</span> <br>
                                            </label>
                                        </div>
                                        <div class="historial-value">
                                            <label class="custom-radio">
                                                <input type="radio" name="condicion" id="" value="3" disabled>
                                                <span class="radio-button">
                                                    <i class="fas fa-check"></i>
                                                </span>
                                                <span class="valueBox">Peso Ideal</span> <br>
                                            </label>
                                        </div>
                                        <div class="historial-value">
                                            <label class="custom-radio">
                                                <input type="radio" name="condicion" id="" value="4" disabled>
                                                <span class="radio-button">
                                                    <i class="fas fa-check"></i>
                                                </span>
                                                <span class="valueBox">Sobrepeso</span> <br>
                                            </label>
                                        </div>
                                        <div class="historial-value">
                                            <label class="custom-radio">
                                                <input type="radio" name="condicion" id="" value="5" disabled>
                                                <span class="radio-button">
                                                    <i class="fas fa-check"></i>
                                                </span>
                                                <span class="valueBox">Obesidad</span> <br>
                                            </label>
                                        </div>


                                    </div>
                                </div>

                                <div class="historial-columna historial-values">
                                    <div class="paciente-param">
                                        ESTADO REPRODUCTIVO
                                    </div>
                                    <div class="paciente-value">
                                        <input type="hidden" id="estadoReproductivo" value="<?php echo $row['Id_EstadoReproductivo'] ?>">
                                        <div class="historial-value">
                                            <label class="custom-radio">
                                                <input type="radio" name="estadoReproductivo" id="" value="1" disabled>
                                                <span class="radio-button">
                                                    <i class="fas fa-check"></i>
                                                </span>
                                                <span class="valueBox">Normal</span> <br>
                                            </label>
                                        </div>
                                        <div class="historial-value">
                                            <label class="custom-radio">
                                                <input type="radio" name="estadoReproductivo" id="" value="2" disabled>
                                                <span class="radio-button">
                                                    <i class="fas fa-check"></i>
                                                </span>
                                                <span class="valueBox">Gestante</span> <br>
                                            </label>
                                        </div>
                                        <div class="historial-value">
                                            <label class="custom-radio">
                                                <input type="radio" name="estadoReproductivo" id="" value="3" disabled>
                                                <span class="radio-button">
                                                    <i class="fas fa-check"></i>
                                                </span>
                                                <span class="valueBox">Recien Parida</span> <br>
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="historial-columna historial-values">
                                    <div class="paciente-param">
                                        OBSERVACIONES
                                    </div>
                                    <div class="historial-columna historial-values">
                                        <textarea name="observacionEstado" id="motivo" cols="30" rows="5" spellcheck="false" class="textarea" disabled><?php echo $row['Observacion_EstadoReproductivo'] ?> </textarea>
                                    </div>
                                </div>

                            </div>

                        </div>

                        <div class="anamnesis">
                            <div class="historial-titulo">
                                3.1 ANAMNESIS
                            </div>
                            <div class="historial-info">

                                <div class="historial-columna historial-values">
                                    <div class="paciente-param">
                                        ¿QUE TIPO DE ALIMENTOS CONSUME?
                                    </div>
                                    <div class="paciente-value">
                                        <input type="hidden" id="tipoAlimento" value="<?php echo $row['Id_TipoAlimento'] ?>">
                                        <div class="historial-value">
                                            <label class="custom-radio">
                                                <input type="radio" name="alimentacion" id="" value="1" disabled>
                                                <span class="radio-button">
                                                    <i class="fas fa-check"></i>
                                                </span>
                                                <span class="valueBox">Pastoreo</span> <br>
                                            </label>
                                        </div>
                                        <div class="historial-value">
                                            <label class="custom-radio">
                                                <input type="radio" name="alimentacion" id="" value="2" disabled>
                                                <span class="radio-button">
                                                    <i class="fas fa-check"></i>
                                                </span>
                                                <span class="valueBox">Concentrado</span> <br>
                                            </label>
                                        </div>
                                        <div class="historial-value">
                                            <label class="custom-radio">
                                                <input type="radio" name="alimentacion" id="" value="3" disabled>
                                                <span class="radio-button">
                                                    <i class="fas fa-check"></i>
                                                </span>
                                                <span class="valueBox">Maiz/Sorgo</span> <br>
                                            </label>
                                        </div>
                                        <div class="historial-value">
                                            <label class="custom-radio">
                                                <input type="radio" name="alimentacion" id="" value="4" disabled>
                                                <span class="radio-button">
                                                    <i class="fas fa-check"></i>
                                                </span>
                                                <span class="valueBox">Pastoreo/Concentrado</span> <br>
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="historial-columna historial-values">
                                    <div class="paciente-param">
                                        CONSUMO DE ALIMENTO
                                    </div>
                                    <div class="paciente-value">
                                        <input type="hidden" id="consumoAlimento" value="<?php echo $row['Id_ConsumoAlimento'] ?>">

                                        <div class="historial-value">
                                            <label class="custom-radio">
                                                <input type="radio" name="consumo" id="" value="1" disabled>
                                                <span class="radio-button">
                                                    <i class="fas fa-check"></i>
                                                </span>
                                                <span class="valueBox">Normal</span> <br>
                                            </label>
                                        </div>
                                        <div class="historial-value">
                                            <label class="custom-radio">
                                                <input type="radio" name="consumo" id="" value="2" disabled>
                                                <span class="radio-button">
                                                    <i class="fas fa-check"></i>
                                                </span>
                                                <span class="valueBox">Disminuido</span> <br>
                                            </label>
                                        </div>
                                        <div class="historial-value">
                                            <label class="custom-radio">
                                                <input type="radio" name="consumo" id="" value="3" disabled>
                                                <span class="radio-button">
                                                    <i class="fas fa-check"></i>
                                                </span>
                                                <span class="valueBox">No Come</span> <br>
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="historial-columna historial-values">
                                    <div class="paciente-param">
                                        OBSERVACIONES
                                    </div>
                                    <div class="historial-columna historial-values">

                                        <textarea name="observacionAlimento" id="motivo" cols="30" rows="5" spellcheck="false" class="textarea" disabled><?php echo $row['Observacion_Alimentos'] ?></textarea>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="anamnesis">
                            <div class="historial-titulo">
                                3.2 ANAMNESIS
                            </div>
                            <div class="historial-info">

                                <div class="historial-columna historial-values">
                                    <div class="paciente-param">
                                        COMPORTAMIENTO
                                    </div>
                                    <div class="paciente-value">
                                        <input type="hidden" id="comportamiento" value="<?php echo $row['Id_Comportamiento'] ?>">

                                        <div class="historial-value">
                                            <label class="custom-radio">
                                                <input type="radio" name="comportamiento" id="" value="1" disabled>
                                                <span class="radio-button">
                                                    <i class="fas fa-check"></i>
                                                </span>
                                                <span class="valueBox">Normal</span> <br>
                                            </label>
                                        </div>
                                        <div class="historial-value">
                                            <label class="custom-radio">
                                                <input type="radio" name="comportamiento" id="" value="2" disabled>
                                                <span class="radio-button">
                                                    <i class="fas fa-check"></i>
                                                </span>
                                                <span class="valueBox">Agresivo</span> <br>
                                            </label>
                                        </div>
                                        <div class="historial-value">
                                            <label class="custom-radio">
                                                <input type="radio" name="comportamiento" id="" value="3" disabled>
                                                <span class="radio-button">
                                                    <i class="fas fa-check"></i>
                                                </span>
                                                <span class="valueBox">Inquieto</span> <br>
                                            </label>
                                        </div>
                                        <div class="historial-value">
                                            <label class="custom-radio">
                                                <input type="radio" name="comportamiento" id="" value="4" disabled>
                                                <span class="radio-button">
                                                    <i class="fas fa-check"></i>
                                                </span>
                                                <span class="valueBox">Muestra Malestar</span> <br>
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="historial-columna historial-values">
                                    <div class="paciente-param">
                                        ¿EL ANIMAL SE ENCUENTRA <br> DE PIE O POSTRADO?
                                    </div>
                                    <div class="paciente-value">
                                        <input type="hidden" id="estadoAnimal" value="<?php echo $row['Id_EstadoAnimal'] ?>">

                                        <div class="historial-value">
                                            <label class="custom-radio">
                                                <input type="radio" name="postrado" id="" value="1" disabled>
                                                <span class="radio-button">
                                                    <i class="fas fa-check"></i>
                                                </span>
                                                <span class="valueBox">De Pie</span> <br>
                                            </label>
                                        </div>
                                        <div class="historial-value">
                                            <label class="custom-radio">
                                                <input type="radio" name="postrado" id="" value="2" disabled>
                                                <span class="radio-button">
                                                    <i class="fas fa-check"></i>
                                                </span>
                                                <span class="valueBox">Postrado</span> <br>
                                            </label>
                                        </div>

                                    </div>
                                </div>

                                <div class="historial-columna historial-values">
                                    <div class="paciente-param">
                                        SI ESTA DE PIE... ¿COMO <br> CAMINA?
                                    </div>
                                    <div class="paciente-value">
                                        <div class="historial-value">
                                            <input type="hidden" id="estadoCaminar" value="<?php echo $row['Id_EstadoCaminar'] ?>">

                                            <label class="custom-radio">
                                                <input type="radio" name="comoCamina" id="" value="1" disabled>
                                                <span class="radio-button">
                                                    <i class="fas fa-check"></i>
                                                </span>
                                                <span class="valueBox">Renuente</span> <br>
                                            </label>
                                        </div>
                                        <div class="historial-value">
                                            <label class="custom-radio">
                                                <input type="radio" name="comoCamina" id="" value="2" disabled>
                                                <span class="radio-button">
                                                    <i class="fas fa-check"></i>
                                                </span>
                                                <span class="valueBox">Vacilante</span> <br>
                                            </label>
                                        </div>
                                        <div class="historial-value">
                                            <label class="custom-radio">
                                                <input type="radio" name="comoCamina" id="" value="3" disabled>
                                                <span class="radio-button">
                                                    <i class="fas fa-check"></i>
                                                </span>
                                                <span class="valueBox">Claudicante</span> <br>
                                            </label>
                                        </div>

                                    </div>
                                </div>

                            </div>
                            <div class="historial-info">

                                <div class="historial-columna historial-values">
                                    <div class="paciente-param">
                                        PIEL Y PELAJE
                                    </div>
                                    <div class="paciente-value">
                                        <input type="hidden" id="pelaje" value="<?php echo $row['Id_Pelaje'] ?>">

                                        <div class="historial-value">
                                            <label class="custom-radio">
                                                <input type="radio" name="pelaje" id="" value="1" disabled>
                                                <span class="radio-button">
                                                    <i class="fas fa-check"></i>
                                                </span>
                                                <span class="valueBox">Normal</span> <br>
                                            </label>
                                        </div>
                                        <div class="historial-value">
                                            <label class="custom-radio">
                                                <input type="radio" name="pelaje" id="" value="2" disabled>
                                                <span class="radio-button">
                                                    <i class="fas fa-check"></i>
                                                </span>
                                                <span class="valueBox">Hirsuto</span> <br>
                                            </label>
                                        </div>
                                        <div class="historial-value">
                                            <label class="custom-radio">
                                                <input type="radio" name="pelaje" id="" value="3" disabled>
                                                <span class="radio-button">
                                                    <i class="fas fa-check"></i>
                                                </span>
                                                <span class="valueBox">Abultamiento/Hinchazones</span> <br>
                                            </label>
                                        </div>
                                        <div class="historial-value">
                                            <label class="custom-radio">
                                                <input type="radio" name="pelaje" id="" value="4" disabled>
                                                <span class="radio-button">
                                                    <i class="fas fa-check"></i>
                                                </span>
                                                <span class="valueBox">Heridas</span> <br>
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="historial-columna historial-values">
                                    <div class="paciente-param">
                                        ALTERACIONES FUNCIONALES
                                    </div>
                                    <div class="col-alteraciones-principal">
                                        <div class="main-col-alteraciones">
                                            <div class="col-alteraciones">
                                                <div class="paciente-param2">
                                                    TEMPERATURA
                                                </div>
                                                <div class="paciente-value valueBox">
                                                    <?php echo $row['Temperatura'] ?> °C
                                                </div>
                                            </div>
                                            <div class="col-alteraciones">
                                                <div class="paciente-param2">
                                                    PULSO
                                                </div>
                                                <div class="paciente-value valueBox">
                                                    <?php echo $row['Pulso'] ?>/min
                                                </div>
                                            </div>
                                        </div>

                                        <div class="main-col-alteraciones">

                                            <div class="col-alteraciones">
                                                <div class="paciente-param2">
                                                    TIMPANIZADO
                                                </div>
                                                <div class="paciente-value valueBox">
                                                    <?php echo $row['Timpanizado'] ?>
                                                </div>
                                            </div>

                                            <div class="col-alteraciones">
                                                <div class="paciente-param2">
                                                    ATONIA
                                                </div>
                                                <div class="paciente-value valueBox">
                                                    <?php echo $row['Atonia'] ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="anamnesis">
                            <div class="historial-titulo">
                                4. MUCOSAS
                            </div>
                            <div class="mucosa-info">

                                <table>
                                    <thead>
                                        <th>MUCOSAS</th>
                                        <th>NORMAL (ROSASEA)</th>
                                        <th>ICTERICAS (AMARILLAS)</th>
                                        <th>HIPEREMIA (ROJAS)</th>
                                        <th>CIANOTICA (ROJAS)</th>
                                        <th>PALIDAS (BLANCAS)</th>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>OCULAR</td>
                                            <input type="hidden" id="mucosaOcular" value="<?php echo $row['Mucosa_Ocular'] ?>">

                                            <td><label class="custom-radio">
                                                    <input type="radio" name="ocular" id="" value="1" disabled>
                                                    <span class="radio-button">
                                                        <i class="fas fa-check"></i>
                                                    </span>
                                                </label></td>
                                            <td><label class="custom-radio">
                                                    <input type="radio" name="ocular" id="" value="2" disabled>
                                                    <span class="radio-button">
                                                        <i class="fas fa-check"></i>
                                                    </span>
                                                </label></td>
                                            <td><label class="custom-radio">
                                                    <input type="radio" name="ocular" id="" value="3" disabled>
                                                    <span class="radio-button">
                                                        <i class="fas fa-check"></i>
                                                    </span>
                                                </label></td>
                                            <td><label class="custom-radio">
                                                    <input type="radio" name="ocular" id="" value="4" disabled>
                                                    <span class="radio-button">
                                                        <i class="fas fa-check"></i>
                                                    </span>
                                                </label></td>
                                            <td><label class="custom-radio">
                                                    <input type="radio" name="ocular" id="" value="5" disabled>
                                                    <span class="radio-button">
                                                        <i class="fas fa-check"></i>
                                                    </span>
                                                </label></td>
                                        </tr>
                                        <tr>
                                            <td>BUCAL</td>
                                            <input type="hidden" id="mucosaBucal" value="<?php echo $row['Mucosa_Bucal'] ?>">

                                            <td><label class="custom-radio">
                                                    <input type="radio" name="bucal" id="" value="1" disabled>
                                                    <span class="radio-button">
                                                        <i class="fas fa-check"></i>
                                                    </span>
                                                </label></td>
                                            <td><label class="custom-radio">
                                                    <input type="radio" name="bucal" id="" value="2" disabled>
                                                    <span class="radio-button">
                                                        <i class="fas fa-check"></i>
                                                    </span>
                                                </label></td>
                                            <td><label class="custom-radio">
                                                    <input type="radio" name="bucal" id="" value="3" disabled>
                                                    <span class="radio-button">
                                                        <i class="fas fa-check"></i>
                                                    </span>
                                                </label></td>
                                            <td><label class="custom-radio">
                                                    <input type="radio" name="bucal" id="" value="4" disabled>
                                                    <span class="radio-button">
                                                        <i class="fas fa-check"></i>
                                                    </span>
                                                </label></td>
                                            <td><label class="custom-radio">
                                                    <input type="radio" name="bucal" id="" value="5" disabled>
                                                    <span class="radio-button">
                                                        <i class="fas fa-check"></i>
                                                    </span>
                                                </label></td>
                                        </tr>
                                        <tr>
                                            <td>NASAL</td>

                                            <input type="hidden" id="mucosaNasal" value="<?php echo $row['Mucosa_Nasal'] ?>">

                                            <td><label class="custom-radio">
                                                    <input type="radio" name="nasal" id="" value="1" disabled>
                                                    <span class="radio-button">
                                                        <i class="fas fa-check"></i>
                                                    </span>
                                                </label></td>
                                            <td><label class="custom-radio">
                                                    <input type="radio" name="nasal" id="" value="2" disabled>
                                                    <span class="radio-button">
                                                        <i class="fas fa-check"></i>
                                                    </span>
                                                </label></td>
                                            <td><label class="custom-radio">
                                                    <input type="radio" name="nasal" id="" value="3" disabled>
                                                    <span class="radio-button">
                                                        <i class="fas fa-check"></i>
                                                    </span>
                                                </label></td>
                                            <td><label class="custom-radio">
                                                    <input type="radio" name="nasal" id="" value="4" disabled>
                                                    <span class="radio-button">
                                                        <i class="fas fa-check"></i>
                                                    </span>
                                                </label></td>
                                            <td><label class="custom-radio">
                                                    <input type="radio" name="nasal" id="" value="5" disabled>
                                                    <span class="radio-button">
                                                        <i class="fas fa-check"></i>
                                                    </span>
                                                </label></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="anamnesis">
                            <div class="historial-titulo">
                                5. COMENTARIOS
                            </div>

                            <textarea class="historial-comentario" spellcheck="false" name="comentarioPrincipal" disabled><?php echo $row['Comentarios'] ?></textarea>
                        </div>
                    </div>

                <?php } else {
                        }
                ?>
            <?php } ?>
            </div>
        </div>
        <script src="/Proyecto/statics/js/veterinario/veteri_historial.js"></script>
</body>

</html>