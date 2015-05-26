<?php
    include("static/site_config.php");
	include("static/clase_mysql.php");

	extract($_POST);
	$miconexion = new clase_mysql;
	$miconexion->conectar($db_name, $db_host, $db_user, $db_password);

	 if (isset($_REQUEST['GuardarBloque'])) {
			 	$ressql=$miconexion->consulta("insert into Personas values('$cedula','$nombre','$apellido','$direccion','$correo','$idIns','$idCate')");
			 	$ressql=$miconexion->consulta("insert into ConferenciasPersonas values('$idConf','$cedula')");
			 	$ressql=$miconexion->consulta("insert into CursosPersonas values('$cedula','$idCurso')");
		if ($ressql==NULL) {
			echo "No se guardo";
			echo "<script>location.href='rl_principal.php'</script>";
			//header('Location:index.php');
			}else{
				echo"Sus datos se han guardado con exito";
				echo "<script>location.href='rl_principal.php'</script>";
				//header('Location:index.php');
			}
	}
?>
