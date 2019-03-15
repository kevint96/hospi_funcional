<?php

class conexion{

   protected $conexion;

   public function conectar(){
    try{
       $this->conexion = new PDO('mysql:host=localhost;dbname=hospitalcandelaria', 'root', '');
       $this->conexion->query("SET NAMES 'utf8'");
   }catch(PDOException $prueba_error){
    echo "Error: " . $prueba_error->getMessage();
}

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




public function consulta(){

	$nombre = $_SESSION['cuenta'];

	$statement = $this->conexion->prepare('SELECT * FROM pacientes WHERE cuenta = :cuenta');  //La letra 'ñ' presenta problemas.);

	$statement->execute(array(
        ':cuenta' => $nombre
    ));

	$resultado = $statement->fetch();

	return $resultado;
}

public function consultaUsuario($usuario,$clave){

    $nombre = $_SESSION['cuenta'];

     $statement = $this->conexion->prepare('SELECT * FROM pacientes WHERE cuenta = :cuenta AND password = :password'  //La letra 'ñ' presenta problemas.
 );

     $statement->execute(array(
        ':cuenta' => $usuario,
        ':password' => $clave
    ));

     $resultado = $statement->fetch();

     return $resultado;
 }


 public function consultaPorFecha($fecha,$especialidad){

    $nombre = $_SESSION['cuenta'];

    $statement = $this->conexion->prepare('SELECT * FROM medicos WHERE fecha_disponible = :fecha and especialidad =:especialidad or especialidad =:especialidad and hora_disponible =:hora');  //La letra 'ñ' presenta problemas.);

    $statement->execute(array(
        ':fecha' => $fecha,
        ':especialidad' => $especialidad,
        ':hora' => $hora
    ));

    $resultado = $statement->fetchAll(PDO::FETCH_ASSOC);

    return $resultado;
}


}
?>