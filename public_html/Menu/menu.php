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
$query_b =  sprintf("SELECT * FROM academia , years_aca WHERE academia.years = years_aca.year order by year DESC");
$bien = mysql_query($query_b, $Base) or die(mysql_error());
$row_bien = mysql_fetch_assoc($bien);

?>

<div id="DA">
    <a href="index.php">Dear Architects</a>
</div>
<div id="linea1">&nbsp;</div>

    <ul >
        <li><a href="#" id=one-ddheader">- Projects</a>
          <ul class="segundoniv">
              <?php do {
                  if( $row_projects['active'] == 1) { ?>
                  <li><a href="project.php?Project=<?php echo $row_projects['Project']; ?>"><?php echo $row_projects['Project']; ?></a></li>
                 <?php } else{?>
                  <li><a href='' style='cursor: text; color: #666;'><?php echo $row_projects['Project']; ?></a></li>
               <?php }} while ($row_projects = mysql_fetch_assoc($projects)); ?>
          </ul>
        </li>
        <li><a href="#" id="two-ddheader">- About Us</a>
          <ul class="segundoniv">
               <li><a href="margarita.php" >Margarita B. Flores Miranda</a></li>
               <li><a href="ruben.php" >Ruben O. Sepulveda Chapa</a></li>
               <li><a href="team.php">Team</a></li>
          </ul>
        </li>
        <li ><a href="#" id="three-ddheader">- Academia</a>
                <?php
                    $curr_year = NULL;
                    echo "<ul class='anos'>";
                    echo "<li>";
                    do{

                        if ( $curr_year != $row_bien['years'] ){

                            if ( $curr_year != null ){
                                //Esta no es la primera
                                echo "</ul>";
                                echo "</li>";

                                echo "<li>";
                            }
                            echo "<a href=''>";
                            echo $row_bien['years'];
                            echo "</a><ul>";
                            $curr_year = $row_bien['years'];
                        }
                        if($row_bien['active']== 1){
                            echo "<li ><a href='academia.php?Academia=".$row_bien['Academia']."'>";
                            echo $row_bien['Academia'];
                            echo "</a></li>";
                        }
                        else{
                            echo "<li><a href='' style='cursor: text; color: #666;'>";
                            echo $row_bien['Academia'];
                            echo "</a></li>";
                        }

                    }while ($row_bien = mysql_fetch_assoc($bien));

                    echo "</ul>";
                    echo "</li>";
                    echo "</ul>";
                    ?>
         </li>
    </ul>


<div id="linea2">&nbsp;</div>
	