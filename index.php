<?php session_start();

if(isset($_SESSION['cuenta'])) {
  header("Content-Type: text/html;charset=utf-8");
  header('location: sesion/principal.php');


  $_SESSION[ 'ULTIMA_ACTIVIDAD' ] = time();


}else{
  header("Content-Type: text/html;charset=utf-8");
  header('location: sesion/login.php');
}


?>