<header>

        <?php session_start(); ?>
        
        <div class="logo">
          <img src="/Proyecto/statics/img/Logo1.svg" alt="" />
        </div>
        <div class="navbar">
          <div class="content-navbar" onclick="location.href = '/Proyecto/index.php'">
            <a href="/Proyecto/index.php">INICIO</a>
          </div>
          <div class="content-navbar" onclick="location.href = '/Proyecto/modules/veterinario/perfil/perfil.php'">
            <a href="">PERFIL</a>
          </div>
          <div class="content-navbar" onclick="location.href = '/Proyecto/modules/veterinario/veterinario.php'">
            <a href="/Proyecto/modules/veterinario/veterinario.php">PRINCIPAL</a>
          </div>
          <div class="content-navbar" onclick="location.href = '/Proyecto/modules/logout.php'">
            <a href="/Proyecto/modules/logout.php">SALIR</a>
          </div>
        </div>
</header>

<div class="linea-horizontal"></div>