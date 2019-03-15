<?php 
function conexion(){
	$servidor="localhost";
	$usuario="root";
	$password="";
	$bd="hospitalcandelaria";

	$conexion=mysqli_connect($servidor,$usuario,$password,$bd);
	$conexion->query("SET NAMES 'utf8'");

	return $conexion;
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

function consultarDoctores($fecha,$especialidad){

	$conexion = conexion();

	$nombre = $_SESSION['cuenta'];

	$sql2 = "select A1.nombre,A1.apellido,A1.numero_documento,A1.fecha_disponible,A1.hora_disponible,A1.celular,A2.especialidad 
	from medicos A1, especialidad_medicos A2
	where A1.fecha_disponible >='$fecha' and A2.id = A1.especialidad_id and A2.id = '$especialidad'";


	$result=mysqli_query($conexion,$sql2);

	if(!$result){
		echo mysqli_error($conexion);
	}

	return $result;
}


function consultar($sql){

	$conexion = conexion();

	$sql2 = $sql;


	$result=mysqli_query($conexion,$sql2);

	if(!$result){
		echo mysqli_error($conexion);
	}

	return $result;
}


function darIdPaciente()
{
	$conexion = conexion();

	$nombre = $_SESSION['cuenta'];

	$sql = "SELECT numero_documento FROM pacientes WHERE cuenta = '$nombre'";

	$result=mysqli_query($conexion,$sql);

	$pac;

	while($ver=mysqli_fetch_row($result)){
		$pac = $ver[0];
	}

	return $pac;
}

function restriccionSolicitud($id_usuario)
{
	$conexion = conexion();

	$sql = "SELECT MonthName(`fecha_creacion_solicitud`) AS mes, count(*) AS numFilas FROM solicitud_cita 
	WHERE MONTH(fecha_creacion_solicitud)=MONTH(CURDATE()) and id_usuario = '$id_usuario'  GROUP BY mes";


	$result=mysqli_query($conexion,$sql);

	return $result;
}


function consultarCitasUsuario($id_paciente){

	$conexion = conexion();


	$sql = "select A1.primer_nombre,A1.primer_apellido, SC.nombre, SC.apellido, SC.numero_documento, SC.especialidad, fecha_creacion_solicitud FROM solicitud_cita SC, pacientes A1
	WHERE SC.id_usuario = A1.numero_documento and SC.id_usuario = '$id_paciente'";

	$result=mysqli_query($conexion,$sql);

	return $result;
}


function consultarCitasPaciente($id_paciente){

	$conexion = conexion();

	$sql = "select COUNT(*) FROM solicitud_cita 
	WHERE MONTH(fecha_creacion_solicitud)=MONTH(CURDATE()) and numero_documento = '$id_paciente'";

	$result=mysqli_query($conexion,$sql);

	return $result;
}

function consultarSolicitudUsuario($id_usuario){

	$conexion = conexion();

	$sql = "select COUNT(*) FROM solicitud_cita 
	WHERE MONTH(fecha_creacion_solicitud)=MONTH(CURDATE()) and id_usuario = '$id_usuario'";

	$result=mysqli_query($conexion,$sql);

	return $result;
}

function consultarCitasMedico($id_paciente,$id_medico){

	$conexion = conexion();

	$sql = "SELECT fecha_cita, hora_cita from citas= '$id_paciente'";

	$result=mysqli_query($conexion,$sql);

	$sql2 = "SELECT fecha_cita, hora_cita from medicos= '$id_medico'";

	$result2=mysqli_query($conexion,$sql2);

	$prueba = 0;

	while($ver=mysqli_fetch_row($result) && $ver2=mysqli_fetch_row($result2)){
	  	// $pac = $ver[0];
		if($ver == $ver2)
		{
			$prueba = 1;
		}
	}
	return $prueba;
}

?>