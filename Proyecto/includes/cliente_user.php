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

    <?php
    $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    if ($actual_link == 'http://localhost:3000/Proyecto/modules/cliente/cliente.php') {
        include("../../modules/conexion/conexion.php");
    } else {
        include("../../../modules/conexion/conexion.php");
    }
    $idCliente = $_SESSION['idCliente'];
    $query = "SELECT COUNT(Id_Cita) AS numeroCitas FROM citas WHERE Id_Cliente = $idCliente AND Id_EstadoCita = 1";
    $resultado = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($resultado);

    ?>
    <div class="tarjetas">
        <div class="tarjeta-container">
            <div class="noti">
                <i class="fas fa-bell fa-2x"></i>
                <div class="tarjeta-tittle">RECORDATORIOS</div>
                <?php if ($row['numeroCitas'] > 0) { ?>
                    <div class="noti-circulo"><?php echo $row['numeroCitas'] ?></div>
                <?php } ?>


            </div>
            <div class="tarjeta-content notificaciones">
                <?php if ($row['numeroCitas'] == 0) { ?>
                    Sin Recordatorios
                <?php } ?>
                <?php
                $query = "SELECT c.Id_Cita, c.Fecha_Cita, m.Nombre_Mascota FROM citas AS c, mascotas AS m WHERE c.Id_Cliente = $idCliente AND c.Id_EstadoCita = 1 AND c.Id_Mascota = m.Id_Mascota
                ORDER BY c.Fecha_Cita ASC";
                $resultado = mysqli_query($conn, $query);
                while ($row = mysqli_fetch_array($resultado)) { ?>
                    <div class="notificacion color-secundario-hover"><span class="negrita">CITA # <?php echo $row['Id_Cita']; ?></span>


                        <div>
                            <span class="small">MASCOTA:</span>
                            <?php echo $row['Nombre_Mascota']; ?>
                        </div>
                        <div>
                            <span class="small">FECHA:</span>
                            <?php
                            $fechaCita = $row['Fecha_Cita'];
                            $formatoFecha = date('d-m-Y', strtotime($fechaCita));
                            echo $formatoFecha;
                            ?>

                        </div>

                        <div class="iconCita">
                            <?php echo "<i class='far fa-calendar-check'></i>" ?>
                        </div>

                    </div>
                <?php } ?>
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
                        <div class="default-btn color-secundario-hover" onclick="location.href='/Proyecto/modules/cliente/mascotas/agregarMascotas.php'">
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
                        <div class="mascotaOpciones">
                            <div class="mascota-opciones color-blanco-transparente">
                                <div class="mascota-opcion color-secundario-hover" onclick="agendarCita(event)">
                                    AGENDAR CITA
                                    <input type="hidden" id="idMascota" value="<?php echo $_SESSION['idMascotas'][$i]; ?>">
                                </div>
                                <div class="mascota-opcion color-secundario-hover" onclick="historialMascota(event)">
                                    HISTORIAL
                                </div>
                                <div class="mascota-opcion color-secundario-hover" onclick="editarMascota(event)">
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