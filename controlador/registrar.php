<?php session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../PhpMailer/Exception.php';
require '../PhpMailer/PHPMailer.php';
require '../PhpMailer/SMTP.php';

// if(isset($_SESSION['cuenta'])) {
//     header('location: index.php');
// }

if ($_SERVER['REQUEST_METHOD'] == 'POST'){

    header("Content-Type: text/html;charset=utf-8");

    $email = $_POST['email'];
    $cuenta = $_POST['cuenta'];
    $password = $_POST['password'];
    $clave2 = $_POST['clave2'];

    $primer_nombre = $_POST['primer_nombre'];
    $segundo_nombre = $_POST['segundo_nombre'];
    $primer_apellido = $_POST['primer_apellido'];
    $segundo_apellido = $_POST['segundo_apellido'];
    $tipo_documento = $_POST['tipo_documento'];
    $numero_documento = $_POST['numero_documento'];
    $fechaNacimiento = $_POST['fechaNacimiento'];
    $direccion = $_POST['direccion'];

    //$clave = hash('sha512', $clave);
    //$clave2 = hash('sha512', $clave2);

    $error = '';

    function comprobar_email($email){ 
        $mail_correcto = 0; 
    //compruebo unas cosas primeras 
        if ((strlen($email) >= 6) && (substr_count($email,"@") == 1) && (substr($email,0,1) != "@") && (substr($email,strlen($email)-1,1) != "@")){ 
            if ((!strstr($email,"'")) && (!strstr($email,"\"")) && (!strstr($email,"\\")) && (!strstr($email,"\$")) && (!strstr($email," "))) { 
            //miro si tiene caracter . 
                if (substr_count($email,".")>= 1){ 
                //obtengo la terminacion del dominio 
                    $term_dom = substr(strrchr ($email, '.'),1); 
                //compruebo que la terminación del dominio sea correcta 
                    if (strlen($term_dom)>1 && strlen($term_dom)<5 && (!strstr($term_dom,"@")) ){ 
                //compruebo que lo de antes del dominio sea correcto 
                        $antes_dom = substr($email,0,strlen($email) - strlen($term_dom) - 1); 
                        $caracter_ult = substr($antes_dom,strlen($antes_dom)-1,1); 
                        if ($caracter_ult != "@" && $caracter_ult != "."){ 
                            $mail_correcto = 1; 
                        } 
                    } 
                } 
            } 
        } 
        if ($mail_correcto) 
            return 1; 
        else 
            return 0; 
    }


    function eliminar_tildes($cadena){

    //Codificamos la cadena en formato utf8 en caso de que nos de errores
        $cadena = utf8_decode($cadena);

    //Ahora reemplazamos las letras
        $cadena = str_replace(
            array('á', 'à', 'ä', 'â', 'ª', 'Á', 'À', 'Â', 'Ä'),
            array('a', 'a', 'a', 'a', 'a', 'A', 'A', 'A', 'A'),
            $cadena
        );

        $cadena = str_replace(
            array('é', 'è', 'ë', 'ê', 'É', 'È', 'Ê', 'Ë'),
            array('e', 'e', 'e', 'e', 'E', 'E', 'E', 'E'),
            $cadena );

        $cadena = str_replace(
            array('í', 'ì', 'ï', 'î', 'Í', 'Ì', 'Ï', 'Î'),
            array('i', 'i', 'i', 'i', 'I', 'I', 'I', 'I'),
            $cadena );

        $cadena = str_replace(
            array('ó', 'ò', 'ö', 'ô', 'Ó', 'Ò', 'Ö', 'Ô'),
            array('o', 'o', 'o', 'o', 'O', 'O', 'O', 'O'),
            $cadena );

        $cadena = str_replace(
            array('ú', 'ù', 'ü', 'û', 'Ú', 'Ù', 'Û', 'Ü'),
            array('u', 'u', 'u', 'u', 'U', 'U', 'U', 'U'),
            $cadena );

        $cadena = str_replace(
            array('ñ', 'Ñ', 'ç', 'Ç'),
            array('n', 'N', 'c', 'C'),
            $cadena
        );

        return $cadena;
    }
    
    $user = eliminar_tildes($primer_nombre);

    if (comprobar_email($email)!=1) {
        $error.='<i style="color: red; text-align:center;">El correo es incorrecto, reviselo <br></i>';
        
    }

    if (empty($email) or empty($cuenta) or empty($password) or empty($clave2)){

        $error.='<i style="color: red; text-align:center;">Favor de rellenar todos los campos <br></i>';
        echo $error;
    }
    
    else{
        try{
            $conexion = new PDO('mysql:host=localhost;dbname=hospitalcandelaria', 'root', '');
            $conexion->query("SET NAMES 'utf8'");
        }catch(PDOException $prueba_error){
            echo "Error: " . $prueba_error->getMessage();
        }

        $statement = $conexion->prepare('SELECT * FROM pacientes WHERE cuenta = :usuario LIMIT 1');
        $statement->execute(array(':usuario' => $cuenta));
        $resultado = $statement->fetch();


        $statement2 = $conexion->prepare('SELECT * FROM pacientes WHERE email = :email LIMIT 1');
        $statement2->execute(array(':email' => $email));
        $resultado2 = $statement2->fetch();


        $statement3 = $conexion->prepare('SELECT * FROM pacientes WHERE numero_documento = :numero_documento LIMIT 1');
        $statement3->execute(array(':numero_documento' => $numero_documento));
        $resultado3 = $statement3->fetch();

        if ($resultado != false){
            // $error .= '<i>Este usuario ya existe <br></i>';
            $error.='<i style="color: red; text-align:center;">Este usuario ya existe<br></i>';

        }

        if ($resultado2 != false){
            $error.='<i style="color: red; text-align:center;">El correo que ha ingresado ya tiene asignada una cuenta <br> Revise su correo!<br></i>';

        }

        if ($resultado3 != false){
            $error.='<i style="color: red; text-align:center;">El número de documento que ha ingresado ya tiene asignada una cuenta!<br></i>';

        }

        if ($password != $clave2){
            $error.='<i style="color: red; text-align:center;">Las contraseñas no coinciden<br></i>';
        }

        echo $error;

    }

    if ($error == ''){

        try {

            $statement = $conexion->prepare('INSERT INTO pacientes (email, cuenta, password, fecha_creacion_cuenta, primer_nombre, segundo_nombre, primer_apellido, segundo_apellido, tipo_documento, numero_documento, fecha_nacimiento, direccion) VALUES ( :correo, :usuario, :clave, NOW(), :primer_nombre, :segundo_nombre, :primer_apellido, :segundo_apellido, :tipo_documento, :numero_documento, :fechaNacimiento, :direccion)');
            $statement->execute(array(

                ':correo' => $email,
                ':usuario' => $cuenta,
                ':clave' => $password, 
                ':primer_nombre' => $primer_nombre,
                ':segundo_nombre' => $segundo_nombre,
                ':primer_apellido' => $primer_apellido,
                ':segundo_apellido' => $segundo_apellido,
                ':tipo_documento' => $tipo_documento,
                ':numero_documento' => $numero_documento,
                ':fechaNacimiento' => $fechaNacimiento,
                ':direccion' => $direccion

            ));
            $error .= '<i style="color: green; text-align:center;">El usuario se ha creado correctamente!<br></i>';

        } catch (PDOException $e) {
            $error .= '<i style="color: red; text-align:center;">Hubo un error al crear el usuario en la base de datos  !</i>'. $e->getMessage();
        }

            $template = "../PhpMailer/email_template.html";//


            /*SIGUE RECOLECTANDO DATOS PARA FUNCION MAIL*/
            $message = file_get_contents($template);

            

            $message = str_replace('{{first_name}}', $primer_nombre, $message);
            $message = str_replace('{{second_name}}', $primer_apellido, $message);
            $message = str_replace('{{cuenta}}', $cuenta, $message);
            $message = str_replace('{{customer_email}}', $email, $message);
            $message = str_replace('{{password}}', $password, $message);
            
            

            $header = "CUENTA CREADA EN EL PORTAL DEL NUEVO HOSPITAL LA CANDELARIA E.S.E.";


            $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
            try {
                //Server settings
                $mail->SMTPDebug = 0;                                 // Enable verbose debug output
                $mail->isSMTP();                                      // Set mailer to use SMTP
                $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
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

                $mail->setFrom('kjtj38@gmail.com', 'Nuevo hospital la candelaria');
                $mail->addAddress($email, $user); //Aquí se envian los datos del usuario, nombre.

                $mail->isHTML(true);  // Establecer el formato de correo electrónico en HTML

                $mail->msgHTML($message);
                $mail->Subject = $header;
                //$mail->Body    = $message;
                //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                $mail->send();
                $error .= '<i style="color: green; text-align:center;">Revise su correo!</i>';
            } catch (Exception $e) {
                $error .= '<i style="color: red; text-align:center;">Hubo un error al enviar el email!</i>'; $mail->ErrorInfo;
            }
            echo $error;
        }
    }

    ?>