 function registrar(nm,im,fc,hc,tm,e,np,ap,ip,ep,gp){
 	alertify.confirm('Registrar cita', '¿Esta seguro que desea registrar esta cita?', 
 		function(){ registrarCita(nm,im,fc,hc,tm,e,np,ap,ip,ep,gp) }
 		, function(){ alertify.error('Se ha cancelado el registro')});
 }

 function error()
 {
 	alertify.error('El usuario solo puede solicitar 3 citas por mes');
 }


 function cancelar($id_paciente){
 	alertify.confirm('Cancelar cita', '¿Esta seguro que desea cancelar esta cita?', 
 		function(){ cancelarCita($id_paciente) }
 		, function(){ alertify.error('No se cancelo la cita')});
 }

function hacerAlgo() {
      alert('Has elegido Sí');
  }


function registrarCita(nm,im,fc,hc,tm,e,np,ap,ip,ep,gp)
{
	cadena="nombre_medico=" + nm + 
	"&id_medico=" + im +
	"&fecha_cita=" + fc +
	"&hora_cita=" + hc +
	"&telefono_medico=" + tm +
	"&especialidad_medico=" + e +
	"&nombre_paciente=" + np +
	"&apellido_paciente=" + ap +
	"&id_paciente=" + ip +
	"&email_paciente=" + ep +
	"&genero_paciente=" + gp ;

	$.ajax({
		type:"POST",
		url:"../controlador/agregar.php",
		data:cadena,
		success:function(r){
			if(r==1){
				alertify.success("Se registro su cita correctamente :)");
				window.location="../sesion/ver_citas.php";
			}else{
				alertify.error("Fallo el servidor :(");
			}
		}
	});
}

function cancelarCita($id_paciente)
{
	cadena="id_paciente=" + $id_paciente ;

	$.ajax({
		type:"POST",
		url:"../controlador/eliminar.php",
		data:cadena,
		success:function(r){
			if(r==1){
				alertify.success("Se cancelo su cita correctamente :)");
				window.location="../sesion/ver_citas.php";
			}else{
				alertify.error("Fallo el servidor :(");
			}
		}
	});
}