<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <link rel="stylesheet" href="../../statics/css/main.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css"
    integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous" />
  <link href="https://fonts.googleapis.com/css2?family=Gowun+Dodum&display=swap" rel="stylesheet" />
</head>

<body>
  <div class="fondo">


    <?php  include("../../includes/admin_header.php")?>

    <div class="main-user">


      <?php  include("../../includes/veteri_user.php")?>


      <div class="administrar">
        <div class="motivo">MENÚ</div>
        <div class="menu">

          <div class="opcion cita"onclick="location.href = '../administrador/admin_Cita/admin_Cita.php'">
            <div class="titulo">
              <div class="tituloPrincipal">CITAS</div>
            </div>
            <div class="icono">
              <i class="far fa-calendar-alt fa-4x"></i>
            </div>
          </div>

          <div class="opcion enfermedades" onclick="location.href = '../administrador/admin_Enfermedades/admin_Enfermedad.php'">
            <div class="titulo">
              <div class="tituloPrincipal">ENFERMEDADES</div>
            </div>
            <div class="icono">
              <i class="fas fa-viruses fa-4x"></i>
            </div>
          </div>

          <div class="opcion cirugia" onclick="location.href = '../administrador/admin_Cirugias/admin_Cirugia.php'">
            <div class="titulo">
              <div class="tituloPrincipal">CIRUGIAS</div>
            </div>
            <div class="icono">
              <i class="fas fa-syringe fa-4x"></i>
            </div>
          </div>

          <div class="opcion medicamento" onclick="location.href = '../administrador/admin_Medicamentos/admin_Medicamento.php'">
            <div class="titulo">
              <div class="tituloPrincipal">MEDICAMENTOS</div>
            </div>
            <div class="icono">
              <i class="fas fa-pills fa-4x"></i>
            </div>
          </div>

          <div class="opcion equipo-medico" onclick="location.href = '../administrador/admin_Equipo/admin_Equipo.php'">
            <div class="titulo">
              <div class="tituloPrincipal">EQUIPO MEDICO</div>
            </div>
            <div class="icono">
              <i class="fas fa-briefcase-medical fa-4x"></i>
            </div>
          </div>

          <div class="opcion paciente" onclick="location.href = '../administrador/admin_Paciente/admin_Paciente.php'">
            <div class="titulo">
              <div class="tituloPrincipal">PACIENTES</div>
            </div>
            <div class="icono">
              <i class="fas fa-dog fa-4x"></i>
            </div>
          </div>

        </div>
      </div>
    </div>

    <script src="../../statics/js/administrador/administrador.js"></script>
</body>

</html>