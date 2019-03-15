<?php

session_start();


if(isset($_POST['Especialidad'])) {

    header("Content-Type: text/html;charset=utf-8");

    // $json = array();

    require '../conexion/conexion2.php';

    $error ="";

    $nombre = $_POST['NombrePaciente'];
    $apellido = $_POST['Apellido'];
    $numero_documento = $_POST['Numero_documento'];
    $expedicion_documento = $_POST['Expedicion_documento'];
    $fecha_nacimiento = $_POST['Fecha_nacimiento'];
    $depto_residencia = $_POST['Depto_residencia'];
    $municipio_residencia = $_POST['Municipio_residencia'];
    $barrio_residencia = $_POST['Barrio_residencia'];
    $direccion = $_POST['Direccion'];
    $genero = $_POST['Genero'];
    $estado_civil = $_POST['Estado_civil'];
    $tipo_discapacidad = $_POST['Tipo_discapacidad'];
    $email = $_POST['Email'];
    $telefono_fijo = $_POST['Telefono_fijo'];
    $telefono_movil = $_POST['Telefono_movil'];
    $poblacion_especial = $_POST['Poblacion_especial'];
    $especialidad = $_POST['Especialidad'];
    $fecha = $_POST['Fecha'];
    // $autorizacion = $_POST['Autorizacion'];
    // $orden_medica = $_POST['Orden_medica'];

    if (empty($especialidad) or empty($fecha)){

        $error = "<p class='alert alert-danger'>SELECCIONE UN DEPARTAMENTO Y FECHA!</p>";
        // $error = "alertify.error('SELECCIONE UN DEPARTAMENTO Y FECHA!')";
        echo $error;
        // $json['success'] = false;
        // $json['message'] = $error;
        // $json['data'] = null;
        // echo json_encode($json);
    }
    else
    {

    $result = consultarDoctores($fecha,$especialidad);

    $tamañoArreglo = mysqli_num_rows($result);

    $_SESSION['id_paciente'] = $numero_documento;

    //  $tamañoArreglo;
     // echo $tamañoArreglo;


    //  "<br> El tamaño esssss:" . $tamañoArreglo;

    if($tamañoArreglo >0)
    {
        $error .= "<p class='alert alert-warning'>CITAS DISPONIBLES</p>";
        $error .= "<div class='card'>";
        $error .= "<div class='card-body' style='text-align:center;'>";
        $error .= "<table style='text-align:center;'class='table table-bordered table-hover'>";
        $error .= "<thead style='text-align:center'> ";
        $error .= "<th style='text-align:center'>";
        $error .= "<i class='fa fa-user'></i> Nombre Médico</th>";
        $error .= "<th style='text-align:center'> ";
        $error .= "<i class='fa fa-calendar'></i> Fecha</th>";
        $error .= "<th style='text-align:center'>";
        $error .= "<i class='fa fa-clock-o'></i> Hora</th>";
        $error .= "<th style='text-align:center'>";
        $error .= "<i class='fa fa-phone'></i> Telefono</th>";
        $error .= "<th style='text-align:center'>";
        $error .= "<i class='fa fa-hospital-o'></i> Especialidad</th>";
        $error .= "<th></th>";
        $error .= "</thead>";
        while($ver=mysqli_fetch_row($result)){
            $nombreDoctor = $ver[0].' '.$ver[1];
            $nomooo =(int)$nombreDoctor;
            $error.="<tr>";
            $error.="<td>".$nombreDoctor."</td>";
            $error.="<td>".$ver[3]."</td>";
            $error.="<td>".$ver[4]."</td>";
            $error.="<td>".$ver[5]."</td>"; 
            $error.="<td>".$ver[6]."</td>"; 
            $error.="<td style='width:100px;''>";  
            // $error.='<button class="btn btn-sucess btn-lg btn-block" type="submit" 
            // onclick="registrar('.$nombreDoctor.')" value="'  .$nombreDoctor.  '">Tomar cita</button>';

            $error.= "<button class = \"btn btn-sucess btn-lg btn-block\" type = \"submit\" id = \"registrar\" onClick =\"registrar('".$nombreDoctor."','".$ver[2]."','".$ver[3]."','".$ver[4]."','".$ver[5]."','".$ver[6]."','".$nombre."','".$apellido."','".$numero_documento."','".$email."','".$genero."')\">Tomar cita</button>";


            // nm,im,fc,hc,tm,e,np,ap,ep,gp

            // registrar(".$nombreDoctor.",".$ver[2].",".$ver[3].",".$ver[4].",".$ver[5].",".$nombre.",".$apellido.",".$email.",".$genero.")'>Tomar cita</button>"; 
            $error.="</td>"; 
            $error.="</tr>";
        } 
        $error.="</table>";
        $error.="</div>";
        $error.="</div>";
        $error.="</section>";
        // $json['success'] = true;
        // $json['message'] = $error;
        // $json['data'] = null;
        // echo json_encode($json);    
    }
    else
    {
        $error = "<p class='alert alert-danger'>NO HAY CITAS DISPONIBLES!</p>";
        // $json['success'] = false;
        // $json['message'] = $error;
        // $json['data'] = null;
    }
    echo $error;

}
}

?>
