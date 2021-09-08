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
                    <div class="motivo">CONSULTAS</div>
                    <div class="atras" onclick="location.href = '../cliente.php'">
                        ATRAS
                    </div>
                </div>
                <div class="botones">
                    <div class="bloqueo-boton-general">
                        <div class="boton rojo" id="eliminar" onclick="accionEliminar()">
                            <div class="image">
                                <i class="far fa-eye"></i>
                            </div>
                            <div class="texto">
                                VER CONSULTA
                            </div>
                        </div>
                        <div class="bloqueo-boton">

                        </div>
                    </div>
                    <div class="line">

                    </div>



                </div>
                <div class="tabla-contenedor">
                    <div class="descripcion">
                        <div class="herramientas">
                            <div class="buscador">
                                <div class="icono-buscar">
                                    <i class="fas fa-search"></i>
                                </div>
                                <div class="cajaTexto-buscar">
                                    <input type="text" spellcheck="false" placeholder="BUSCAR ID CONSULTA O MASCOTA" id="buscar">
                                </div>
                            </div>
                            <div class="limpiar" onclick="limpiar()">
                                LIMPIAR
                            </div>
                        </div>
                        <div class="total-clientes">
                            TOTAL &nbsp;<span class="clientesTotales">2</span>
                        </div>
                    </div>

                    <div class="tabla-clientes">
                        <table id="tb-cliente" class="tabla-general">
                            <thead>
                                <th>ID CONSULTA</th>
                                <th>ID CITA</th>
                                <th>MASCOTA</th>
                                <th>DIAGNOSTICO</th>
                                <th>RECETA</th>
                                <th>FECHA CONSULTA</th>
                            </thead>
                            <tbody>



                            </tbody>
                        </table>
                    </div>
                </div>


            </div>

        </div>

        <input type="hidden" name="idCliente" id="IdElemento">

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
        <script src="/Proyecto/statics/js/cliente/cita.js"></script>
        <script src="/Proyecto/statics/js/tabla.js"></script>

</body>

</html>