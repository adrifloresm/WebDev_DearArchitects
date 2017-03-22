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

$i=0;
do {
$name[$i] = $row_bien['Academia'];
$year[$i] = $row_bien['years'];
$active[$i] = $row_bien['active'];
$i+=1;
}while ($row_bien = mysql_fetch_assoc($bien));
?>



<div id="DA">
    <a href="index.php">Dear Architects</a>
</div>
<div id="linea1">&nbsp;</div>
  <dl class="dropdown">
    <dt id="one-ddheader" class="upperdd" onmouseover="ddMenu('one',1)" onmouseout="ddMenu('one',-1)">- Projects</dt>
    <dd id="one-ddcontent" onmouseover="cancelHide('one')" onmouseout="ddMenu('one',-1)">
      <ul>
       <?php do {
          if( $row_projects['active'] == 1) { ?>
          <li><a href="project.php?Project=<?php echo $row_projects['Project']; ?>" class="underline"><?php echo $row_projects['Project']; ?></a></li>
         <?php } else{?>
          <li><span><?php echo $row_projects['Project']; ?></span></li>
       <?php }} while ($row_projects = mysql_fetch_assoc($projects)); ?>
      </ul>
    </dd>
  </dl>
  <dl class="dropdown">
    <dt id="two-ddheader" class="upperdd" onmouseover="ddMenu('two',1)" onmouseout="ddMenu('two',-1)">- About Us</dt>
    <dd id="two-ddcontent" onmouseover="cancelHide('two')" onmouseout="ddMenu('two',-1)">
      <ul>
        <li><a href="margarita.php" class="underline">Margarita B. Flores Miranda</a></li>
        <li><a href="ruben.php" class="underline">Ruben O. Sepulveda Chapa</a></li>
        <li><a href="team.php">Team</a></li>
      </ul>
    </dd>
  </dl>
  <dl class="dropdown">
    <dt id="three-ddheader" onmouseover="ddMenu('three',1)" onmouseout="ddMenu('three',-1)">- Academia</dt>
    <dd id="three-ddcontent" onmouseover="cancelHide('three')" onmouseout="ddMenu('three',-1)">
      <ul>
           <?php  for($m=0 ; $m < count($name); $m++) {?>
             <?php if( $active[$m] == 1) { ?>
                  <li><a href="academia.php?Academia=<?php echo $name[$m]; ?>" class="underline"><?php echo  $year[$m]." ".$name[$m]; ?></a></li>
             <?php } else{?>
                   <li><span><?php echo $year[$m]." ".$name[$m]; ?></span></li>
             <?php } ?>
          <?php }?>
      </ul>
    </dd>
  </dl>
<div id="linea2">&nbsp;</div>