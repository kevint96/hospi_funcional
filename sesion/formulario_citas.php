<?php session_start();

    if(isset($_SESSION['cuenta'])){
    	require 'inactividad.php';		
        require '../vista/formulario_citas-vista.php';

    }else{
    	header("Content-Type: text/html;charset=utf-8");
        header ('location: ../sesion/login.php');
    }
        
?>