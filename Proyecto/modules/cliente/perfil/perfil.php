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

        <?php include("../../../includes/cliente_header.php") ?>

        <div class="main-user">

            <?php include("../../../includes/cliente_user.php") ?>

            <div class="contenedor">
                <div class="titulo-opcion">
                    <div class="motivo">PERFIL</div>
                    <div class="atras" onclick="location.href = '../cliente.php'">
                        ATRAS
                    </div>
                </div>
                <div class="botones">
                    <div class="boton verde" onclick="location.href = ''">
                        <div class="image">
                            <i class="far fa-save"></i>
                        </div>
                        <div class="texto">
                            GUARDAR CAMBIOS
                        </div>
                    </div>
                    <div class="line">

                    </div>


                    <?php

                    if (isset($_GET["value"])) { ?>

                        <div class="alerta-exito">
                            <i class="fas fa-check"></i>&nbsp; PERFIL ACTUALIZADO
                        </div>
                    <?php } ?>
                </div>


                <?php
                //Obtener informacion de cliente.

                $idCliente = $_SESSION['idCliente'];
                $query = "SELECT c.Nombre, c.Genero, c.Correo_Electronico, u.Username, u.Clave, u.Fecha_Registro FROM clientes AS c, usuarios AS u where c.Id_Cliente = '$idCliente' AND c.Id_Usuario = u.Id_Usuario";
                $resultado = mysqli_query($conn, $query);
                $row = mysqli_fetch_array($resultado);

                $nombreCliente = $row['Nombre'];
                $genero = $row['Genero'];
                $correo = $row['Correo_Electronico'];
                $username = $row['Username'];
                $clave = $row['Clave'];
                $fecha = $row['Fecha_Registro'];



                ?>

                <div class="agregar cliente">

                    <div class="forma">
                        <form action="editarCliente.php" method="post" id="formulario">
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
                                            <div class="params">GENERO
                                            </div>
                                            <div class="params">CORREO ELECTRONICO
                                            </div>
                                            <div class="params">FECHA DE REGISTRO
                                            </div>
                                        </div>
                                        <div class="col inputs">
                                            <div class="values">
                                                <input type="text" spellcheck="false" name="nombre" value="<?php echo $nombreCliente ?>">
                                                <div class="params-op">
                                                    OBLIGATORIO
                                                </div>
                                            </div>

                                            <div class="values">

                                                <select name="genero" id="" class="selection" name="genero">
                                                    <?php

                                                    switch ($genero) {
                                                        case 'MASCULINO':
                                                            echo "<option value='$genero'>$genero</option>";
                                                            echo "<option value='FEMENINO'>FEMENINO</option>";
                                                            break;
                                                        case 'FEMENINO':
                                                            echo "<option value='$genero'>$genero</option>";
                                                            echo "<option value='MASCULINO'>MASCULINO</option>";
                                                            break;
                                                        default:
                                                            # code...
                                                            break;
                                                    }

                                                    ?>

                                                </select>
                                                <div class="params-op">
                                                    OBLIGATORIO
                                                </div>

                                            </div>
                                            <div class="values">
                                                <input type="text" spellcheck="false" name="correo" value="<?php echo $correo ?>">
                                                <div class="params-op">
                                                    OBLIGATORIO
                                                </div>
                                            </div>
                                            <div class="values">
                                                <input type="text" spellcheck="false" readonly name="fechaIngreso" value="<?php echo $fecha ?>">

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

                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </form>

                    </div>



                </div>


            </div>

        </div>


        <div class="eliminar">
            <div class="mensaje color-blanco-transparente">

                <div class="eliminar-mensaje">
                    ¿Esta seguro que desea cancelar cita: <span id="nombreClienteEliminado"></span>
                    a nombre de: <span id="nombreMascotaCita"></span>?

                </div>

                <div class="eliminar-buttons">
                    <form action="cancelarCita.php" method="get" id="form2">
                        <input type="hidden" name="idCita" id="idCita">
                        <div class="default-btn color-rojo-hover" onclick="eliminarCliente()">
                            ELIMINAR
                        </div>
                    </form>
                    <div class="default-btn color-secundario-hover" onclick="cancelarEliminar()">
                        CANCELAR
                    </div>
                </div>
            </div>
        </div>



        <script src="/Proyecto/statics/js/cliente/cliente.js"></script>
        <script src="/Proyecto/statics/js/cliente/editarCliente.js"></script>

</body>

</html>