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

            <?php
                include("../../conexion/conexion.php");
                //Obteniendo informacion de proveedor.
                $idProveedor = $_GET['idProveedor'];
                $query = "SELECT * FROM proveedores where Id_Proveedor = '$idProveedor'";
                $result = mysqli_query($conn, $query);

                //INFORMACION SOBRE PROVEEDOR
                while ($row = mysqli_fetch_array($result)) {
                    $rtn = $row['RTN_Proveedor'];
                    $Nombre_Legal = $row['Nombre_Legal'];
                    $Direccion_Proveedor = $row['Direccion_Proveedor'];
                    $Telefono_Proveedor = $row['Telefono_Proveedor'];
                    $estado = $row['Estado_Proveedor'];
                }
            ?>
            <div class="contenedor">
                <div class="titulo-opcion">
                    <div class="motivo">EDITAR PROVEEDOR</div>
                    <div class="atras" onclick="location.href = '../admin_Proveedores/admin_Proveedor.php'">
                        ATRAS
                    </div>
                </div>
                <div class="botones">
                    <div class="boton verde">
                        <div class="image save">
                            <i class="fas fa-save"></i>
                        </div>
                        <div class="texto">
                            <label for="submit-form">GUARDAR</label>
                        </div>
                    </div>
                </div>
                <div class="agregar cliente" style="height: 420px; width: 550px;">
                    <div class="forma">
                        <div class="personal">

                            <!--Inicio del formulario-->
                            <form action="editarProveedor.php" id="formularioEditar" method="POST">
                                <div class="informacion-personal">
                                    INFORMACION DE PROVEEDOR
                                </div>
                                <div class="line-horizontal">
                                </div>
                                <div class="info-personal">
                                    <div class="col">
                                        <div class="params">ID DE PROVEEDOR
                                        </div> 
                                        <div class="params">RTN DE LA EMPRESA
                                        </div>
                                        <div class="params">NOMBRE LEGAL
                                        </div>
                                        <div class="params">DIRECCION FISCAL
                                        </div>
                                        <div class="params">TELEFONO
                                        </div>
                                        <div class="params">ESTADO DE PROVEEDOR
                                        </div>                                        
                                    </div>
                                    <div class="col inputs" style="margin-left: 100px;">
                                    <div class="values">
                                            <input type="text" readonly style="width: 250px;" spellcheck="false" name="IdProveedor" id="IdProveedor" title="El ID de Proveedor no puede ser modificado" value="<?php echo $idProveedor ?>">
                                        </div>
                                    
                                        <div class="values">
                                            <input type="text" readonly style="width: 250px;" spellcheck="false" name="rtn" id="rtn" title="El RTN no puede ser modificado en esta pantalla" value="<?php echo $rtn ?>">
                                        </div>
                                        <div class="values">
                                            <input type="text" style="width: 250px;" spellcheck="false" required name="nombre" id="nombre" value="<?php echo $Nombre_Legal ?>">
                                        </div>
                                        <div class="values">
                                            <input type="text" style="width: 250px;" spellcheck="false" required name="direccion" id="direccion" value="<?php echo $Direccion_Proveedor ?>">
                                        </div>
                                        <div class="values">
                                            <input type="text" style="width: 250px;" spellcheck="false" required name="telefono" id="telefono" title="Ingresar solo numeros - Ejemplo: 22556633" pattern="[0-9]+" maxlength="8" value="<?php echo $Telefono_Proveedor ?>">
                                        </div>
                                        <div class="values" style="width: 100%;">
                                            <select style="width: 100%; height:30px;" name="estadoProveedor" id="estadoProveedor">
                                                <?php 
                                                    if($estado == 1){
                                                        echo "<option value='1'>Activo</option>";
                                                        echo '<option value="0">Inactivo</option>';
                                                    } 
                                                    else {
                                                        echo '<option value="0">Inactivo</option>';
                                                        echo "<option value='1'>Activo</option>";
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <input type="submit" id="submit-form" style="display: none;">
                            </form>
                            <!--FIN DEL FORMULARIO-->
                        </div>
                    </div>



                </div>

            </div>
        </div>
    </div>
    <!--<script src="/Veterinaria/Proyecto/statics/js/administrador/admin_cliente/admin_cliente.js"></script>
    //<script src="/Veterinaria/Proyecto/statics/js/administrador/admin_cliente/admin_agregarCliente.js"></script>-->
</body>

</html>