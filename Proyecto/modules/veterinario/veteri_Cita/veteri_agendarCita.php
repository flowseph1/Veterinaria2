<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Veterinario | Cita</title>
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
                    <?php if($_GET["editar"]=1){ ?>
                        <div class="motivo">EDITAR CITA</div>
                        <?php }?>
                    <div class="motivo">AGENDAR CITA</div>
                    <div class="atras" onclick="location.href = '../../veterinario/veteri_Cita/veteri_Cita.php'">
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

                    <?php
                    if (isset($_GET["value"])) { ?>
                        <div class="agregar-exitoso">
                            <i class="fas fa-check"></i> &nbsp; AGENDADO CORRECTAMENTE
                        </div>
                    <?php } ?>

                </div>
                <div class="agregar cliente">
                    <form action="veteri_agendar.php">
                      <div class="forma">
                        <div class="personal">
                            <div class="informacion-personal">
                                INFORMACION PERSONAL
                            </div>
                            <div class="line-horizontal">
                            </div>
                            <div class="info-personal">
                                <div class="col">
                                    <div class="params">ELEGIR MASCOTA</div>
                                    <div class="params">FECHA</div>
                                </div>
                                <div class="col inputs">
                                <div class="values">
                                <select name="mascota" id="" class="selection" name="genero" required>
                                                <option value="" disabled selected value>SELECCIONE</option>
                                                <?php
                                                include("../../conexion/conexion.php");
                                                $idVeterinario = $_SESSION['idVeterinario'];
                                                $query = "SELECT DISTINCT m.Nombre_Mascota, m.Id_Mascota, a.Nombre, a.Id_Cliente  FROM mascotas AS m, citas AS c, clientes as a WHERE m.Id_Mascota=c.Id_Mascota and m.Id_Cliente=c.Id_Cliente and m.Id_Cliente=a.Id_Cliente AND c.Id_Veterinario=$idVeterinario";
                                                $result = mysqli_query($conn, $query);
                                                while ($row = mysqli_fetch_array($result)) {
                                                    $nombreMascota = $row['Nombre_Mascota'];
                                                    $idMascota = $row['Id_Mascota'];
                                                    $nombre = $row['Nombre'];
                                                    $cliente = $row['Id_Cliente'];
                                                    echo "<option value='$idMascota'>$nombreMascota - $nombre </option>";}
                                                    $_POST[$cliente];
                                                ?>
                                            </select>
                                            <div class="params-op">
                                                OBLIGATORIO
                                            </div>
                                        </div>
                                        <div class="values">
                                            <input type="date" name= "fecha" id="fecha" required>
                                            <div class="params-op">
                                                OBLIGATORIO
                                            </div>
                                        </div>
                                    
                                </div>
                                <div class="col">
                                    <div class="params">HORA</div>
                                    <div class="params">MOTIVO<div class="params-op">
                                                OBLIGATORIO
                                            </div></div>
                                </div>
                                <div class="col">
                                    <div class="values">
                                    <select name="horario" id="" class="selection" name="genero">
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
                                    <div class="values textareas">
                                            <textarea name="motivo" id="motivo" cols="30" rows="5" spellcheck="false"></textarea>
                                            
                                        </div>
                                        &nbsp&nbsp
                                        &nbsp&nbsp
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