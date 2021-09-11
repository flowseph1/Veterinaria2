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
    <link rel="stylesheet" href="/Proyecto/statics/css/secretaria/secretaria.css">
</head>

<body>
    <div class="fondo">

        <?php include("../../../includes/secretaria_header.php") ?>

        <div class="main-user">

            <?php include("../../../includes/secretaria_user.php") ?>

            <div class="contenedor">
                <div class="titulo-opcion">
                    <div class="motivo">FACTURA</div>
                    <div class="atras" onclick="location.href = '../factura/factura.php'">
                        ATRAS
                    </div>
                </div>
                <div class="botones">
                    <div class="bloqueo-boton-general">
                        <div class="boton verde" id="preclinica">
                            <div class="image">
                                <i class="fas fa-save"></i>
                            </div>
                            <div class="texto">
                                GUARDAR
                            </div>
                        </div>

                    </div>

                    <div class="line">

                    </div>

                    <div class="boton" id="imprimir" onclick="imprimir()">
                        <div class="image">
                            <i class="fas fa-print"></i>
                        </div>
                        <div class="texto">
                            IMPRIMIR
                        </div>
                    </div>

                    <?php

                    if (isset($_GET["value"])) { ?>

                        <div class="alerta-exito">
                            <i class="fas fa-check"></i></i>&nbsp; FACTURA GUARDADA EXITOSAMENTE
                        </div>
                    <?php } ?>
                </div>

                <div class="contenedor-factura-general">
                    <div class="contenedor-factura">
                        <div class="contenedor-default2">
                            <div class="factura-infogeneral">
                                <div class="factura-infogeneral-titulo">
                                    <div>VETERINARIA SAFARI</div>
                                    <div><span class="factura">FACTURA</span></div>
                                </div>
                                <div class="factura-infogeneral-contenido">
                                    <div class="factura-infogeneral-contenido-infoveterinaria">
                                        <div class="factura-infogeneral-contenido-elemento">
                                            <div>
                                                DIRECCION
                                            </div>
                                            <div class="valueBox">
                                                Res. Altos del Trapiche
                                            </div>
                                        </div>
                                        <div class="factura-infogeneral-contenido-elemento">
                                            <div>
                                                TELEFONO
                                            </div>
                                            <div class="valueBox">
                                                2271-2138
                                            </div>
                                        </div>
                                    </div>
                                    <div class="factura-infogeneral-contenido-infofactura">
                                        <div class="factura-infogeneral-factura-elemento">
                                            <div class="factura-infogeneral-factura-elemento">
                                                <div>
                                                    FACTURA #
                                                </div>
                                                <div class="valueBox">
                                                    2
                                                </div>
                                            </div>
                                            <div>
                                                CONSULTA #
                                            </div>
                                            <div class="valueBox">
                                                32
                                            </div>
                                        </div>

                                    </div>
                                    <div class="factura-infogeneral-contenido-infofactura">

                                        <div class="factura-infogeneral-factura-elemento">
                                            <div>
                                                FECHA
                                            </div>
                                            <div class="valueBox">
                                                9/9/2021
                                            </div>
                                        </div>
                                        <div class="factura-infogeneral-factura-elemento">
                                            <div>
                                                FACTURADO POR
                                            </div>
                                            <div class="valueBox">
                                                Maria Mendoza
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="factura-infocliente">
                                <div class="factura-infocliente-titulo">
                                    FACTURAR A
                                </div>
                                <div class="factura-infocliente-contenido">
                                    <div class="factura-infocliente-elemento">
                                        <div>
                                            ID CLIENTE
                                        </div>
                                        <div class="valueBox">
                                            64
                                        </div>
                                    </div>
                                    <div class="factura-infocliente-elemento">
                                        <div>
                                            CLIENTE
                                        </div>
                                        <div class="valueBox">
                                            Alejandro Suarez
                                        </div>
                                    </div>
                                    <div class="factura-infocliente-elemento">
                                        <div>
                                            CORREO ELECTRONICO
                                        </div>
                                        <div class="valueBox">
                                            alejandroSuarez@gmail.com
                                        </div>
                                    </div>
                                    <div class="factura-infocliente-elemento">
                                        <div>
                                            PACIENTE
                                        </div>
                                        <div class="valueBox">
                                            TOMMY
                                        </div>
                                    </div>

                                </div>

                            </div>
                            <div class="factura-descripcion">
                                <div class="factura-descripcion-contenido">
                                    <table class="tabla tabla2">
                                        <thead>
                                            <th>DESCRIPCION</th>
                                            <th>CANT.</th>
                                            <th>PRECIO/U</th>
                                            <th>MONTO</th>
                                            <th>IMPORTE</th>
                                        </thead>
                                        <tbody>
                                            <tr class="filas2">
                                                <td>
                                                    <select name="servicios" id="servicios" class="select color-blanco-transparente small-font">
                                                        <option value=""></option>
                                                        <optgroup label="SERVICIOS">
                                                            <option value="1">Medicina General</option>
                                                            <option value="2">Internacion</option>
                                                            <option value="3">Cirugia</option>
                                                            <option value="4">Analisis</option>
                                                            <option value="5">Odontologia</option>
                                                            <option value="6">Rayos X</option>
                                                            <option value="7">Ecografia</option>
                                                        </optgroup>
                                                        <optgroup label="RECETA MEDICA">

                                                        </optgroup>

                                                    </select>
                                                </td>
                                                <td class="cantidad">
                                                    <input type="text" name="cantidad" id="" class="select text-cantidad color-blanco-transparente">
                                                </td>
                                                <td>
                                                    <div class="valueBox"></div>
                                                </td>
                                                <td>
                                                    <div class="valueBox monto"></div>
                                                </td>
                                                <td>
                                                    <div class="valueBox"></div>
                                                </td>
                                                <td></td>
                                            </tr>
                                            <tr class="filas2">
                                                <td>
                                                    <select name="servicios" id="servicios" class="select color-blanco-transparente small-font">
                                                        <option value=""></option>
                                                        <optgroup label="SERVICIOS">
                                                            <option value="1">Medicina General</option>
                                                            <option value="2">Internacion</option>
                                                            <option value="3">Cirugia</option>
                                                            <option value="4">Analisis</option>
                                                            <option value="5">Odontologia</option>
                                                            <option value="6">Rayos X</option>
                                                            <option value="7">Ecografia</option>
                                                        </optgroup>
                                                        <optgroup label="RECETA MEDICA">

                                                        </optgroup>

                                                    </select>

                                                </td>
                                                <td>
                                                    <input type="text" name="cantidad" id="" class="select text-cantidad color-blanco-transparente">
                                                </td>
                                                <td>
                                                    <div class="valueBox"></div>
                                                </td>
                                                <td>
                                                    <div class="valueBox monto"></div>
                                                </td>
                                                <td>
                                                    <div class="valueBox"></div>
                                                </td>
                                                <td></td>
                                            </tr>
                                            <tr class="filas2">
                                                <td>
                                                    <select name="servicios" id="servicios" class="select color-blanco-transparente small-font">
                                                        <option value=""></option>
                                                        <optgroup label="SERVICIOS">
                                                            <option value="1">Medicina General</option>
                                                            <option value="2">Internacion</option>
                                                            <option value="3">Cirugia</option>
                                                            <option value="4">Analisis</option>
                                                            <option value="5">Odontologia</option>
                                                            <option value="6">Rayos X</option>
                                                            <option value="7">Ecografia</option>
                                                        </optgroup>
                                                        <optgroup label="RECETA MEDICA">

                                                        </optgroup>

                                                    </select>
                                                </td>
                                                <td>
                                                    <input type="text" name="cantidad" id="" class="select text-cantidad color-blanco-transparente">
                                                </td>
                                                <td>
                                                    <div class="valueBox"></div>
                                                </td>
                                                <td>
                                                    <div class="valueBox monto"></div>
                                                </td>
                                                <td>
                                                    <div class="valueBox"></div>
                                                </td>
                                                <td></td>
                                            </tr>
                                            <tr class="filas2">
                                                <td>
                                                    <select name="servicios" id="servicios" class="select color-blanco-transparente small-font">
                                                        <option value=""></option>
                                                        <optgroup label="SERVICIOS">
                                                            <option value="1">Medicina General</option>
                                                            <option value="2">Internacion</option>
                                                            <option value="3">Cirugia</option>
                                                            <option value="4">Analisis</option>
                                                            <option value="5">Odontologia</option>
                                                            <option value="6">Rayos X</option>
                                                            <option value="7">Ecografia</option>
                                                        </optgroup>
                                                        <optgroup label="RECETA MEDICA">

                                                        </optgroup>

                                                    </select>
                                                </td>
                                                <td>
                                                    <input type="text" name="cantidad" id="" class="select text-cantidad color-blanco-transparente">
                                                </td>
                                                <td>
                                                    <div class="valueBox"></div>
                                                </td>
                                                <td>
                                                    <div class="valueBox monto"></div>
                                                </td>
                                                <td>
                                                    <div class="valueBox"></div>
                                                </td>
                                                <td></td>
                                            </tr>
                                            <tr class="filas2">
                                                <td>
                                                    <select name="servicios" id="servicios" class="select color-blanco-transparente small-font">
                                                        <option value=""></option>
                                                        <optgroup label="SERVICIOS">
                                                            <option value="1">Medicina General</option>
                                                            <option value="2">Internacion</option>
                                                            <option value="3">Cirugia</option>
                                                            <option value="4">Analisis</option>
                                                            <option value="5">Odontologia</option>
                                                            <option value="6">Rayos X</option>
                                                            <option value="7">Ecografia</option>
                                                        </optgroup>
                                                        <optgroup label="RECETA MEDICA">

                                                        </optgroup>

                                                    </select>
                                                </td>
                                                <td>
                                                    <input type="text" name="cantidad" id="" class="select text-cantidad color-blanco-transparente">
                                                </td>
                                                <td>
                                                    <div class="valueBox"></div>
                                                </td>
                                                <td>
                                                    <div class="valueBox monto"></div>
                                                </td>
                                                <td>
                                                    <div class="valueBox"></div>
                                                </td>
                                                <td></td>
                                            </tr>
                                            <tr class="filas2">
                                                <td>
                                                    <select name="servicios" id="servicios" class="select color-blanco-transparente small-font">
                                                        <option value=""></option>
                                                        <optgroup label="SERVICIOS">
                                                            <option value="1">Medicina General</option>
                                                            <option value="2">Internacion</option>
                                                            <option value="3">Cirugia</option>
                                                            <option value="4">Analisis</option>
                                                            <option value="5">Odontologia</option>
                                                            <option value="6">Rayos X</option>
                                                            <option value="7">Ecografia</option>
                                                        </optgroup>
                                                        <optgroup label="RECETA MEDICA">

                                                        </optgroup>

                                                    </select>
                                                </td>
                                                <td>
                                                    <input type="text" name="cantidad" id="" class="select text-cantidad color-blanco-transparente">
                                                </td>
                                                <td>
                                                    <div class="valueBox"></div>
                                                </td>
                                                <td>
                                                    <div class="valueBox monto"></div>
                                                </td>
                                                <td>
                                                    <div class="valueBox"></div>
                                                </td>
                                                <td></td>
                                            </tr>
                                            <tr class="filas2">
                                                <td>
                                                    <select name="servicios" id="servicios" class="select color-blanco-transparente small-font">
                                                        <option value=""></option>
                                                        <optgroup label="SERVICIOS">
                                                            <option value="1">Medicina General</option>
                                                            <option value="2">Internacion</option>
                                                            <option value="3">Cirugia</option>
                                                            <option value="4">Analisis</option>
                                                            <option value="5">Odontologia</option>
                                                            <option value="6">Rayos X</option>
                                                            <option value="7">Ecografia</option>
                                                        </optgroup>
                                                        <optgroup label="RECETA MEDICA">

                                                        </optgroup>

                                                    </select>
                                                </td>
                                                <td>
                                                    <input type="text" name="cantidad" id="" class="select text-cantidad color-blanco-transparente">
                                                </td>
                                                <td>
                                                    <div class="valueBox"></div>
                                                </td>
                                                <td>
                                                    <div class="valueBox monto"></div>
                                                </td>
                                                <td>
                                                    <div class="valueBox"></div>
                                                </td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td>SUBTOTAL</td>
                                                <td id="subtotal">
                                                    <div class="valueBox">0</div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td>IMPUESTO (15%)</td>
                                                <td id="impuesto">
                                                    <div class="valueBox"></div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td>TOTAL</td>
                                                <td id="total">
                                                    <div class="valueBox"></div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



            </div>

        </div>

        <input type="hidden" name="" id="IdElemento">


        <script src="/Proyecto/statics/js/cliente/cliente.js"></script>
        <script src="/Proyecto/statics/js/secretaria/factura.js"></script>

</body>

</html>