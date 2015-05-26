<?php
session_start();
$valido=true;
      if(isset($_POST['entrar'])){
         /*Entra solo si se presiona el boton entrar*/
         //datos de acceso
         $host="127.0.0.1";
         $usuario="root";
         $contra="";
         $db="webapp_05_05_15db";
         
         //establecer la conexion
        $testconec= mysql_pconnect($host,$usuario,$contra) or die ("No se puede conectar");
        mysql_select_db($db) or die ("No se encuentra la base de datos especificada");
         $usuario=$_POST['usuario'];
         $password=$_POST['contra'];
         $consulta="SELECT id, usuario,password FROM usuario where usuario='$usuario' AND password='$password'";
         $result=mysql_query($consulta) or die (mysql_error());
         $filasn= mysql_num_rows($result);
         if ($filasn<=0 || isset($_GET['nologin']) ){
             $valido=false;
         }else{
        $rowsresult=mysql_fetch_array($result);          
        $_SESSION['idusuario']= $rowsresult['id'];
             $valido=true;
             //guardamos en sesion el nombre del usuario 
             $_SESSION["usuario"]=$usuario;
             header("location:prueba.php?login=true");
         }               
      }
?>

<!DOCTYPE html>

<html>
<head>
    <title>Validacion de Formulario PHP</title>
    <link href="estilos/login.css" rel="stylesheet" type="text/css">
</head>

<body>
    <p class="texto">Se requiere autenticación</p>

    <div id="form">
        <p>Ingresa los datos correspondientes</p>

        <form action="login.php" method=
        "post">
            <p>Usuario:</p><input name="usuario" type="text"><br>

            <p>Contraseña:</p><input name="contra" type="password"><br>
            <input name="entrar" type="submit" value="ENTRAR">
            <?php if ($valido==false) {
                echo '<p>Datos incorrectos <br/><a href="login.php">Intente de nuevo</a></p>';
            }?>
        </form>
    </div>
</body>
</html>