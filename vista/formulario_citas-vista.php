<!DOCTYPE html>
<html lang="es">
<head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <title>Nuevo hospital la candelaria:Citas</title>  
    <link rel="shortcut icon" href="../image/favicon.ico" />
    <link rel="stylesheet" type="text/css" href="../librerias/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../librerias/alertifyjs/css/alertify.css">
    <link rel="stylesheet" type="text/css" href="../librerias/alertifyjs/css/themes/default.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <!-- Esto le da el diseño a los mensajes de alerta -->
    <link rel="stylesheet" type="text/css" href="../librerias/select2/css/select2.css">

    <script src="../js/funcion.js"></script>
    <script src="../librerias/alertifyjs/alertify.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
    <!-- Esta es la libreria que contiene las alertas -->
</head>
<body>

 <header class="header">
    <?php require '../vista/encabezado.php';?>
</header>
<section class="contenido wrapper">
    <h3>Formulario de solicitud citas médicas</h3>

    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>



    <div class="col-xs-12 col-md-12">
        <label><p>¿El usuario es el mismo paciente?  <br>marque SI/NO:</label>
            <input type="radio" name="combo_paciente"
            <?php if (isset($combo_paciente) && $combo_paciente=="SI") echo "checked";?>
            value="SI" onclick="hacerAlgo()">SI
            <input type="radio" name="combo_paciente"
            <?php if (isset($combo_paciente) && $combo_paciente=="NO") echo "checked";?>
            value="NO">NO
        </div>

    <form action="#" method="post" id="funcione" class="form" enctype="multipart/form-data">
      <div class="form-row">

        <div class="col-xs-4 col-md-4">
            <i class="fas fa-hospital-alt"></i>
            <label>Nombre entidad responsable pago:</label>
            <input name="Entidad" type="text" class="form-control" onKeyUp="this.value=this.value.toUpperCase();">
        </div>

        <div class="col-xs-4 col-md-4">
            <i class="fa fa-user"></i>
            <label>Nombre paciente:</label>
            <input name="NombrePaciente"
            <?php
            require_once "../conexion/conexion.php";
            $conexion = new conexion();
            $conexion->conectar();
            $datos = $conexion->consulta();
            $nombreCompleto = mb_strtoupper($datos[4].' '.$datos[5]);
            ?>
            value="<?php echo $nombreCompleto;?>"

            type="text" class="form-control" onKeyUp="this.value=this.value.toUpperCase();">
        </div>
        <div class="col-xs-4 col-md-4">
            <i class="fas fa-user-tie"></i>
            <label>Apellido paciente:</label>
            <input name="Apellido"
            <?php
            $apellidoCompleto = mb_strtoupper($datos[6].' '.$datos[7]);
            ?>
            value="<?php echo $apellidoCompleto;?>"
            type="text" class="form-control" onKeyUp="this.value=this.value.toUpperCase();">
        </div>

        <div class="col-xs-4 col-md-4">
            <i class="fas fa-address-card"></i>
            <label>Numero documento paciente:</label>
            <input name="Numero_documento"
            <?php
            echo "value=".$datos[9]."";
            ?>
            type="number" class="form-control">
        </div>

        <div class="col-xs-4 col-md-4">
            <i class="far fa-id-card"></i>
            <label>Lugar expedición documento paciente:</label>
            <input name="Expedicion_documento"
            <?php
            //echo "value=".$datos[7]."";
            ?>
            type="text" class="form-control" onKeyUp="this.value=this.value.toUpperCase();">
        </div>

        <div class="col-xs-4 col-md-4">
            <i class="fas fa-calendar-alt"></i>
            <label>Fecha nacimiento paciente</label>
            <input name="Fecha_nacimiento"
            <?php
            echo "value=".$datos[10]."";
            ?>
            type="date" class="form-control">
        </div>

        <div class="col-xs-4 col-md-4">

            <i class="fas fa-city"></i>
            <label>Departamento residencia paciente:</label>
            <input name="Depto_residencia" type="text" class="form-control" onKeyUp="this.value=this.value.toUpperCase();">
        </div>

        <div class="col-xs-4 col-md-4">
            <i class="fas fa-warehouse"></i>
            <label>Ciudad o municipio residencia paciente:</label>
            <input name="Municipio_residencia" type="text" class="form-control" onKeyUp="this.value=this.value.toUpperCase();">
        </div>

        <div class="col-xs-4 col-md-4">
            <i class="fas fa-home"></i>
            <label>Barrio o vereda residencia paciente:</label>
            <input name="Barrio_residencia" type="text" class="form-control" onKeyUp="this.value=this.value.toUpperCase();">
        </div>

        <div class="col-xs-4 col-md-4">
            <i class="fas fa-hotel"></i>
            <label>Direccion paciente:</label>
            <input name="Direccion"
            <?php
            echo "value=".$datos[11]."";
            ?>
            type="text" class="form-control" onKeyUp="this.value=this.value.toUpperCase();">
        </div>

        <div class="col-xs-4 col-md-4">
            <i class="fa fa-venus-double"></i>
            <label>Genero paciente:</label>
            <select name="Genero" class="form-control">
                <option value="H">HOMBRE</option>
                <option value="M">MUJER</option>
                <option value="A">APODERADO</option>
                <option value="N">NINGUNO</option>
            </select>
        </div>

        <div class="col-xs-4 col-md-4">
            <i class="fas fa-user-shield"></i>
            <label>Estado civil paciente:</label>
            <select name="Estado_civil" class="form-control" onKeyUp="this.value=this.value.toUpperCase();">
                <option value="Ninguno">NINGUNO</option>
                <option value="Soltero">SOLTERO</option>
                <option value="Casado">CASADO</option>
                <option value="Viudo">VIUDO</option>
                <option value="Unión libre">UNION LIBRE</option>
                <option value="Separado">SEPARADO</option>
            </select>
        </div>

        <div class="col-xs-4 col-md-4">
            <i class="fab fa-accessible-icon"></i>
            <label>Tipo discapacidad diversa paciente:</label>
            <select name="Tipo_discapacidad" class="form-control" onKeyUp="this.value=this.value.toUpperCase();">
                <option value="Ninguno">NINGUNO</option>
                <option value="Visual">VISUAL</option>
                <option value="Auditiva">AUDITIVA</option>
                <option value="Física">FISICA</option>
            </select>
        </div>



        <div class="col-xs-4 col-md-4">
            <i class="fa fa-envelope"></i>
            <label>Email:</label>
            <input name="Email" 
            <?php
            echo "value=".mb_strtoupper($datos[0])."";
            ?>
            type="text" class="form-control" onKeyUp="this.value=this.value.toUpperCase();">
        </div>


        <div class="col-xs-4 col-md-4">
            <i class="fas fa-phone"></i>
            <label>Telefono fijo:</label>
            <input name="Telefono_fijo" 
            <?php
            //echo "value=".strtoupper($datos[0])."";
            ?>
            type="number" class="form-control">
        </div>

        <div class="col-xs-4 col-md-4">
            <i class="fas fa-mobile"></i>
            <label>Telefono móvil:</label>
            <input name="Telefono_movil" 
            <?php
            //echo "value=".strtoupper($datos[0])."";
            ?>
            type="number" class="form-control">
        </div>


        <div class="col-xs-4 col-md-4">
            <i class="fas fa-blind"></i>
            <label>Población especial:</label>
            <select name="Poblacion_especial" class="form-control" onKeyUp="this.value=this.value.toUpperCase();">
                <option value="NINGUNO" selected="selected">- NINGUNO -</option>
                <option value="INDIGENAS">INDIGENAS</option>
                <option value="INDIGENTES">INDIGENTES</option>
                <option value="MENORES EN ESTADO DE ABANDONO">MENORES EN ESTADO DE ABANDONO</option>
                <option value="MUJERES GESTANTES">MUJERES GESTANTES</option>
                <option value="MENORES DE 1 AÑO">MENORES DE 1 AÑO</option>
                <option value="POBLACION JURIDICAMENTE INIMPUTABLE">POBLACION JURIDICAMENTE INIMPUTABLE</option>
                <option value="REINSERTADOS">REINSERTADOS</option>
                <option value="MAYORES DE 60 AÑOS">MAYORES DE 60 AÑOS</option>
                <option value="DESPLAZADOS">DESPLAZADOS</option>
                <option value="MADRES COMUNITARIAS">MADRES COMUNITARIAS</option>
                <option value="MIGRANTES">MIGRANTES</option>
                <option value="OTROS">OTROS</option>
            </select>
        </div>

        <div class="col-xs-4 col-md-4">
            <i class="fa fa-hospital-o"></i>
            <label>Especialidad:</label>
            <select name="Especialidad" class="form-control">
                <option value="GINECOLOGIA">GINECOLOGIA</option>
                <option value="MEDICINA INTERNA">MEDICINA INTERNA</option>
                <option value="OFTALMOLOGIA">OFTALMOLOGIA</option>
                <option value="PEDIATRIA">PEDIATRIA</option>
                <option value="CIRUGIA GENERAL">CIRUGIA GENERAL</option>
                <option value="UROLOGIA">UROLOGIA</option>
                <option value="ANESTESIOLOGIA">ANESTESIOLOGIA</option>
                <option value="RADIOLOGIA">RADIOLOGIA</option>
                <option value="GASTROENTEROLOGIA">GASTROENTEROLOGIA</option>
            </select>
        </div>

        <!-- <div class="col-xs-4 col-md-4">
            <i class="fa fa-calendar"></i>
            <label>Fecha</label>
            <input name="Fecha"type="date" class="form-control">
        </div> -->


        <div class="col-xs-4 col-md-4">
            <i class="fas fa-address-book"></i>
            <label>Adjuntar autorización vigente</label>
            <span>-Mínimo 30 días</span>
            <input name="Autorizacion" id="Autorizacion" type="file" size="150" maxlength="150" class="form-control">
        </div>

        <div class="col-xs-4 col-md-4">
            <i class="far fa-address-book"></i>
            <label>Adjuntar orden médica</label>
            <span>-Mínimo 30 días</span>
            <input name="Orden_medica" id="Orden_medica" type="file" size="150" maxlength="150" class="form-control">
        </div>


        <div class="col-xs-4 col-md-4">
            <button class="btn btn-sucess btn-lg btn-block" id="cita" name="Submit" type="submit">Enviar solicitud</button>
        </div>
    </div>
</form>

<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

</div>

<div id="resultados_ajax" class="gaps">
</div>

<div id="registrarCita"></div>

<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>

<script>
    $( "#funcione" ).submit(function( event ) {
      var parametros = $(this).serialize();
      var formData = new FormData($("#funcione")[0]);
      $.ajax({
        method: "POST",
        url: "../controlador/solicitud_cita.php",
        data: formData,
        processData: false,
        contentType: false,
        beforeSend: function(objeto){
            // $("#resultados_ajax").html("<p class='alert alert-success'>Enviando solicitud...</p>");
            $('#resultados_ajax').html('<div class="loading"><img src="../image/loader.gif"/><br/>Un momento, por favor...</div>');
        },
        success: function(datos){

            $("#resultados_ajax").html(datos);
            // document.getElementById("registrar").focus();
            // document.getElementById("focus").focus();
            $('html,body').animate({
                scrollTop: $("#focus").offset().top
            }, 2000);

            // alertify.error('Por motivos de agendamiento, un paciente puede solicitar 3 citas por mes');

            // window.location="../sesion/ver_citas.php";
        }
    });

      event.preventDefault();
  });
</script>

<script type="text/javascript">

 function regis(){
    alertify.confirm('Registrar cita', '¿Esta seguro que desea registrar esta cita?');
}

</script>


<?php require '../vista/pie_pagina.php';?>
</body>
</html>


