<header>

        <?php session_start(); ?>
        
        <div class="logo">
          <img src="/Proyecto/statics/img/Logo1.svg" alt="" />
        </div>
        <div class="navbar">
          <div class="content-navbar" onclick="location.href = '../index.php'">
            <a href="../../../index.php">INICIO</a>
          </div>
          <div class="content-navbar" onclick="">
            <a href="">PERFIL</a>
          </div>
          <div class="content-navbar" onclick="location.href = '/Proyecto/modules/administrador/administrador.php'">
            <a href="../administrador.php">ADMINISTRAR</a>
          </div>
          <div class="content-navbar" onclick="location.href = '/Proyecto/modules/login.php'">
            <a href="../../../modules/login.php">SALIR</a>
          </div>
        </div>
</header>

<div class="linea-horizontal"></div>