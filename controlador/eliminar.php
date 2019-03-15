<?php
require_once "../conexion/conexion2.php";

	$conexion=conexion();
	// $id_paciente = $_SESSION['id_paciente'];
	$ip=$_POST['id_paciente'];

	// $sql="INSERT into citas (id_cita,id_paciente,nombre_paciente,apellido_paciente,email_paciente,genero_paciente,id_medico,nombre_medico,especialidad_medico,celular_medico,fecha_creacion_cita,fecha_cita,hora_cita,estado_cita) values ('','$ip','$np','$ap','$ep','$gp','$im','$nm','$em','$cm',NOW(),'$fc','$hc','$ec')";

	$sql = "DELETE FROM citas WHERE id_paciente='$ip'";

	echo $result=mysqli_query($conexion,$sql);

?>