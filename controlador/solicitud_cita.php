<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../PhpMailer/Exception.php';
require '../PhpMailer/PHPMailer.php';
require '../PhpMailer/SMTP.php';
require '../conexion/conexion2.php';
require_once "../conexion/conexion.php";

// set_time_limit(0); 

session_start(); //Se inicia la sesión
setlocale(LC_ALL,"es_ES"); //se cambia el idioma al español castellano
$mesActual = strftime('%B');
$mesActual = strtoupper($mesActual);
$conexion = new conexion();
$conexion->conectar();
$datos = $conexion->consulta();
$numero_documento = $_POST['Numero_documento']; //trae el numero del documento de la pagina

$id_usuario = $datos[9];

$citas_usuario = consultarSolicitudUsuario($id_usuario); //consulta cuantas veces el usuario ha registrado una solicitud en el mes

$citas_paciente = consultarCitasPaciente($numero_documento); //consulta cuantas veces el paciente ha registrado una solicitud en el mes

$numUsuario = mysqli_fetch_row($citas_usuario);

$numPaciente = mysqli_fetch_row($citas_paciente);

// echo "el numero de citas por paciente es igual a: " .$numPaciente[0]. ' '. "y el de usuario es: " .$numUsuario[0];


if($numPaciente[0] < 3 && $numUsuario[0] < 3){ //el numero minimo de solicitudes al mes por paciente es de 3



if(is_uploaded_file($_FILES['Autorizacion']['tmp_name']) && is_uploaded_file($_FILES['Orden_medica']['tmp_name'])){ ///DDD  Si envia la autorización y la ordén médica puede continuar



    // $json = array();

  header("Content-Type: text/html;charset=utf-8"); //convierte caracteres a utf-8


  $conexion = new conexion(); // establece conexion para traer el id del usuario que realiza la solicitud
  $conexion->conectar();
  $datos = $conexion->consulta();

  $id_usuario = $datos[9]; //id usuario que realiza la solicitud

  $nombreCompleto = mb_strtoupper($datos[4].' '.$datos[6]); //nombre del usuario que realiza la solicitud


  $error ="";

  $entidad = $_POST['Entidad'];
  $nombre = $_POST['NombrePaciente'];
  $apellido = $_POST['Apellido'];
  $expedicion_documento = $_POST['Expedicion_documento'];
  $fecha_nacimiento = $_POST['Fecha_nacimiento']; //cambia el formato de la fecha
  $depto_residencia = $_POST['Depto_residencia'];
  $municipio_residencia = $_POST['Municipio_residencia'];
  $barrio_residencia = $_POST['Barrio_residencia'];
  $direccion = $_POST['Direccion'];
  $genero = $_POST['Genero'];
  $estado_civil = $_POST['Estado_civil'];
  $tipo_discapacidad = $_POST['Tipo_discapacidad'];
  $email = mb_strtolower($_POST['Email']); //el email se imprime en minúscula
  $telefono_fijo = $_POST['Telefono_fijo'];
  $telefono_movil = $_POST['Telefono_movil'];
  $poblacion_especial = $_POST['Poblacion_especial'];
  $especialidad = $_POST['Especialidad'];
  $fecha_creacion_solicitud = date('d-m-Y');

  $autorizacion = $_FILES['Autorizacion'];
  $orden_medica = $_FILES['Orden_medica'];


  $template = "../PhpMailer/template_soli.html";//

  $formato_fecha = date('d-m-Y', strtotime($fecha_nacimiento));


  /*SIGUE RECOLECTANDO DATOS PARA FUNCION MAIL*/
  $message = file_get_contents($template);

  $message = str_replace('{{nombre_usuario}}', $nombreCompleto, $message); //Reemplaza datos del template.
  $message = str_replace('{{entidad}}', $entidad, $message);
  $message = str_replace('{{nombre}}', $nombre, $message);
  $message = str_replace('{{apellido}}', $apellido, $message);
  $message = str_replace('{{numero_documento}}', $numero_documento, $message);
  $message = str_replace('{{expedicion_documento}}', $expedicion_documento, $message);
  $message = str_replace('{{fecha_nacimiento}}', $formato_fecha, $message);
  $message = str_replace('{{depto_residencia}}', $depto_residencia, $message);
  $message = str_replace('{{municipio_residencia}}', $municipio_residencia, $message);
  $message = str_replace('{{barrio_residencia}}', $barrio_residencia, $message);
  $message = str_replace('{{direccion}}', $direccion, $message);
  $message = str_replace('{{estado_civil}}', $estado_civil, $message);
  $message = str_replace('{{tipo_discapacidad}}', $tipo_discapacidad, $message);
  $message = str_replace('{{email}}', $email, $message);
  $message = str_replace('{{telefono_fijo}}', $telefono_fijo, $message);
  $message = str_replace('{{telefono_movil}}', $telefono_movil, $message);
  $message = str_replace('{{poblacion_especial}}', $poblacion_especial, $message);
  $message = str_replace('{{especialidad}}', $especialidad, $message);
  $message = str_replace('{{fecha_creacion_solicitud}}', $fecha_creacion_solicitud, $message);


  $header = "SOLICITUD CITA DEL NUEVO HOSPITAL LA CANDELARIA E.S.E."; // encabezado mensaje


  $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
  try { ///EEE
                //Server settings
    $mail->CharSet = 'UTF-8';
    $mail->SMTPDebug = 0;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';                       // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'kjtj38@gmail.com';                 // SMTP username
    $mail->Password = 'torresjimenez24';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;


    $mail->SMTPOptions = array(
      'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
      )
    );     

    $mail->setFrom('kjtj38@gmail.com', 'SOLICITUD CITAS'); //correo de quien envia el mensaje.
    $mail->addAddress($email, $nombre); //Aquí se envian los datos del usuario, nombre.

    $mail->isHTML(true);  // Establecer el formato de correo electrónico en HTML
    $mail->AddEmbeddedImage($_FILES['Autorizacion']['tmp_name'], 'Autorizacion','Autorizacion','base64','image/jpeg'); //carga la autorizacion

    $mail->AddEmbeddedImage($_FILES['Orden_medica']['tmp_name'], 'Orden_medica','Orden_medica','base64','image/jpeg');//carga la orden medica


    $mail->msgHTML($message);
    $mail->Subject = $header;
    
    // $mail->AddAttachment($autorizacion['tmp_name'], $orden_medica['tmp_name']);
    $mail->AddAttachment($autorizacion['tmp_name'], $autorizacion['name']);
    $mail->AddAttachment($orden_medica['tmp_name'], $orden_medica['name']);
    //Envia datos adjuntos 
    //$mail->Body    = $message;
    //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    // $error .= '<i style="color: green; text-align:center;">Revise su correo!</i>';
  } ///EEEE
  catch (Exception $e) { ///FFF
    $error .= '<i style="color: red; text-align:center;">Hubo un error al enviar el email!</i>'; $mail->ErrorInfo;
  } ///FFF


    // creamos las variables para subir a la db
  $indicador_Autorizacion = $numero_documento.".jpg";
  $indicador_Orden_medica = $numero_documento.".jpg";

    //La ruta para las autorizaciones
  $ruta = "../documentos/Autorizaciones/"; 
  $name = $_FILES['Autorizacion']['name'];
  $nombrefinal= trim($_FILES['Autorizacion']['name']); //Eliminamos los espacios en blanco
  $nombrefinal= preg_replace("' '","",$indicador_Autorizacion);//Sustituye una expresión regular
  $upload= $ruta.$nombrefinal;


   //La ruta para las ordenes médicas
  $ruta2 = "../documentos/Ordenes medicas/"; 
  $name2 = $_FILES['Orden_medica']['name'];
  $nombrefinal2= trim($_FILES['Orden_medica']['name']); //Eliminamos los espacios en blanco
  $nombrefinal2= preg_replace("' '","",$indicador_Orden_medica);//Sustituye una expresión regular
  $upload2= $ruta2.$nombrefinal2;  



if(move_uploaded_file($_FILES['Autorizacion']['tmp_name'], $upload) && move_uploaded_file($_FILES['Orden_medica']['tmp_name'], $upload2)) { //movemos el autorizacion a su ubicacion AAAA


  $sql="INSERT into solicitud_cita (nombre_entidad, id_usuario, nombre, apellido, numero_documento, lugar_expedicion_documento, fecha_nacimiento, depto_residencia, municipio_residencia, barrio_residencia, direccion, genero, estado_civil, tipo_discapacidad, email, telefono_fijo, telefono_movil, poblacion_especial, especialidad, autorizacion, orden_medica, fecha_creacion_solicitud) values ('$entidad','$id_usuario','$nombre','$apellido','$numero_documento','$expedicion_documento','$fecha_nacimiento','$depto_residencia','$municipio_residencia','$barrio_residencia','$direccion','$genero','$estado_civil','$tipo_discapacidad','$email','$telefono_fijo' ,'$telefono_movil','$poblacion_especial','$especialidad','$nombrefinal','$nombrefinal2',NOW())";

  $resultado = consultar($sql);

  if($resultado!=0)
{ ///BBB

  $error .= "<p class='alert alert-warning'>SU SOLICITUD HA SIDO ENVIADA</p>";

} ///BBB
else
{ ///CCC
  $error .= "<p class='alert alert-danger'>SU SOLICITUD NO PUDO SER ENVIADA</p>";
} ///CCC

  // echo $resultado;

// $query = "INSERT INTO archivos (name,description,ruta,tipo,size) 
// VALUES ('$nombre','$apellido','".$nombrefinal."','".$_FILES['Autorizacion']['type']."','".$_FILES['Autorizacion']['size']."')";

// $result = consultar($query);

echo $error;
} ///AAAA

}///DDD
else
{
  $error = "<p class='alert alert-danger'>DEBE CARGAR SU AUTORIZACIÓN Y ORDEN MEDICA!</p>";
  // $error = "alertify.error('SELECCIONE UN DEPARTAMENTO Y FECHA!')";
  echo $error;
}
}
else
{
      $error = "<p class='alert alert-danger'>NO PUEDE ENVIAR MAS SOLICITUDES EN EL MES DE".' '.$mesActual."!</p>";

  // $error = "<p class='alert alert-danger'>NO PUEDE ENVIAR MÁS SOLICITUDES EN ESTE MES!</p>";
  $error.= "<script>
                alertify.error('Por motivos de agendamiento, solo se permite realizar 3 solicitudes por usuario y por paciente!, espere al siguiente mes');
    </script>";
  echo $error;
}  
?>
