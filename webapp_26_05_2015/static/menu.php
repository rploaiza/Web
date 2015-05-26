    <div class="wrapper">
      <ul id="menu" class="clearfix">
         
        <?php
          $query = "select * from menu WHERE id";
          $result = mysql_query($query) or die("error". mysql_error());
          while ($row = mysql_fetch_array($result)) {
            echo '<li><a href="#"'.$row[0].'">'.$row[1].'</a>';  
          }
          ?>
        </li>
      </ul>
    </div>