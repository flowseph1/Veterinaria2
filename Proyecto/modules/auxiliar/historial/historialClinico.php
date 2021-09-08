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

        <?php include("../../../includes/auxiliar_header.php") ?>

        <div class="main-user">

            <?php include("../../../includes/auxiliar_user.php") ?>

            <div class="contenedor">
                <div class="titulo-opcion">
                    <div class="motivo">HISTORIAL CLINICO</div>
                    <div class="atras" onclick="location.href = 'preclinica.php'">
                        ATRAS
                    </div>
                </div>
                <div class="botones">
                    <div class="boton verde" onclick="location.href = ''">
                        <div class="image">
                            <i class="far fa-save"></i>
                        </div>
                        <div class="texto">
                            GUARDAR
                        </div>
                    </div>
                    <div class="line">

                    </div>

                    <?php

                    if (isset($_GET["value"])) { ?>

                        <div class="alerta-exito">
                            <i class="far fa-calendar-minus"></i>&nbsp; CITA CANCELADA
                        </div>
                    <?php } ?>
                </div>

                <?php

                //Obtener informacion de Cita.

                $idCita = $_GET["cita"];

                $query = "SELECT m.Id_Mascota, m.Nombre_Mascota, m.Sexo, m.Edad_Mascota, te.Tipo_Especie, te.Id_Especie,
                          r.Nombre_Raza, r.Id_Raza, cl.Nombre, cl.Id_Cliente, c.Fecha_Cita
                FROM citas AS c, mascotas AS m, clientes AS cl,
                    tipo_especies AS te, razas AS r
                WHERE c.Id_Cita = '$idCita'
                AND   m.Id_Mascota = c.Id_Mascota
                AND   cl.Id_Cliente = c.Id_Cliente
                AND   te.Id_Especie = m.Id_Especie
                AND   r.Id_Raza = m.Id_Raza
                ";
                $result = mysqli_query($conn, $query);
                $row = mysqli_fetch_array($result);


                ?>

                <form action="agregarHistorial.php" name="formulario1" id="formulario1" method="post">
                    <div class=" contenedor-default">
                        <div class="informacion-paciente">
                            <div class="historial-titulo">
                                1. DATOS GENERALES
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
                                        <input type="hidden" name="nombreMascota" value="<?php echo $row['Nombre_Mascota'] ?>">
                                        <input type="hidden" name="idMascota" value="<?php echo $row['Id_Mascota'] ?>">
                                    </div>

                                </div>
                                <div class=" historial-columna">
                                    <div class="paciente-param">
                                        SEXO
                                    </div>
                                </div>
                                <div class="historial-columna historial-values">
                                    <div class="paciente-value valueBox">
                                        <?php echo $row['Sexo'] ?>
                                        <input type="hidden" name="sexoMascota" value="<?php echo $row['Sexo'] ?>">
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
                                        <input type="hidden" name="edadMascota" value="<?php echo $row['Edad_Mascota'] ?>">
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
                                        <input type="hidden" name="especieMascota" value="<?php echo $row['Tipo_Especie'] ?>">
                                        <input type="hidden" name="idEspecie" value="<?php echo $row['Id_Especie'] ?>">
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
                                        <input type="hidden" name="nombreRaza" value="<?php echo $row['Nombre_Raza'] ?>">
                                        <input type="hidden" name="idRaza" value="<?php echo $row['Id_Raza'] ?>">
                                    </div>
                                </div>
                                <div class="historial-columna">
                                    <div class="paciente-param">
                                        DUEÑO
                                    </div>
                                </div>
                                <div class="historial-columna historial-values">
                                    <div class="paciente-value valueBox">
                                        <?php echo $row['Nombre'] ?>
                                        <input type="hidden" name="nombreCliente" value="<?php echo $row['Nombre'] ?>">
                                        <input type="hidden" name="idCliente" value="<?php echo $row['Id_Cliente'] ?>">
                                    </div>
                                </div>

                                <div class="historial-columna">
                                    <div class="paciente-param">
                                        #CITA
                                    </div>
                                </div>
                                <div class="historial-columna historial-values">
                                    <div class="paciente-value valueBox">
                                        <?php
                                        echo $idCita;
                                        ?>
                                        <input type="hidden" name="idCita" value="<?php echo $idCita ?>">
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
                                        <div class="historial-value">
                                            <label class="custom-radio">
                                                <input type="radio" name="condicion" id="" value="1">
                                                <span class="radio-button">
                                                    <i class="fas fa-check"></i>
                                                </span>
                                                <span class="valueBox">Muy Delgado</span> <br>
                                            </label>
                                        </div>
                                        <div class="historial-value">
                                            <label class="custom-radio">
                                                <input type="radio" name="condicion" id="" value="2">
                                                <span class="radio-button">
                                                    <i class="fas fa-check"></i>
                                                </span>
                                                <span class="valueBox">Delgado</span> <br>
                                            </label>
                                        </div>
                                        <div class="historial-value">
                                            <label class="custom-radio">
                                                <input type="radio" name="condicion" id="" value="3">
                                                <span class="radio-button">
                                                    <i class="fas fa-check"></i>
                                                </span>
                                                <span class="valueBox">Peso Ideal</span> <br>
                                            </label>
                                        </div>
                                        <div class="historial-value">
                                            <label class="custom-radio">
                                                <input type="radio" name="condicion" id="" value="4">
                                                <span class="radio-button">
                                                    <i class="fas fa-check"></i>
                                                </span>
                                                <span class="valueBox">Sobrepeso</span> <br>
                                            </label>
                                        </div>
                                        <div class="historial-value">
                                            <label class="custom-radio">
                                                <input type="radio" name="condicion" id="" value="5">
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
                                        <div class="historial-value">
                                            <label class="custom-radio">
                                                <input type="radio" name="estadoReproductivo" id="" value="1">
                                                <span class="radio-button">
                                                    <i class="fas fa-check"></i>
                                                </span>
                                                <span class="valueBox">Normal</span> <br>
                                            </label>
                                        </div>
                                        <div class="historial-value">
                                            <label class="custom-radio">
                                                <input type="radio" name="estadoReproductivo" id="" value="2">
                                                <span class="radio-button">
                                                    <i class="fas fa-check"></i>
                                                </span>
                                                <span class="valueBox">Gestante</span> <br>
                                            </label>
                                        </div>
                                        <div class="historial-value">
                                            <label class="custom-radio">
                                                <input type="radio" name="estadoReproductivo" id="" value="3">
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
                                        <textarea name="observacionEstado" id="motivo" cols="30" rows="5" spellcheck="false" class="textarea"></textarea>
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
                                        <div class="historial-value">
                                            <label class="custom-radio">
                                                <input type="radio" name="alimentacion" id="" value="1">
                                                <span class="radio-button">
                                                    <i class="fas fa-check"></i>
                                                </span>
                                                <span class="valueBox">Pastoreo</span> <br>
                                            </label>
                                        </div>
                                        <div class="historial-value">
                                            <label class="custom-radio">
                                                <input type="radio" name="alimentacion" id="" value="2">
                                                <span class="radio-button">
                                                    <i class="fas fa-check"></i>
                                                </span>
                                                <span class="valueBox">Concentrado</span> <br>
                                            </label>
                                        </div>
                                        <div class="historial-value">
                                            <label class="custom-radio">
                                                <input type="radio" name="alimentacion" id="" value="3">
                                                <span class="radio-button">
                                                    <i class="fas fa-check"></i>
                                                </span>
                                                <span class="valueBox">Maiz/Sorgo</span> <br>
                                            </label>
                                        </div>
                                        <div class="historial-value">
                                            <label class="custom-radio">
                                                <input type="radio" name="alimentacion" id="" value="4">
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
                                        <div class="historial-value">
                                            <label class="custom-radio">
                                                <input type="radio" name="consumo" id="" value="1">
                                                <span class="radio-button">
                                                    <i class="fas fa-check"></i>
                                                </span>
                                                <span class="valueBox">Normal</span> <br>
                                            </label>
                                        </div>
                                        <div class="historial-value">
                                            <label class="custom-radio">
                                                <input type="radio" name="consumo" id="" value="2">
                                                <span class="radio-button">
                                                    <i class="fas fa-check"></i>
                                                </span>
                                                <span class="valueBox">Disminuido</span> <br>
                                            </label>
                                        </div>
                                        <div class="historial-value">
                                            <label class="custom-radio">
                                                <input type="radio" name="consumo" id="" value="3">
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

                                        <textarea name="observacionAlimento" id="motivo" cols="30" rows="5" spellcheck="false" class="textarea"></textarea>
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
                                        <div class="historial-value">
                                            <label class="custom-radio">
                                                <input type="radio" name="comportamiento" id="" value="1">
                                                <span class="radio-button">
                                                    <i class="fas fa-check"></i>
                                                </span>
                                                <span class="valueBox">Normal</span> <br>
                                            </label>
                                        </div>
                                        <div class="historial-value">
                                            <label class="custom-radio">
                                                <input type="radio" name="comportamiento" id="" value="2">
                                                <span class="radio-button">
                                                    <i class="fas fa-check"></i>
                                                </span>
                                                <span class="valueBox">Agresivo</span> <br>
                                            </label>
                                        </div>
                                        <div class="historial-value">
                                            <label class="custom-radio">
                                                <input type="radio" name="comportamiento" id="" value="3">
                                                <span class="radio-button">
                                                    <i class="fas fa-check"></i>
                                                </span>
                                                <span class="valueBox">Inquieto</span> <br>
                                            </label>
                                        </div>
                                        <div class="historial-value">
                                            <label class="custom-radio">
                                                <input type="radio" name="comportamiento" id="" value="4">
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
                                        <div class="historial-value">
                                            <label class="custom-radio">
                                                <input type="radio" name="postrado" id="" value="1">
                                                <span class="radio-button">
                                                    <i class="fas fa-check"></i>
                                                </span>
                                                <span class="valueBox">De Pie</span> <br>
                                            </label>
                                        </div>
                                        <div class="historial-value">
                                            <label class="custom-radio">
                                                <input type="radio" name="postrado" id="" value="2">
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
                                            <label class="custom-radio">
                                                <input type="radio" name="comoCamina" id="" value="1">
                                                <span class="radio-button">
                                                    <i class="fas fa-check"></i>
                                                </span>
                                                <span class="valueBox">Renuente</span> <br>
                                            </label>
                                        </div>
                                        <div class="historial-value">
                                            <label class="custom-radio">
                                                <input type="radio" name="comoCamina" id="" value="2">
                                                <span class="radio-button">
                                                    <i class="fas fa-check"></i>
                                                </span>
                                                <span class="valueBox">Vacilante</span> <br>
                                            </label>
                                        </div>
                                        <div class="historial-value">
                                            <label class="custom-radio">
                                                <input type="radio" name="comoCamina" id="" value="3">
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
                                        <div class="historial-value">
                                            <label class="custom-radio">
                                                <input type="radio" name="pelaje" id="" value="1">
                                                <span class="radio-button">
                                                    <i class="fas fa-check"></i>
                                                </span>
                                                <span class="valueBox">Normal</span> <br>
                                            </label>
                                        </div>
                                        <div class="historial-value">
                                            <label class="custom-radio">
                                                <input type="radio" name="pelaje" id="" value="2">
                                                <span class="radio-button">
                                                    <i class="fas fa-check"></i>
                                                </span>
                                                <span class="valueBox">Hirsuto</span> <br>
                                            </label>
                                        </div>
                                        <div class="historial-value">
                                            <label class="custom-radio">
                                                <input type="radio" name="pelaje" id="" value="3">
                                                <span class="radio-button">
                                                    <i class="fas fa-check"></i>
                                                </span>
                                                <span class="valueBox">Abultamiento/Hinchazones</span> <br>
                                            </label>
                                        </div>
                                        <div class="historial-value">
                                            <label class="custom-radio">
                                                <input type="radio" name="pelaje" id="" value="4">
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
                                                <input type="text" name="temperatura" id="" class="inputHistorial">
                                                °C
                                            </div>
                                            <div class="col-alteraciones">
                                                <div class="paciente-param2">
                                                    PULSO
                                                </div>
                                                <input type="text" name="pulso" id="" class="inputHistorial">
                                                /min
                                            </div>
                                        </div>

                                        <div class="main-col-alteraciones">


                                            <div class="col-alteraciones">
                                                <div class="paciente-param2">
                                                    TIMPANIZADO
                                                </div>
                                                <select class="paciente-value valueBox" name="timpanizado">
                                                    <option value="SI">SI</option>
                                                    <option value="NO">NO</option>
                                                </select>

                                            </div>

                                            <div class="col-alteraciones">
                                                <div class="paciente-param2">
                                                    ATONIA
                                                </div>
                                                <select class="paciente-value valueBox" name="atonia">
                                                    <option value="SI">SI</option>
                                                    <option value="NO">NO</option>
                                                </select>

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
                                            <td><label class="custom-radio">
                                                    <input type="radio" name="ocular" id="" value="1">
                                                    <span class="radio-button">
                                                        <i class="fas fa-check"></i>
                                                    </span>
                                                </label></td>
                                            <td><label class="custom-radio">
                                                    <input type="radio" name="ocular" id="" value="2">
                                                    <span class="radio-button">
                                                        <i class="fas fa-check"></i>
                                                    </span>
                                                </label></td>
                                            <td><label class="custom-radio">
                                                    <input type="radio" name="ocular" id="" value="3">
                                                    <span class="radio-button">
                                                        <i class="fas fa-check"></i>
                                                    </span>
                                                </label></td>
                                            <td><label class="custom-radio">
                                                    <input type="radio" name="ocular" id="" value="4">
                                                    <span class="radio-button">
                                                        <i class="fas fa-check"></i>
                                                    </span>
                                                </label></td>
                                            <td><label class="custom-radio">
                                                    <input type="radio" name="ocular" id="" value="5">
                                                    <span class="radio-button">
                                                        <i class="fas fa-check"></i>
                                                    </span>
                                                </label></td>
                                        </tr>
                                        <tr>
                                            <td>BUCAL</td>
                                            <td><label class="custom-radio">
                                                    <input type="radio" name="bucal" id="" value="1">
                                                    <span class="radio-button">
                                                        <i class="fas fa-check"></i>
                                                    </span>
                                                </label></td>
                                            <td><label class="custom-radio">
                                                    <input type="radio" name="bucal" id="" value="2">
                                                    <span class="radio-button">
                                                        <i class="fas fa-check"></i>
                                                    </span>
                                                </label></td>
                                            <td><label class="custom-radio">
                                                    <input type="radio" name="bucal" id="" value="3">
                                                    <span class="radio-button">
                                                        <i class="fas fa-check"></i>
                                                    </span>
                                                </label></td>
                                            <td><label class="custom-radio">
                                                    <input type="radio" name="bucal" id="" value="4">
                                                    <span class="radio-button">
                                                        <i class="fas fa-check"></i>
                                                    </span>
                                                </label></td>
                                            <td><label class="custom-radio">
                                                    <input type="radio" name="bucal" id="" value="5">
                                                    <span class="radio-button">
                                                        <i class="fas fa-check"></i>
                                                    </span>
                                                </label></td>
                                        </tr>
                                        <tr>
                                            <td>NASAL</td>
                                            <td><label class="custom-radio">
                                                    <input type="radio" name="nasal" id="" value="1">
                                                    <span class="radio-button">
                                                        <i class="fas fa-check"></i>
                                                    </span>
                                                </label></td>
                                            <td><label class="custom-radio">
                                                    <input type="radio" name="nasal" id="" value="2">
                                                    <span class="radio-button">
                                                        <i class="fas fa-check"></i>
                                                    </span>
                                                </label></td>
                                            <td><label class="custom-radio">
                                                    <input type="radio" name="nasal" id="" value="3">
                                                    <span class="radio-button">
                                                        <i class="fas fa-check"></i>
                                                    </span>
                                                </label></td>
                                            <td><label class="custom-radio">
                                                    <input type="radio" name="nasal" id="" value="4">
                                                    <span class="radio-button">
                                                        <i class="fas fa-check"></i>
                                                    </span>
                                                </label></td>
                                            <td><label class="custom-radio">
                                                    <input type="radio" name="nasal" id="" value="5">
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

                            <textarea class="historial-comentario" spellcheck="false" name="comentarioPrincipal"></textarea>



                        </div>





                    </div>
                </form>

            </div>



        </div>





        <script src="/Proyecto/statics/js/auxiliar/historial.js"></script>
        <script src="/Proyecto/statics/js/cliente/cliente.js"></script>

</body>

</html>