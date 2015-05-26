<footer>
	<?php
		 $query = "select * from bloques where estado='1' and posicion='pie'";
            $result = mysql_query($query) or die("error". mysql_error());
            while ($row = mysql_fetch_array($result)) {
              echo "".utf8_encode($row['nombre'])."<br>";
              echo "".utf8_encode($row['descripcion'])."";
            }
	?>
<h6>Derechos Reservados UTPL</h6>
</footer>