<?php require_once('Connections/Base.php'); ?>
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
mysql_select_db($database_Base, $Base);


//Info Academia
mysql_select_db($database_Base, $Base);
$query_academia =  sprintf("SELECT * FROM academia");
$academia = mysql_query($query_academia, $Base) or die(mysql_error());
$row_academia = mysql_fetch_assoc($academia);

 mysql_select_db($database_Base, $Base);
$i=0;
 do {
 $ide[$i]=$row_academia['University'].".".$row_academia['years'].".".$row_academia['Term'].".".$row_academia['Academia'];
 $u[$i]=$row_academia['University'];
 $y[$i]=$row_academia['years'];
 $t[$i]=$row_academia['Term'];
 $a[$i]=$row_academia['Academia'];
 $i+=1;
} while ($row_academia = mysql_fetch_assoc($academia));

for($m = 0; $m < sizeof($ide); ++$m)
{
$insertSQL = "UPDATE academia  SET  identif='$ide[$m]' WHERE University='$u[$m]' and Academia='$a[$m]' and years='$y[$m]' and Term='$t[$m]'";
$academia = mysql_query($insertSQL, $Base);
echo "uno";
}

?>
