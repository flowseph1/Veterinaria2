<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Administrador | Proveedor</title>
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

        <?php include("../../../includes/admin_header.php") ?>

        <div class="main-user">

            <?php include("../../../includes/admin_user.php") ?>

            <div class="contenedor">
                <div class="titulo-opcion">
                    <div class="motivo">AGREGAR PROVEEDO</div>
                    <div class="atras" onclick="location.href = '../admin_Proveedores/admin_Proveedor.php'">
                        ATRAS
                    </div>
                </div>
                <div class="botones">
                    <div class="boton verde" id="guardar-form">
                        <div class="image save">
                            <i class="fas fa-save"></i>
                        </div>
                        <div class="texto">
                            <label for="submit-form">GUARDAR</label>
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
                <div class="agregar proveedor" style="height: 310px; width: 500px">
                    <div class="forma">
                        <div class="personal">

                            <!--INICIO DEL FORMULARIO-->
                            <form action="agregarProveedor.php" id="formularioAgregar" method="POST">
                                <div class="informacion-personal">
                                    INFORMACION DE PROVEEDOR
                                </div>
                                <div class="line-horizontal">
                                </div>
                                <div class="info-personal">
                                    <div class="col">
                                        <div class="params">RTN DE LA EMPRESA
                                        </div>
                                        <div class="params">NOMBRE LEGAL
                                        </div>
                                        <div class="params">DIRECCION FISCAL
                                        </div>
                                        <div class="params">TELEFONO
                                        </div>
                                    </div>
                                    <div class="col inputs" style="margin-left: 100px;">
                                        <div class="values">
                                            <input type="text" style="width: 250px;" spellcheck="false" required name="rtn" id="rtn" title="Ingresar solo numeros - Ejemplo: 08019501125684" pattern="[0-9]+" maxlength="14">
                                        </div>
                                        <div class="values">
                                            <input type="text" style="width: 250px;" spellcheck="false" required name="nombre" id="nombre">
                                        </div>
                                        <div class="values">
                                            <input type="text" style="width: 250px;" spellcheck="false" required name="direccion" id="direccion">
                                        </div>
                                        <div class="values">
                                            <input type="text" style="width: 250px;" spellcheck="false" required name="telefono" id="telefono" title="Ingresar solo numeros - Ejemplo: 22556633" pattern="[0-9]+" maxlength="8">
                                        </div>
                                    </div>
                                </div>
                                <input type="submit" id="submit-form" style="display: none;">
                            </form> <!--FIN DEL FOMULARIO--> 
                        </div>
                        </div>
                        </div>


                    </div>

                </div>
            </div>
        </div>

        <!--Inclusion de la libreria de JQuery-->
        <script src="../../../statics/js/administrador/admin_Proveedor/admin_agregarProveedor.js"></script>
    </body>

</html>