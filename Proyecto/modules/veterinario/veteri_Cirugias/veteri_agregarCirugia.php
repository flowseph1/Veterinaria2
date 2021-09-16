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
                    <div class="motivo">AGREGAR CIRUGIA</div>
                    <div class="atras" onclick="location.href = '../veteri_Cirugias/veteri_Cirugia.php'">
                        ATRAS
                    </div>
                </div>
                <div class="botones">
                    <div class="boton verde">
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

                </div>
                <div class="agregar cliente">
                    <div class="forma">
                        <div class="personal">
                            <div class="informacion-personal">
                                Agregar Cirugía
                            </div>
                            <div class="line-horizontal">
                            </div>
                            <div class="info-personal">
                                <div class="col">
                                    <div class="params">MASCOTA
                                    </div>
                                    <div class="params">SERVICIO
                                    </div>
                                    <div class="params">MOTIVO
                                    <div class="params-op">
                                                OBLIGATORIO
                                            </div>
                                    </div>
                                </div>
                                <div class="col inputs">
                                    <div class="values">
                                            <select name="mascota" id="" class="selection" >
                                                <option value="" disabled selected value>SELECCIONE</option>
                                                <?php
                                                include("../../conexion/conexion.php");
                                                $idVeterinario = $_SESSION['idVeterinario'];
                                                $query = "SELECT DISTINCT m.Id_Mascota,m.Nombre_Mascota FROM citas AS c, mascotas AS m, clientes AS a WHERE c.Id_EstadoCita = 1 AND c.Id_Mascota = m.Id_Mascota And m.Id_Cliente = a.Id_Cliente AND c.Id_Cliente=a.Id_Cliente AND c.Id_Veterinario =$idVeterinario";
                                                $result = mysqli_query($conn, $query);
                                                while ($row = mysqli_fetch_array($result)) {
                                                    $nombreMascota = $row['Nombre_Mascota'];
                                                    $idMascota = $row['Id_Mascota'];
                                                    echo "<option value='$idMascota'>$nombreMascota</option>";
                                                }
                                                ?>
                                            </select>
                                        <div class="params-op">
                                            OBLIGATORIO
                                        </div>
                                    </div>
                                    <div class="values">
                                        <select name="servicio" id="" class="selection" >
                                            <option value="" disabled selected value>SELECCIONE</option>
                                                    <?php
                                                    include("../../conexion/conexion.php");
                                                    $idVeterinario = $_SESSION['idVeterinario'];
                                                    $query = "SELECT id_servicio, Nombre_Servicio FROM servicios WHERE Id_Tipo_Servicio=2;";
                                                    $result = mysqli_query($conn, $query);
                                                    while ($row = mysqli_fetch_array($result)) {
                                                        $nombreServicio = $row['Nombre_Servicio'];
                                                        $idServicio = $row['id_servicio'];
                                                        echo "<option value='$idServicio'>$nombreServicio</option>";
                                                    }
                                                  ?>
                                        </select>
                                        <div class="params-op">
                                            OBLIGATORIO
                                        </div>
                                    </div>
                                    
                                    <div class="values">
                                        <textarea name="motivo" id="motivo" cols="30" rows="5" spellcheck="false"></textarea>
                                        &nbsp&nbsp
                                    </div>
                                    &nbsp&nbsp
                                </div>
                                <div class="col">
                                     
                                    
                                    <div class="params">FECHA DE CIRUGIA
                                    </div>
                                    <div class="params">HORA DE CIRUGIA
                                    </div>
                                </div>
                                
                                <div class="col">
                                    <div class="values">
                                    <input type="date" name="fecha" id="fecha">
                                            <div class="params-op">
                                                OBLIGATORIO
                                            </div>
                                    </div>
                                    <div class="values">
                                    <select name="horario" id="" class="selection" >
                                                <option value="" disabled selected value>SELECCIONE</option>
                                                <option value="8:00">8:00 AM</option>
                                                <option value="9:00">9:00 AM</option>
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
                                    
                                </div>
                            </div>
                        </div>
                        


                    </div>

                </div>
            </div>
        </div>
        <script src="/Proyecto/statics/js/veterinario/veterinario.js"></script>
        <script src="/Proyecto/statics/js/main.js"></script>
        <script src="/Proyecto/statics/js/tabla.js"></script>
</body>

</html>