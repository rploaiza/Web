<?php
class clase_mysql{
	/*Variables para la conexion a la db*/
	var $BaseDatos;
	var $Servidor;
	var $Usuario;
	var $Clave;
	/*Identificadores de conexion y consulta*/
	var $Conexion_ID = 0;
	var $Consulta_ID = 0;
	/*Numero de error y error de textos*/
	var $Errno =0;
	var $Error ="";

	function clase_mysql(){

	}

	function conectar($db, $host, $user, $pass){
		if($db!="") $this->BaseDatos = $db;
		if($host!="") $this->Servidor = $host;
		if($user!="") $this->Usuario = $user;
		if($pass!="") $this->Clave = $pass;

		/*Conectamos con el servidor de la base de datos*/
		$this->Conexion_ID = mysql_connect($this->Servidor, $this->Usuario, $this->Clave);
		if(!$this->Conexion_ID){
			$this->Error="La conexion con el servidor fallida";
			return 0;
		}
		//Seleccionamos la base de datos
		if(!mysql_select_db($this->BaseDatos, $this->Conexion_ID)){
			$this->Error="Imposible abrir".$this->BaseDatos;
			return 0;
		}
		/*Si todo tiene exito, retorno el identificador de la conexion*/
		return $this->Conexion_ID;
	}
	/*Ejecutar cualquier consulta*/
	function consulta($sql=""){
		if($sql==""){
			$this->Error="No sentencia sql";
			return 0;
		}
		//ejecutamos la consulta
		$this->Consulta_ID = mysql_query($sql, $this->Conexion_ID);
		if(!$this->Consulta_ID){
			$this->Error = mysql_error();
			$this->Errno = mysql_errno();
		}
		//retorna la consulta ejecutada
		return $this->Consulta_ID;
	}
	//Devuelve el numero de campos de la consulta
	function numcampos(){
		return mysql_num_fields($this->Consulta_ID);
	}
	//Devuelve el numero de registros de una consulta
	function numregistros(){
		return mysql_num_rows($this->Consulta_ID);
	}
	//Devuelve el nombre de un campo de la consulta
	function nombrecampo($numcampos){
		return mysql_field_name($this->Consulta_ID, $numcampos);
	}
	//muestra los resultados de la consulta
	 	function verconsulta(){	
 		echo "<table width=90% align='center' border=1>";
 		echo "<tr>";
 		//mostrar los nombres de los campos
 		for ($i=0; $i < $this->numcampos(); $i++) { 
 			echo "<td>".$this->nombrecampo($i)."</td>";
 		}
 		echo "<td>Borrar</td>";
 		echo "<td>Editar</td>";
 		echo "</tr>";
 		while ($row = mysql_fetch_array($this->Consulta_ID)) {
 			echo "<tr>";
 			for ($i=0; $i < $this->numcampos(); $i++) { 
 				echo "<td>".$row[$i]."</td>";
 			}
 		echo "<td><a href ='prueba.php?id=$row[0]&act=1'>Borrar</td>";
 		echo "<td><a href ='actualizar.php?id=$row[0]&act=2'>Editar</td>";
 			echo "</tr>";
 		}
 		echo "</table>";
 	}
 	function consulta_lista(){
 		while ($row = mysql_fetch_array($this->Consulta_ID)) {
 			for ($i=0; $i < $this->numcampos(); $i++) { 
 				$row[$i];
 			}
 			return $row;
 		}
 	}

 	/*function consulta_menus(){
 		echo "<ul>";
 		while ($row = mysql_fetch_array($this->Consulta_ID)) {
 			echo "<li class='active'><a href='prueba.php?bd=".$row[0]."'>".utf8_encode($row[0]."</a></li>");
 		}
 		echo "</ul>";
 	}*/


 	function consulta_menus(){
 		echo '<div class="wrapper">
	      <ul id="menu" class="clearfix">
	      	<form method="post" action="prueba.php">';
	      	while ($row = mysql_fetch_array($this->Consulta_ID)) {
		echo '<button type="submit" class="btn btn-lg btn-link" name="'.$row[0].'" Value="'.$row[0].'">'.$row[0].'</button>';	      		
	      	}
		    echo '<a href="http://127.0.0.1/xampp/ing_web_2015/webapp_05_05_2015/rl_principal.php">
	   			<input type="button" class="btn btn-lg btn-link" value="salir" /></a>   
			</form>
	</div> ';

 	}

 	 	function formconsulta(){
 		echo "<form action='prueba.php' method='post'>";
 		for ($i=0; $i < $this->numcampos(); $i++) { 
 			echo $this->nombrecampo($i).": <input name='".$this->nombrecampo($i)."' placeholder='".$this->nombrecampo($i)."'><br>";
 		}
 		echo "<button class='btn btn-default' type='submit'>Guardar</button>";

		echo "<input type='hidden' name='lista1' value='".$this->consulta_lista()."' >";
		echo "<input type='hidden' name='bandera' value='3' >";
		echo "<input class='btn btn-default' type='submit' value='Guardar'>";
 		echo "</form>";
 	}




 }

?>






















