<?php 
include("static/site_config.php"); 
include("static/conect_mysql.php"); 
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title><?php echo $site_name; ?></title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" media="all" href="estilos/estilos.css">

    <!-- Custom styles for this template -->
    <link href="navbar-static-top.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="bootstrap/js/ie-emulation-modes-warning.js"></script>
    <script type="text/javascript" src="bootstrap/js/jquery-1.11.1.min.js"></script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <!-- Static navbar -->
    <nav>
        <?php include("static/menu.php"); ?>

    </nav>
    <div class="container">
      <div class="row">
        <div class="col-xs-6 col-sm-3">
          <?php
            $query = "select * from bloques where estado='1' and posicion='izquierda'";
            $result = mysql_query($query) or die("error". mysql_error());
            while ($row = mysql_fetch_array($result)) {
              echo "".$row['nombre']."<br>";
              echo "".$row['descripcion']."";
            }
          ?>
        </div>
        <div class="col-xs-6 col-md-6">
            <?php

          echo "<form action='procesar.php' method='post'>";
          echo "Nombre: <input type='text' name='nombre'><br><br><br>";
          echo "Apellido: <input type='text' name='apellido'<br><br><br>";
          echo "Direccion: <input type='text' name='direccion'<br><br><br>";
          echo "Correo: <input type='text' name='correo'<br><br><br>";
          echo "Cedula: <input type='text' name='cedula'<br><br><br>";

          echo "Institución: ";  
          $query = "select * from Instituto WHERE idInstituto";
          $result = mysql_query($query) or die("error". mysql_error());
          echo "<select name='idIns'>";
          while ($row = mysql_fetch_array($result)) {
              echo "<option value='".$row[0]."' selected>".$row[1]."</option>"; 
          }
          echo "</select><br>";

          echo "Categoria: ";
          $query = "select * from Inscripciones WHERE idInscripciones";
          $result = mysql_query($query) or die("error". mysql_error());
          echo "<select name='idCate'>";
          while ($row = mysql_fetch_array($result)) {
              echo "<option value='".$row[0]."' selected>".$row[1]."</option>"; 
          }
          echo "</select><br>";

          echo "Cursos: ";
          $query = "select * from Cursos WHERE idCursos";
          $result = mysql_query($query) or die("error". mysql_error());
          echo "<select name='idCurso'>";
          while ($row = mysql_fetch_array($result)) {
              echo "<option value='".$row[0]."' selected>".$row[1]."</option>"; 
          }
          echo "</select><br>";

          echo "Conferencias: ";
          $query = "select * from Conferencias WHERE idConferencias";
          $result = mysql_query($query) or die("error". mysql_error());
          echo "<select name='idConf'>";
          while ($row = mysql_fetch_array($result)) {
              echo "<option value='".$row[0]."' selected>".$row[1]."</option>"; 
          }
          echo "</select><br>";

          echo "Asistencia: ";
          $query = "select * from Estado WHERE idEstado";
          $result = mysql_query($query) or die("error". mysql_error());
          echo "<select name='idConf'>";
          while ($row = mysql_fetch_array($result)) {
              echo "<option value='".$row[0]."' selected>".$row[1]."</option>"; 
          }
          echo "</select><br>";

          echo "<button type='submit' name='GuardarBloque' Value='GuardarBloque'>Guardar</button>";
          echo "<button type='submit' name='Factura' Value='Factura'>Factura</button>";

        echo "</form>";
          ?>





        </div>
        <div class="col-xs-6 col-sm-3">
          <?php
            $query = "select * from bloques where estado='1' and posicion='derecha'";
            $result = mysql_query($query) or die("error". mysql_error());
            while ($row = mysql_fetch_array($result)) {
              echo "".utf8_encode($row['nombre'])."<br>";
              
            }
            ?>
        </div>
      </div>

    </div> <!-- /container -->
    <?php include("static/footer.php");?>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="bootstrap/js/ie10-viewport-bug-workaround.js"></script>
    <script type="text/javascript">
$(function(){
  $('a[href="#"]').on('click', function(e){
    e.preventDefault();
  });
  
  $('#menu > li').on('mouseover', function(e){
    $(this).find("ul:first").show();
    $(this).find('> a').addClass('active');
  }).on('mouseout', function(e){
    $(this).find("ul:first").hide();
    $(this).find('> a').removeClass('active');
  });
  
  $('#menu li li').on('mouseover',function(e){
    if($(this).has('ul').length) {
      $(this).parent().addClass('expanded');
    }
    $('ul:first',this).parent().find('> a').addClass('active');
    $('ul:first',this).show();
  }).on('mouseout',function(e){
    $(this).parent().removeClass('expanded');
    $('ul:first',this).parent().find('> a').removeClass('active');
    $('ul:first', this).hide();
  });
});
</script>
  </body>
</html>
