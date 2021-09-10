<div class="perfil">
    <div class="user-perfil">
        <div class="circulo color-blanco-transparente">
            <i class="fas fa-user fa-4x"></i>
        </div>
        <div class="info">
            <div class="puesto">SECRETARIA</div>
            <div class="nombre"><?php echo $_SESSION['nombre'] ?></div>
        </div>
    </div>

    <?php

    $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    if ($actual_link == 'http://localhost:3000/Proyecto/modules/secretaria/secretaria.php') {
        include("../../modules/conexion/conexion.php");
    } else {
        include("../../../modules/conexion/conexion.php");
    }
    ?>
    <div class="tarjetas">
        <div class="tarjeta-container">
            <div class="noti">
                <i class="fas fa-bell fa-2x"></i>
                <div class="tarjeta-tittle">RECORDATORIOS</div>
                <?php
                $query = "SELECT * FROM citas WHERE Fecha_Cita = CURDATE() AND Id_EstadoCita = 1";
                $result = mysqli_query($conn, $query);
                $numero = mysqli_num_rows($result);

                if ($numero > 0) {
                    echo "<div class='noti-circulo'> $numero </div>";
                }
                ?>

            </div>
        </div>

        <div class="tarjeta-container">
            <?php

            $query = "SELECT * FROM citas WHERE Fecha_Cita = CURDATE() AND Id_EstadoCita = 1";
            $result = mysqli_query($conn, $query);
            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_array($result);

            ?>

                <div class="notificacion color-secundario-hover">
                    <div>
                        <i class="far fa-calendar-alt fa-2x"></i>
                        CITA:
                        <?php echo $row['Id_Cita'] ?>
                    </div>
                    <div>
                        <i class="far fa-clock fa-2x"></i>

                        <?php

                        $time = date('h:i A', strtotime($row['Hora_Cita']));

                        echo $time;


                        ?>
                    </div>
                    <div class="notification-icon">


                    </div>
                </div>

            <?php

            } else {
                echo "Sin Recordatorios";
            }

            ?>

        </div>
    </div>


    <div class="salir" onclick="location.href = '/Proyecto/modules/login.php'">
        <div class="btn-salir-texto">
            SALIR
        </div>
        <i class="fas fa-sign-out-alt fa-2x"></i>
    </div>
</div>


<div class="linea">
    <div class="linea-vertical"></div>
</div>