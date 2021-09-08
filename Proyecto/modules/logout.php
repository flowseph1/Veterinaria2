<?php
  //Inicia la sesion
  session_start();
  
  //Cierre de sesion
  session_unset();
  session_destroy();
  //Redireccion a el loging
  header('Location: login.php');
?>