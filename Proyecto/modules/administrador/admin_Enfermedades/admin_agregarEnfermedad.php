<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Administrador | Enfermedad</title>
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
                    <div class="motivo">AGREGAR ENFERMEDAD</div>
                    <div class="atras" onclick="location.href = '../admin_Enfermedades/admin_Enfermedad.php'">
                        ATRAS
                    </div>
                </div>
                <div class="botones">
                    <div class="boton verde" onclick="guardar()">
                        <div class="image save">
                            <i class="fas fa-save"></i>
                        </div>
                        <div class="texto">
                            GUARDAR
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
                            <i class="fas fa-check"></i>&nbsp; ENFERMEDAD AGREGADA SATISFACTORIAMENTE
                        </div>
                    <?php } ?>

                </div>
                <form action="agregarEnfermeda.php" id="formulario1">
                    <div class="agregar cliente">
                        <div class="forma">
                            <div class="personal">
                                <div class="informacion-personal">
                                    INFORMACION PERSONAL
                                </div>
                                <div class="line-horizontal">
                                </div>
                                <div class="info-personal">
                                    <div class="col">

                                        <div class="params">ENFERMEDAD
                                        </div>
                                        <div class="params">TRATAMIENTOS
                                        </div>
                                    </div>
                                    <div class="col inputs">
                                        <div class="values">
                                            <input type="text" spellcheck="false" name="enfermedad">
                                            <div class="params-op">
                                                OBLIGATORIO
                                            </div>
                                        </div>
                                        <div class="values">


                                            <select name="tratamientos" id="tratamientos" class="select">
                                                <option value=""></option>
                                                <?php
                                                include('../../conexion/conexion.php');
                                                $query = "SELECT * FROM tratamientos";
                                                $result = mysqli_query($conn, $query);
                                                while ($row = mysqli_fetch_array($result)) {
                                                    $idTratamiento = $row['Id_Tratamiento'];
                                                    $descripcion = $row['Descripcion'];

                                                ?>

                                                    <option value="<?php echo $idTratamiento ?>"><?php echo $descripcion ?></option>

                                                <?php } ?>



                                            </select>
                                            <div class="params-op">
                                                OPCIONAL
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col">

                                        <div class="params">MEDICAMENTOS
                                        </div>

                                    </div>
                                    <div class="col">
                                        <div class="values">
                                            <select name="medicamentos" id="medicamentos" class="select">
                                                <option value=""></option>
                                                <?php
                                                include('../../conexion/conexion.php');
                                                $query = "SELECT * FROM medicamentos";
                                                $result = mysqli_query($conn, $query);
                                                while ($row = mysqli_fetch_array($result)) {
                                                    $idMedicamento = $row['Id_Medicamento'];
                                                    $descripcionMedicamento = $row['Descripcion_Medicamento'];

                                                ?>

                                                    <option value="<?php echo $idMedicamento ?>"><?php echo $descripcionMedicamento ?></option>

                                                <?php } ?>



                                            </select>
                                            <div class="params-op">
                                                OPCIONAL
                                            </div>
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

    <script src="/Proyecto/statics/js/administrador/admin_enfermedades/admin_enfermedades.js"></script>
</body>

</html>