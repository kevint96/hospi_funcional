   <?php

   require '../conexion/conexion2.php';
   require_once "../conexion/conexion.php";

   setlocale(LC_ALL,"es_ES"); //se cambia el idioma al español castellano
   $mesActual = strftime('%B');
   $mesActual = strtoupper($mesActual);

    // $id_usuario = $_SESSION['id_paciente'];
   $error = "";

   $conexion = new conexion();
   $conexion->conectar();
   $datos = $conexion->consulta();

   $id_usuario = $datos[9];

   $result = consultarCitasUsuario($id_usuario);

   $restriccion = restriccionSolicitud($id_usuario);

   $tamañoArreglo = mysqli_num_rows($result);

   $res=mysqli_fetch_row($restriccion);

    // echo "El mes es:".$res[0];
    // echo "El numero de solicitudes es:" . $res[1];
    // echo strftime("El año es %Y y el mes es %B");

if($tamañoArreglo >0)
{
    $error .= "<p class='alert alert-warning'>".$res[1].' '."SOLICITUDES REGISTRADAS EN EL MES DE".' '.$mesActual."</p>";
    $error .= "<div class='card'>";
    $error .= "<div class='card-body' style='text-align:center;'>";
    $error .= "<table style='text-align:center;'class='table table-bordered table-hover'>";
    $error .= "<thead style='text-align:center'> ";
    $error .= "<th style='text-align:center'>";
    $error .= "<i class='fa fa-user'></i> Usuario</th>";
    $error .= "<th style='text-align:center'> ";
    $error .= "<i class='fas fa-user-tie'></i></i> Nombre paciente</th>";
    $error .= "<th style='text-align:center'>";
    $error .= "<i class='fas fa-address-card'></i></i> Documento paciente</th>";
    $error .= "<th style='text-align:center'>";
    $error .= "<i class='fa fa-hospital-o'></i></i> Especialidad</th>";
    $error .= "<th style='text-align:center'>";
    $error .= "<i class='fas fa-calendar-alt'></i></i> Fecha creción solicitud</th>";
    $error .= "<th></th>";
    $error .= "</thead>";
    while($ver=mysqli_fetch_row($result)){
        $formato_fecha = date('d-m-Y', strtotime($ver[6]));
        $error.="<tr>";
        $error.="<td>".$ver[0].' '.$ver[1]."</td>";
        $error.="<td>".$ver[2].' '.$ver[3]."</td>";
        $error.="<td>".$ver[4]."</td>";
        $error.="<td>".$ver[5]."</td>"; 
        $error.="<td>".$formato_fecha."</td>"; 
        $error.="<td style='width:100px;''>";

            // $error.= "<button class = \"btn btn-danger btn-lg btn-block\" type = \"submit\" id = \"cancelar\" onClick =\"\">Cancelar cita</button>";

        $error.= "<button class = \"btn btn-danger btn btn-block\" type = \"submit\" id = \"cancelar\" onClick =\"cancelar('".$id_usuario."')\">Cancelar cita</button>";

        $error.="</td>"; 
        $error.="</tr>";
    } 
    $error.="</table>";
    $error.="</div>";
    $error.="</div>";
    $error.="</section>";


}
else
{
    $error = "<p class='alert alert-danger'>NO TIENE SOLICITUD DE CITAS REGISTRADAS EN EL MES DE".' '.$mesActual."!</p>";
}
echo $error;

?>