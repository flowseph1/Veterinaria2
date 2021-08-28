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


            <div class="contenedor">
                <div class="titulo-opcion">
                    <div class="motivo">AGREGAR CLIENTES</div>
                    <div class="atras" onclick="location.href = 'admin_cliente.php'">
                        ATRAS
                    </div>
                </div>
                <div class="botones">
                    <div class="boton verde" onclick="formulario()">
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
                <div class="agregar cliente">
                    <div class="forma">
                        <form action="agregarCliente.php" id="formularioAgregar" method="POST"">
                            <div class=" personal">
                            <div class="informacion-personal">
                                INFORMACION PERSONAL
                            </div>
                            <div class="line-horizontal">
                            </div>
                            <div class="info-personal">
                                <div class="col">
                                    <div class="params">NOMBRE COMPLETO
                                    </div>
                                    <div class="params">CORREO ELECTRONICO
                                    </div>
                                    <div class="params">GENERO
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
                                        <input type="email" spellcheck="false" name="correo">
                                        <div class="params-op">
                                            OBLIGATORIO
                                        </div>
                                        <div class="input-alerta">

                                        </div>
                                    </div>
                                    <div class="values">
                                        <select name="genero" id="" class="selection" name="genero">
                                            <option value="" disabled selected value>SELECCIONE</option>
                                            <option value="MASCULINO">MASCULINO</option>
                                            <option value="FEMENINO">FEMENINO</option>
                                        </select>
                                        <div class="params-op">
                                            OBLIGATORIO
                                        </div>
                                        <div class="input-alerta">

                                        </div>
                                    </div>
                                </div>
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
                                        <input type="text" spellcheck="false" name="usuario">
                                        <div class="params-op">
                                            OBLIGATORIO
                                        </div>
                                        <div class="input-alerta">

                                        </div>
                                    </div>
                                    <div class="values">
                                        <input type="password" spellcheck="false" name="password">
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
                    <div class="mascota">
                        <div class="titulo-mascota">
                            <div class="informacion-personal mascota-tittle">
                                MASCOTAS
                            </div>
                            <div class="lista-mascotas">
                            </div>
                            <div class="msj-exito">
                                <i class="fas fa-check"></i>
                                MASCOTA AGREGADA
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
                                            <input type="text" spellcheck="false" id="name" class="entrada">
                                            <div class="duplicado">

                                            </div>
                                            <div class="params-op">
                                                OBLIGATORIO
                                            </div>
                                        </div>
                                        <div class="values">
                                            <input type="date" spellcheck="false" id="date" class="entrada">
                                            <div class="params-op">
                                                OBLIGATORIO
                                            </div>
                                        </div>
                                        <div class="values">
                                            <select name="" id="sexo" class="selection entrada">
                                                <option value="" disabled selected value>SELECCIONE</option>
                                                <option value="">MACHO</option>
                                                <option value="">HEMBRA</option>
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
                                                    <option value="1">PERRO</option>
                                                    <option value="2">GATO</option>
                                                    <option value="3">HAMSTER</option>
                                                    <option value="4">CONEJO</option>
                                                    <option value="5">CABALLO</option>
                                                    <option value="6">OTRO MAMIFERO</option>
                                                </optgroup>
                                                <optgroup label="REPTILES">
                                                    <option value="7">IGUANA</option>
                                                    <option value="8">CAMALEON</option>
                                                    <option value="9">TORTUGA</option>
                                                    <option value="10">SERPIENTE</option>
                                                    <option value="11">LAGARTO</option>
                                                    <option value="12">OTRO REPTIL</option>
                                                </optgroup>
                                                <optgroup label="PECES">
                                                    <option value="13">GUPPYS</option>
                                                    <option value="14">TETRAS</option>
                                                    <option value="15">PLATYS</option>
                                                    <option value="16">BETA</option>
                                                    <option value="17">OTRO PEZ</option>
                                                </optgroup>
                                                <optgroup label="ANFIBIOS">
                                                    <option value="18">RANAS O SAPOS</option>
                                                    <option value="19">SALAMANDRAS O TRITONES</option>
                                                    <option value="20">CECILIAS O APODOS</option>
                                                    <option value="21">OTRO ANFIBIO</option>
                                                </optgroup>
                                                <optgroup label="ARACNIDOS">
                                                    <option value="22">ARAÑA</option>
                                                    <option value="23">ESCORPION</option>
                                                    <option value="24">OTRO ARACNIDO</option>
                                                </optgroup>
                                                <optgroup label="INSECTOS">
                                                    <option value="25">HORMIGA</option>
                                                    <option value="26">ABEJA</option>
                                                    <option value="27">AVISPA</option>
                                                    <option value="28">CHINCHE</option>
                                                    <option value="29">CUCARACHA</option>
                                                    <option value="30">MARIPOSA</option>
                                                    <option value="31">OTRO INSECTO</option>
                                                </optgroup>
                                                <optgroup label="OTROS">
                                                    <option value="32">CANGREJO O CAMARON</option>
                                                    <option value="33">ESTRELLA O ERIZOS</option>
                                                    <option value="34">CARACOL, ALMEJA O PULPOS</option>
                                                    <option value="35">LOMBRIZ O GUSANO MARINO</option>
                                                    <option value="36">ROTIFERO</option>
                                                    <option value="37">GUSANO PLANO</option>
                                                    <option value="38">MEDUSA O CORAL</option>
                                                    <option value="39">ESPONJA</option>
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
                                            <div class="boton-mascota verde">
                                                AGREGAR MASCOTA
                                            </div>
                                            <div class="bloqueo" id="bloqueo">
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
    <script src="/Proyecto/statics/js/administrador/admin_cliente/admin_agregarCliente.js"></script>

</body>

</html>