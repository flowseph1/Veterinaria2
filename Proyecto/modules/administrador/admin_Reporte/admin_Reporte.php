<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Administrador | Reportes</title>
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
                    <div class="motivo">REPORTES</div>
                    <div class="atras" onclick="location.href = '../../administrador/administrador.php'">
                        ATRAS
                    </div>
                </div>

                <div class="menu">


                    <div class="opcion enfermedades" onclick="location.href = '../admin_Reporte/admin_reportedeperros.php'">
                        <div class="titulo">
                            <div class="tituloPrincipal">Reporte de Perros</div>
                        </div>
                        <div class="icono">
                            <i class="fas fa-bone fa-4x"></i>
                        </div>
                    </div>

                    <div class="opcion enfermedades" onclick="location.href = '../admin_Reporte/admin_reportedegatos.php'">
                        <div class="titulo">
                            <div class="tituloPrincipal">Reporte de Gatos</div>
                        </div>
                        <div class="icono">
                            <i class="fas fa-cat fa-4x"></i>
                        </div>
                    </div>

                </div>

            </div>

        </div>

    </div>

    <script src="/Proyecto/statics/js/administrador/admin_cliente/admin_cliente.js"></script>
</body>

</html>