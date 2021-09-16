<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Administrador | Facturas</title>
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
                    <div class="motivo">PEDIDOS</div>
                    <div class="atras" onclick="location.href = '../../administrador/administrador.php'">
                        ATRAS
                    </div>
                </div>
                <div class="botones">
                    <div class="boton verde" onclick="location.href = '../admin_Pedidos/admin_agregarPedidos.php'">
                        <div class="image">
                            <i class="fas fa-plus"></i>
                        </div>
                        <div class="texto">
                            AGREGAR
                        </div>
                    </div>
                    <div class="line">

                    </div>
                    <div class="boton" id="editar" onclick="location.href = '../admin_Pedidos/admin_editarPedidos.php'">
                        <div class="image">
                            <i class="fas fa-pen"></i>
                        </div>
                        <div class="texto">
                            EDITAR
                        </div>
                    </div>
                    <div class="boton rojo" id="eliminar" onclick="accionEliminar()" style="display: none;">
                        <div class="image">
                            <i class="fas fa-times"></i>
                        </div>
                        <div class="texto">
                            ELIMINAR
                        </div>
                    </div>
                    <div class="difuminacion">

                    </div>
                </div>
                <div class="clientes">
                    <div class="descripcion">
                        <div class="herramientas">
                            <div class="buscador">
                                <div class="icono-buscar">
                                    <i class="fas fa-search"></i>
                                </div>
                                <div class="cajaTexto-buscar">
                                    <input type="text" spellcheck="false" placeholder="BUSCAR POR ID PEDIDO" id="buscar">
                                </div>
                            </div>
                            <div class="limpiar" onclick="limpiar()">
                                LIMPIAR
                            </div>
                        </div>
                        <div class="total-clientes">
                            TOTAL &nbsp;<span class="pedidosTotales">2</span>
                        </div>
                    </div>

                    <div class="tabla-clientes">
                        <table id="tb-cliente" class="tabla">
                            <thead>
                                <th>ID PEDIDO</th>
                                <th>FECHA</th>
                                <th>ID PROVEEDOR</th>
                                <th>TOTAL COMPRA</th>
                                <th></th>
                            </thead>
                            <tbody>
                            <?php
                                include('../../conexion/conexion.php');

                                $query = 'SELECT * FROM  compras';
                                $result = mysqli_query($conn, $query);

                                while ($row = mysqli_fetch_array($result)) { ?>

                                    <tr class="filas" onclick="filas(event)">
                                        <td><?php echo $row['Id_Compra'] ?></td>
                                        <td><?php echo $row['Fecha_Compra'] ?></td>
                                        <td><?php echo $row['Id_Proveedor'] ?></td>
                                        <td><?php echo $row['Total_Compra'] ?></td>
                                        <td><button class="default-buton" onclick="location.href = '../admin_Pedidos/admin_detallePedidos.php'">DETALLE</button></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>


            </div>

        </div>

        <div class="eliminar">
            <div class="mensaje color-blanco-transparente">

                <div class="eliminar-mensaje">
                    ¿ESTA SEGURO QUE DESEA ELIMINAR A <span id="nombreClienteEliminado"></span> ?
                </div>

                <div class="eliminar-buttons">
                    <div class="default-btn color-rojo-hover">
                        ELIMINAR
                    </div>
                    <div class="default-btn color-secundario-hover" onclick="cancelarEliminar()">
                        CANCELAR
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="../../../statics/js/administrador/admin_Proveedor/admin_Pedidos.js"></script>
</body>

</html>