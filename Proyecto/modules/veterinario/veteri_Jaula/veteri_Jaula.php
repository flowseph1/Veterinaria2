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
                    <div class="motivo">Pacientes</div>
                    <div class="atras" onclick="location.href = '../veterinario.php'">
                        ATRAS
                    </div>
                </div>
                
                <div class="contenedor-mascotas">

                    <?php


                    $idVeterinario = $_SESSION['idVeterinario'];
                    $cont = 0;
                    $query = "SELECT m.Nombre_Mascota, m.Sexo, m.Edad_Mascota, m.Fecha_Mascota, m.Id_Mascota, m.Id_Especie , te.Tipo_Especie, m.Fecha_Registro, r.Nombre_Raza FROM mascotas AS m, tipo_especies AS te, razas AS r, citas AS c 
                    WHERE m.Id_Cliente = m.Id_Cliente AND te.Id_Especie = m.Id_Especie AND m.Id_Raza = R.Id_Raza AND c.Id_Mascota=m.Id_Mascota AND c.Id_Veterinario=$idVeterinario;";
                    $resultado = mysqli_query($conn, $query);
                    while ($row = mysqli_fetch_array($resultado)) { ?>

                        <div class="perfil-mascotas color-blanco-transparente">
                            <div class="titulo-mascotas">
                                <?php echo $row['Nombre_Mascota'] ?>
                            </div>

                            <div class="icono-mascotas">
                                <?php

                                switch ($row['Id_Especie']) {
                                    case '1':
                                        echo "<i class='fas fa-dog fa-3x'></i>";
                                        break;
                                    case '2':
                                        echo "<i class='fas fa-cat fa-3x'></i>";
                                        break;
                                    case '33':
                                        echo "<i class='fas fa-fish fa-3x'></i>";
                                        break;
                                    default:
                                        echo "<i class='fas fa-paw fa-3x'></i>";
                                        break;
                                }
                                ?>
                            </div>

                            <div class="info-mascotas">
                                <div class="col-mascota identificador">
                                    <div>
                                        SEXO:
                                    </div>
                                    <div>
                                        EDAD:
                                    </div>
                                    <div>
                                        FECHA NACIMIENTO:
                                    </div>
                                    <div>
                                        ESPECIE:
                                    </div>
                                    <div>
                                        RAZA:
                                    </div>
                                    <div>
                                        FECHA
                                        INGRESO:
                                    </div>
                                    <div>
                                        ULTIMA
                                        CITA:
                                    </div>
                                </div>

                                <div class="col-mascota result">
                                    <div>
                                        <?php echo $row['Sexo'] ?>
                                    </div>
                                    <div>
                                        <?php
                                        switch ($row['Edad_Mascota']) {
                                            case 0:
                                                echo "-1 año";
                                                break;
                                            case 1:
                                                echo "1 año";
                                                break;
                                            default:
                                                echo $row['Edad_Mascota'] . " años";
                                                break;
                                        }

                                        ?>
                                    </div>
                                    <div>
                                        <?php
                                        $date = date("d-m-Y", strtotime($row['Fecha_Mascota']));
                                        echo $date;
                                        ?>
                                    </div>
                                    <div>
                                        <?php echo $row['Tipo_Especie'] ?>
                                    </div>
                                    <div>
                                        <?php echo $row['Nombre_Raza'] ?>
                                    </div>
                                    <div>
                                        <?php
                                        $date = date("d-m-Y", strtotime($row['Fecha_Registro']));
                                        echo $date ?>
                                    </div>
                                    <div>

                                        <?php

                                        $idMascota = $row['Id_Mascota'];
                                        $query2 = "SELECT Fecha_Cita
                                            FROM citas
                                            WHERE Id_Mascota = $idMascota
                                            ORDER BY Fecha_Cita DESC
                                            LIMIT 1";
                                        $resultado2 = mysqli_query($conn, $query2);
                                        $row2 = mysqli_fetch_array($resultado2);
                                        if (isset($row2['Fecha_Cita'])) {
                                            $date = date("d-m-Y", strtotime($row2['Fecha_Cita']));
                                            echo $date;
                                        } else {
                                            echo 'Sin Cita';
                                        }

                                        ?>
                                        <input type="hidden" id="idMascotaEliminar" value="<?php echo $idMascota ?>">
                                    </div>
                                </div>

                            </div>
                            <div class="botones-mascotas">

                                <div class="boton-historial-mascotas color-secundario" onclick="historial(<?php echo $idMascota ?>)">
                                    <i class="fas fa-history"></i> &nbsp; HISTORIAL
                                </div>

                            </div>

                        </div>

                    <?php } ?>
                </div>


            </div>

        </div>


        <script src="/Proyecto/statics/js/veterinario/veterinario.js"></script>
        <script src="/Proyecto/statics/js/veterinario/veteri_historial.js"></script>

</body>

</html>