<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
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

            <?php

            include("../../conexion/conexion.php");
            //Obteniendo informacion de Cliente.
            $idCliente = $_GET['idCliente'];
            $query = "SELECT * FROM clientes where Id_Cliente = '$idCliente'";
            $result = mysqli_query($conn, $query);
            //INFORMACION SOBRE CLIENTE
            while ($row = mysqli_fetch_array($result)) {

                $nombre = $row['Nombre'];
                $correo = $row['Correo_Electronico'];
                $genero = $row['Genero'];
                $idUsuario = $row['Id_Usuario'];
            }
            //INFORMACION SOBRE USUARIO DE CLIENTE
            $query = "SELECT * FROM usuarios where Id_Usuario = '$idUsuario'";
            $result = mysqli_query($conn, $query);
            while ($row = mysqli_fetch_array($result)) {

                $username = $row['Username'];
                $clave = $row['Clave'];
                $fecha = $row['Fecha_Registro'];
                $tipoUsuario = $row['Id_TipoUsuario'];
                $ultimaCita = $row['Ultima_Cita'];
            }

            ?>

            <div class="contenedor">
                <div class="titulo-opcion">
                    <div class="motivo">EDITAR CLIENTES</div>
                    <div class="atras" onclick="location.href = 'admin_cliente.php'">
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
                                INFORMACION PERSONAL
                            </div>
                            <div class="line-horizontal">
                            </div>
                            <div class="info-personal">
                                <div class="columna-uno">
                                    <div class="col">
                                        <div class="params">NOMBRE COMPLETO
                                        </div>
                                        <div class="params">CORREO ELECTRONICO
                                        </div>
                                        <div class="params">GENERO
                                        </div>
                                        <div class="params">FECHA DE REGISTRO
                                        </div>

                                    </div>
                                    <div class="col inputs">
                                        <div class="values">
                                            <input type="text" spellcheck="false" name="nombre" value="<?php echo $nombre ?>">
                                            <div class="params-op">
                                                OBLIGATORIO
                                            </div>
                                        </div>
                                        <div class="values">
                                            <input type="email" spellcheck="false" name="correo" value="<?php echo $correo ?>">
                                            <div class="params-op">
                                                OBLIGATORIO
                                            </div>
                                        </div>
                                        <div class="values">

                                            <select name="" id="" class="selection" name="genero">
                                                <?php
                                                if ($genero == "FEMENINO") {
                                                    $segundaOpcion = "MASCULINO";
                                                }
                                                if ($genero == "MASCULINO") {
                                                    $segundaOpcion = "FEMENINO";
                                                }

                                                echo "<option value='' disabled>SELECCIONE</option>";
                                                echo "<option value='$genero' selected>$genero</option>";
                                                echo "<option value='$segundaOpcion'>$segundaOpcion</option>";

                                                ?>

                                            </select>
                                            <div class="params-op">
                                                OBLIGATORIO
                                            </div>
                                        </div>
                                        <div class="values">
                                            <input type="text" spellcheck="false" readonly name="fechaIngreso" value="<?php echo $fecha; ?>">

                                        </div>

                                    </div>
                                </div>
                                <div class="columna-dos">
                                    <div class="info-usuario2">
                                        <div class="col">
                                            <div class="params">USUARIO
                                            </div>
                                            <div class="params">CLAVE
                                            </div>
                                            <div class="params">IMAGEN
                                            </div>
                                            <div class="params">ULTIMA CITA
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="values">
                                                <input type="text" spellcheck="false" name="usuario" value="<?php echo $username ?>">
                                                <div class="params-op">
                                                    OBLIGATORIO
                                                </div>
                                            </div>
                                            <div class="values">
                                                <input type="text" spellcheck="false" name="password" value="<?php echo $clave ?>">
                                                <div class=" params-op">
                                                    OBLIGATORIO
                                                </div>
                                            </div>
                                            <div class="values">
                                                <label for="imageFile" class="subirArchivo">
                                                    SUBIR
                                                    <input type="file" spellcheck="false" id="imageFile" name="archivo">
                                                </label>
                                                <div class="params-op">
                                                    OPCIONAL
                                                </div>
                                            </div>
                                            <div class="values">
                                                <?php if ($ultimaCita == null) {
                                                    $cita = 'SIN CITAS';
                                                } else {
                                                    $cita = $ultimaCita;
                                                } ?>
                                                <input type="text" spellcheck="false" readonly name="ultimaCita" value="<?php echo $cita; ?>">

                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>

                        <div class="mascota">
                            <div class="titulo-mascota">
                                <div class="informacion-personal mascota-tittle">
                                    MASCOTAS
                                </div>
                                <div class="lista-mascotas">
                                    <?php

                                    //INFORMACION SOBRE MASCOTA DE CLIENTE
                                    $query = "SELECT * FROM mascotas where Id_Cliente = '$idCliente'";
                                    $result = mysqli_query($conn, $query);
                                    while ($row = mysqli_fetch_array($result)) {
                                        $nombreMascota = $row['Nombre_Mascota'];
                                        $fechaMascota = $row['Fecha_Registro'];
                                        $sexoMascota = $row['Sexo'];
                                        $idEspecie = $row['Id_Especie'];
                                        $razaMascota = $row['Id_Raza'];
                                    ?>
                                        <div class="opcion-mascota">
                                            <?php switch ($idEspecie) {
                                                case 1:
                                                    echo "<i class='fas fa-dog'></i>";
                                                    break;
                                                case 2:
                                                    echo "<i class='fas fa-cat'></i>";
                                                    break;
                                                case 3:
                                                    echo "<i class='fas fa-fish'></i>";
                                                    break;
                                                default:
                                                    echo "<i class='fas fa-paw'></i>";
                                                    break;
                                            } ?>

                                            <div class="opcion-mascota-nombre"><?php echo $nombreMascota ?></div>
                                            <i class="fas fa-times" onclick="quitarMascota(event)"></i>
                                            <input type="hidden" name="nombreMascota" id="nombreMascota" value="<?php echo $nombreMascota ?>">
                                            <input type="hidden" name="fechaMascota" id="fechaMascota" value="<?php echo $fechaMascota ?>">
                                            <input type="hidden" name="sexoMascota" id="sexoMascota" value="<?php echo $sexoMascota ?>">
                                            <input type="hidden" name="especieMascota" id="especieMascota" value="<?php echo $idEspecie ?>">
                                            <input type="hidden" name="razaMascota" id="razaMascota" value="<?php echo $razaMascota ?>">
                                        </div>
                                    <?php } ?>
                                </div>
                                <div class="msj-exito">
                                    <i class="fas fa-check"></i>
                                    MASCOTA MODIFICADA
                                </div>
                                <div class="msj-delete">
                                    <i class="fas fa-times"></i>
                                    MASCOTA ELIMINADA
                                </div>
                            </div>

                            <div class="line-horizontal">
                            </div>
                            <div class="info-mascota">
                                <div class="info2">
                                    <div class="columna1">
                                        <div class="col">
                                            <div class="params">NOMBRE</div>
                                            <div class="params">FECHA DE NACIMIENTO</div>
                                            <div class="params">SEXO</div>
                                        </div>
                                        <div class="col inputs">
                                            <div class="values">
                                                <input type="text" spellcheck="false" id="nameMascota" class="entrada">
                                                <div class="duplicado">

                                                </div>
                                                <div class="params-op">
                                                    OBLIGATORIO
                                                </div>
                                            </div>
                                            <div class="values">
                                                <input type="date" spellcheck="false" id="dateMascota" class="entrada">
                                                <div class="params-op">
                                                    OBLIGATORIO
                                                </div>
                                            </div>
                                            <div class="values">
                                                <select name="" id="sexMascota" class="selection entrada">
                                                    <option value="" disabled selected value>SELECCIONE</option>
                                                    <option value="">MASCULINO</option>
                                                    <option value="">FEMENINO</option>
                                                </select>
                                                <div class="params-op">
                                                    OBLIGATORIO
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="info2">
                                    <div class="columna2">
                                        <div class="col">
                                            <div class="params">ESPECIE</div>
                                            <div class="params">RAZA</div>
                                        </div>
                                        <div class="col">
                                            <div class="values">
                                                <select name="" id="especie" class="selection entrada">
                                                    <option value="" disabled selected value>SELECCIONE</option>
                                                    <optgroup label="MAMIFEROS">
                                                        <option value="PERRO">PERRO</option>
                                                        <option value="GATO">GATO</option>
                                                        <option value="HAMSTER">HAMSTER</option>
                                                        <option value="CONEJO">CONEJO</option>
                                                        <option value="CABALLO">CABALLO</option>
                                                        <option value="OTRO MAMIFERO">OTRO MAMIFERO</option>
                                                    </optgroup>
                                                    <optgroup label="REPTILES">
                                                        <option value="IGUANA">IGUANA</option>
                                                        <option value="CAMALEON">CAMALEON</option>
                                                        <option value="TORTUGA">TORTUGA</option>
                                                        <option value="SERPIENTE">SERPIENTE</option>
                                                        <option value="LAGARTO">LAGARTO</option>
                                                        <option value="OTRO REPTIL">OTRO REPTIL</option>
                                                    </optgroup>
                                                    <optgroup label="PECES">
                                                        <option value="">GUPPYS</option>
                                                        <option value="">TETRAS</option>
                                                        <option value="">PLATYS</option>
                                                        <option value="">BETA</option>
                                                        <option value="">OTRO PEZ</option>
                                                    </optgroup>
                                                    <optgroup label="ANFIBIOS">
                                                        <option value="">RANAS O SAPOS</option>
                                                        <option value="">SALAMANDRAS O TRITONES</option>
                                                        <option value="">CECILIAS O APODOS</option>
                                                        <option value="">OTRO ANFIBIO</option>
                                                    </optgroup>
                                                    <optgroup label="ARACNIDOS">
                                                        <option value="">ARAÑA</option>
                                                        <option value="">ESCORPION</option>
                                                        <option value="">OTRO ARACNIDO</option>
                                                    </optgroup>
                                                    <optgroup label="INSECTOS">
                                                        <option value="">HORMIGA</option>
                                                        <option value="">ABEJA</option>
                                                        <option value="">AVISPA</option>
                                                        <option value="">CHINCHE</option>
                                                        <option value="">CUCARACHA</option>
                                                        <option value="">MARIPOSA</option>
                                                        <option value="">OTRO INSECTO</option>
                                                    </optgroup>
                                                    <optgroup label="OTROS">
                                                        <option value="">CANGREJO O CAMARON</option>
                                                        <option value="">ESTRELLA O ERIZOS</option>
                                                        <option value="">CARACOL, ALMEJA O PULPOS</option>
                                                        <option value="">LOMBRIZ O GUSANO MARINO</option>
                                                        <option value="">ROTIFERO</option>
                                                        <option value="">GUSANO PLANO</option>
                                                        <option value="">MEDUSA O CORAL</option>
                                                        <option value="">ESPONJA</option>
                                                    </optgroup>

                                                </select>
                                                <div class="params-op">
                                                    OBLIGATORIO
                                                </div>
                                            </div>
                                            <div class="values">
                                                <select name="" id="raza" class="selection entrada">
                                                    <option value="" disabled selected value>SELECCIONE</option>
                                                </select>
                                                <div class="params-op">
                                                    OBLIGATORIO
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="columna3">
                                        <div class="botones-mascota">
                                            <div class="button">
                                                <button class="boton-mascota verde">
                                                    MODIFICAR
                                                </button>
                                                <div class="bloqueo" id="bloqueo">

                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                </div>



                            </div>
                        </div>
                    </div>



                </div>

            </div>
        </div>
    </div>

    <script src="../../../statics/js/administrador/admin_cliente/admin_agregarCliente.js"></script>
    <script src="../../../statics/js/administrador/admin_cliente/admin_cliente.js"></script>
    <script src="../../../statics/js/administrador/admin_cliente/admin_editarCliente.js"></script>
</body>

</html>