<!DOCTYPE html>
<html lang="es">
<head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <title>Nuevo hospital la candelaria:Ver Citas</title>  
    <link rel="shortcut icon" href="../image/favicon.ico" />
    <link rel="stylesheet" type="text/css" href="../librerias/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../librerias/alertifyjs/css/alertify.css">
    <link rel="stylesheet" type="text/css" href="../librerias/alertifyjs/css/themes/default.css">
    <!-- Esto le da el diseño a los mensajes de alerta -->
    <link rel="stylesheet" type="text/css" href="../librerias/select2/css/select2.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <script src="../js/funcion.js"></script>
    <script src="../librerias/alertifyjs/alertify.js"></script>
    <!-- Esta es la libreria que contiene las alertas -->
</head>
<body>

   <header class="header">
    <?php require '../vista/encabezado.php';?>
</header>
<section class="contenido wrapper">
    <h3>Estado solicitudes</h3>

    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
    <?php
    require '../controlador/ver_citas.php';
    ?>
 
    <?php 
    require '../vista/pie_pagina.php';?>
</body>
</html>
