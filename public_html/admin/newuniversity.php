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
//Agregar info a
$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}
if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1"))  {
  $insertSQL = sprintf("INSERT INTO university_aca (uni) VALUES (%s)",
                       GetSQLValueString($_POST['uni'], "text")
          );

  mysql_select_db($database_Base, $Base);
  $Result1 = mysql_query($insertSQL, $Base) or die(mysql_error());
   if (isset($_SERVER['QUERY_STRING'])) {
    $editFormAction = $_SERVER['PHP_SELF'];
  }

  }
if ((isset($_POST["MM_delete"])) && ($_POST["MM_delete"] == "form2"))  {
  $insertSQL = sprintf("DELETE FROM university_aca WHERE uni=%s ",
                       GetSQLValueString($_POST['unis'], "text")
          );

  mysql_select_db($database_Base, $Base);
  $Result1 = mysql_query($insertSQL, $Base) or die(mysql_error());
  if (isset($_SERVER['QUERY_STRING'])) {
    $editFormAction = $_SERVER['PHP_SELF'];
  }

  }
//Info Years
mysql_select_db($database_Base, $Base);
$query_yr =  sprintf("SELECT uni FROM university_aca order by uni ASC");
$yrs = mysql_query($query_yr, $Base) or die(mysql_error());
$row_yrs = mysql_fetch_assoc($yrs);

$values = array();
$i=0;
do {
$values[$i] = $row_yrs['uni'];
 $i+=1;
}while ($row_yrs = mysql_fetch_assoc($yrs));
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/1999/REC-html401-19991224">

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>New Year</title>
<link rel="stylesheet" href="CSS/estilos.css" type="text/css" />
<link rel="stylesheet" href="CSS/CSS.css" type="text/css" />

<link rel="shortcut icon" href="images/da_ico.ico" type="image/x-icon"/>
<link rel="icon" href="images/da_ico.ico" type="image/x-icon" />

<script type="text/javascript">
function move() {
    window.opener.location = "adminacademia.php";
    window.close();
}
</script>
</head>

<body>
        <p class="titulos" style="padding-top: 5px;">New University</p>
        <table border="0" cellpadding="0" cellspacing="5"  class="addproject"  >
            <form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">
            <tr>
                <td>
                    University:
                </td>
                <td class="alignleft">
                    <input type="text" name="uni" size="15"/>
                </td>
                <td><input type="submit" name="submit" value="Add"/></td>
            </tr>
            <input type="hidden" name="MM_insert" value="form1" />
            </form>
        </table>
        <p class="titulos" style="padding-top: 5px;">Delete University</p>
        <table border="0" cellpadding="0" cellspacing="5"  class="addproject"  >
            <form action="<?php echo $editFormAction; ?>" method="post" name="form2" id="form2">
            <tr>
                <td>
                    University:
                </td>
                <td class="alignleft">
                     <select name="unis">
                        <?php  for($m=0 ; $m < count($values); $m++) {?>
                       <option value="<?php echo $values[$m]; ?>"><?php echo $values[$m]; ?></option>
                        <?php }?>
                    </select>
                </td>
                <td><input type="submit" name="submit" value="Delete"/></td>
            </tr>
            <tr>
                <td colspan="3"><input type="button" name="btnCancel"  value="Cancel" onclick="move()"/></td>
            </tr>
            <input type="hidden" name="MM_delete" value="form2" />
            </form>
        </table>
        

</body>
</html>