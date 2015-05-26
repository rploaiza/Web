<?php
    include("static/site_config.php");
	include("static/clase_mysql.php");

	extract($_POST);
	$miconexion = new clase_mysql;
	$miconexion->conectar($db_name, $db_host, $db_user, $db_password);

	 if (isset($_REQUEST['GuardarBloque'])) {
$ressql=$miconexion->consulta("update bloques set nombre='$nombre', descripcion='$descripcion', posicion='$posicion', 
		estado='$estado' where id ='$id'");
if ($ressql==NULL) {
	echo "No se guardo";
	echo "<script>location.href='prueba.php'</script>";
	//header('Location:index.php');
	}else{
		echo"Sus datos se han guardado con exito";
		echo "<script>location.href='prueba.php'</script>";
		//header('Location:index.php');
	}
}
?>

