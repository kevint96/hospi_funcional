<?php

session_start();

if(isset($_SESSION['cuenta'])) {
	header("Content-Type: text/html;charset=utf-8");
    header('location: ../index.php');
}
require '../vista/register-vista.php';
?>