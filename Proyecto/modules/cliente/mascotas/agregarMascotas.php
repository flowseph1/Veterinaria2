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

        <?php include("../../../includes/cliente_header.php") ?>

        <div class="main-user">

            <?php include("../../../includes/cliente_user.php") ?>


            <div class="contenedor">
                <div class="titulo-opcion">
                    <div class="motivo">AGREGAR MASCOTAS</div>
                    <div class="atras" onclick="location.href = 'mascotas.php'">
                        ATRAS
                    </div>
                </div>
                <div class="botones">
                    <div class="boton verde" onclick="">
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
                            <i class="fas fa-check"></i> &nbsp; GUARDADO CORRECTAMENTE
                        </div>
                    <?php } ?>

                </div>
                <div class="contenedor-default">
                    <div class="forma">
                        <form action="agregarCliente.php" id="formularioAgregar" method="POST">
                            <div class=" personal">
                                <div class="informacion-personal">
                                    INFORMACION MASCOTA
                                </div>
                                <div class="line-horizontal">
                                </div>
                                <div class="info-personal">
                                    <div class="col">
                                        <div class="params">NOMBRE
                                        </div>
                                        <div class="params">FECHA NACIMIENTO
                                        </div>
                                        <div class="params">SEXO
                                        </div>
                                    </div>
                                    <div class="col inputs">
                                        <div class="values">
                                            <input type="text" spellcheck="false" name="nombre">
                                            <div class="params-op">
                                                OBLIGATORIO
                                            </div>
                                            <div class="input-alerta">

                                            </div>
                                        </div>
                                        <div class="values">
                                            <input type="date" spellcheck="false" name="fechaNacimiento">
                                            <div class="params-op">
                                                OBLIGATORIO
                                            </div>
                                            <div class="input-alerta">

                                            </div>
                                        </div>
                                        <div class="values">
                                            <select name="sexo" id="" class="selection" name="sexo">
                                                <option value="" disabled selected value>SELECCIONE</option>
                                                <option value="Hembra">HEMBRA</option>
                                                <option value="Macho">MACHO</option>
                                            </select>
                                            <div class="params-op">
                                                OBLIGATORIO
                                            </div>
                                            <div class="input-alerta">

                                            </div>
                                        </div>

                                    </div>
                                    <div class="col">
                                        <div class="params">ESPECIE
                                        </div>
                                        <div class="params">RAZA
                                        </div>
                                        <div class="params">IMAGEN
                                        </div>
                                    </div>
                                    <div class="col inputs">
                                        <div class="values">
                                            <input type="text" spellcheck="false" name="especie">
                                            <div class="params-op">
                                                OBLIGATORIO
                                            </div>
                                            <div class="input-alerta">

                                            </div>
                                        </div>
                                        <div class="values">
                                            <input type="text" spellcheck="false" name="raza">
                                            <div class="params-op">
                                                OBLIGATORIO
                                            </div>
                                            <div class="input-alerta">

                                            </div>
                                        </div>
                                        <div class="values">
                                            <label for="imageFile" class="subirArchivo">
                                                SUBIR
                                                <input type="file" spellcheck="false" id="imageFile" name="archivo">
                                            </label>
                                            <div class="valorFile">
                                            </div>
                                            <div class="params-op">
                                                OPCIONAL
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
        <script src="/Proyecto/statics/js/main.js"></script>
        <script src="/Proyecto/statics/js/cliente/cliente.js"></script>
</body>

</html>