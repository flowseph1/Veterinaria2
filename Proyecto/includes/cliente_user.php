<div class="perfil">
    <div class="user-perfil">
        <div class="circulo color-blanco-transparente">
            <i class="fas fa-user fa-4x"></i>
        </div>
        <div class="info">
            <div class="puesto">CLIENTE</div>
            <div class="nombre"><?php echo $_SESSION['nombre'] ?></div>
        </div>
    </div>
    <div class="tarjetas">
        <div class="tarjeta-container">
            <div class="noti">
                <i class="fas fa-bell fa-2x"></i>
                <div class="tarjeta-tittle">RECORDATORIOS</div>
                <div class="noti-circulo">1</div>
            </div>

            <div class="tarjeta-content notificaciones">
                <div class="notificacion">CITA ID: CITA-01</div>
            </div>
        </div>

        <div class="tarjeta-container">
            <div class="noti">
                <i class="fas fa-paw fa-2x"></i>
                <div class="tarjeta-tittle">MASCOTAS</div>
            </div>

            <div class="tarjeta-content">

                <?php if (count($_SESSION['mascotas']) == 0) { ?>

                    <div class="agregar-mascota">
                        <div>
                            SIN MASCOTAS
                        </div>
                        <div class="default-btn color-secundario-hover">
                            <i class="fas fa-plus-circle fa-2x"></i> &nbsp; AGREGA
                        </div>

                    </div>
                <?php } ?>
                <?php for ($i = 0; $i < count($_SESSION['mascotas']); $i++) { ?>
                    <div class="mascota-main">
                        <div class="mascota-info">
                            <div class="mascota-perfil color-blanco-transparente color-secundario-hover">
                                <div class="mascota-imagen">
                                    <?php
                                    switch ($_SESSION['especies'][$i]) {
                                        case '1':
                                            echo "<i class='fas fa-dog fa-3x'></i>";
                                            break;
                                        case '2':
                                            echo "<i class='fas fa-cat fa-3x'></i>";
                                            break;
                                        case '33':
                                            echo "<i class='fas fa-fish fa-3x'></i>";
                                            break;
                                        default:
                                            echo "<i class='fas fa-paw fa-3x'></i>";
                                            break;
                                    }

                                    ?>

                                </div>
                            </div>
                            <div class="mascota-nombre">
                                <?php echo $_SESSION['mascotas'][$i] ?>
                            </div>
                        </div>
                        <div class="mascota-info">
                            <div class="mascota-opciones color-blanco-transparente">
                                <div class="mascota-opcion color-secundario-hover">
                                    AGENDAR CITA
                                </div>
                                <div class="mascota-opcion color-secundario-hover">
                                    HISTORIAL
                                </div>
                                <div class="mascota-opcion color-secundario-hover">
                                    EDITAR MASCOTA
                                </div>
                            </div>
                        </div>

                    </div>
                <?php } ?>
            </div>
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