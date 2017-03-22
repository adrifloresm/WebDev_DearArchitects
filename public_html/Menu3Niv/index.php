<?php require_once('Base.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
    function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "")
    {
      $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;

      $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

      switch ($theType) {
        case "text":
          $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
          break;
        case "long":
        case "int":
          $theValue = ($theValue != "") ? intval($theValue) : "NULL";
          break;
        case "double":
          $theValue = ($theValue != "") ? "'" . doubleval($theValue) . "'" : "NULL";
          break;
        case "date":
          $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
          break;
        case "defined":
          $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
          break;
      }
      return $theValue;
    }
}

//Info Projects
mysql_select_db($database_Base, $Base);
$query_project =  sprintf("SELECT * FROM projects order by Project ASC");
$projects = mysql_query($query_project, $Base) or die(mysql_error());
$row_projects = mysql_fetch_assoc($projects);


//Info Academia & yrs
mysql_select_db($database_Base, $Base);
$query_b =  sprintf("SELECT * FROM academia , university_aca WHERE academia.University = university_aca.uni order by uni ASC");
$bien = mysql_query($query_b, $Base) or die(mysql_error());
$row_bien = mysql_fetch_assoc($bien);

?>
<div id="DA">
    <a href="index.php">Dear Architects</a>
</div>
<div id="linea1">&nbsp;</div>
<div style=" position: relative; top:15px;">
    <ul id="navmenu-v">
        <li id="projects"><a id="projectst" href="#">- Projects</a>
            <ul>
                 <?php do {
                  if( $row_projects['active'] == 1) { ?>
                  <li><a href="project.php?Project=<?php echo $row_projects['Project']; ?>"><?php echo $row_projects['Project']; ?></a></li>
                 <?php } else{?>
                  <li><a href='' style='cursor: text; color: #666;'><?php echo $row_projects['Project']; ?></a></li>
               <?php }} while ($row_projects = mysql_fetch_assoc($projects)); ?>
              </ul>
        </li>
        <li id="aboutus"><a id="aboutust"href="#">- About Us</a>
          <ul>
            <li><a href="margarita.php" >Margarita B. Flores Miranda</a></li>
            <li><a href="ruben.php" >Ruben O. Sepulveda Chapa</a></li>
            <li><a href="team.php">Team</a></li>
          </ul>
        </li>
        <li id="academia"><a id="academiat" href="#">- Academia</a>
          <?php
                    $curr_year = NULL;
                    echo "<ul>";
                    echo "<li id='academia2'>";
                    do{

                        if ( $curr_year != $row_bien['University'] ){

                            if ( $curr_year != null ){
                                //Esta no es la primera
                                echo "</ul>";
                                echo "</li>";

                                echo "<li id='academia2'>";
                            }
                            echo "<a href=''>";
                            echo $row_bien['University'];
                            echo "</a><ul>";
                            $curr_year = $row_bien['University'];
                        }
                        if($row_bien['active']== 1){
                            echo "<li ><a href='academia.php?Academia=".$row_bien['identif']."'>";
                            echo $row_bien['years']." | ".$row_bien['Term']." | ".$row_bien['Academia'];
                            echo "</a></li>";
                        }
                        else{
                            echo "<li><a href='' style='cursor: text; color: #666;'>";
                            echo $row_bien['years']." | ".$row_bien['Term']." | ".$row_bien['Academia'];
                            echo "</a></li>";
                        }

                    }while ($row_bien = mysql_fetch_assoc($bien));

                    echo "</ul>";
                    echo "</li>";
                    echo "</ul>";
                    ?>
            
        </li>
      </ul>
</div>
<div id="linea2">&nbsp;</div>