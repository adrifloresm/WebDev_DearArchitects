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
//Info Academia
mysql_select_db($database_Base, $Base);
$query_b =  sprintf("SELECT * FROM academia , years_aca WHERE academia.years = years_aca.year");
$bien = mysql_query($query_b, $Base) or die(mysql_error());
$row_bien = mysql_fetch_assoc($bien);

$i=0;
do {
$name[$i] = $row_bien['Academia'];
$year[$i] = $row_bien['years'].$row_bien['year'];
$active[$i] = $row_bien['active'];
 $i+=1;
}while ($row_bien = mysql_fetch_assoc($bien));

?>