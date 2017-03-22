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
  $insertSQL = sprintf("INSERT INTO academia (identif,Academia ,years, active , University, Term, Degree, Professors, Description) VALUES (%s,%s,%s,%s,%s,%s,%s,%s,%s)",
                       GetSQLValueString($_POST['unis'].".".$_POST['years'].".".$_POST['Term'].".".$_POST['Academia'], "text"),
                       GetSQLValueString($_POST['Academia'], "text"),
                       GetSQLValueString($_POST['years'], "text"),
                       GetSQLValueString($_POST['active'], "text"),
                       GetSQLValueString($_POST['unis'], "text"),
                       GetSQLValueString($_POST['Term'], "text"),
                       GetSQLValueString($_POST['Degree'], "text"),
                       GetSQLValueString($_POST['Professors'], "text"),
                       GetSQLValueString($_POST['Description'], "text")
          );

  mysql_select_db($database_Base, $Base);
  $Result1 = mysql_query($insertSQL, $Base) or die(mysql_error());
  if (isset($_SERVER['QUERY_STRING'])) {
    echo "<script language=javascript>window.opener.location = 'adminacademia.php';window.close();</script>";
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
<title>New Academia</title>
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
        <p class="titulos" style="padding-top: 5px;">New Academia</p>
        <table border="0" cellpadding="0" cellspacing="1"  class="addproject" >
            <form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">
            <tr>
                <td>
                    *Name:
                </td>
                <td class="alignleft">
                    <input type="text" name="Academia" size="15"/>
                </td>
            </tr>
            <tr>
                <td>
                    *University:
                </td>
                <td class="alignleft">
                    <select name="unis">
                        <?php  for($m=0 ; $m < count($values); $m++) {?>
                       <option value="<?php echo $values[$m]; ?>"><?php echo $values[$m]; ?></option>
                        <?php }?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    *Year:
                </td>
                <td class="alignleft">
                    <input type="text" name="years" size="8"/>
                </td>
            </tr>
                        <tr>
                <td>
                    *Term:
                </td>
                <td class="alignleft">
                    <input type="text" name="Term" size="15"/>
                </td>
            </tr>
            <tr>
                <td>
                    Active:
                </td>
                <td class="alignleft">
                    <input type="radio" name="active" value="0" /> No<br />
                    <input type="radio" name="active" value="1"checked> Yes
                </td>
            </tr>

            <tr>
                <td>
                    Degree:
                </td>
                <td class="alignleft">
                    <input type="text" name="Degree" size="15"/>
                </td>
            </tr>
            <tr>
                <td>
                    Professors:
                </td>
                <td class="alignleft">
                    <textarea name="Profssors" cols="20" rows="2"></textarea>
                </td>
            </tr>
            <tr>
                <td>
                    Description:
                </td>
                <td class="alignleft">
                    <textarea name="Description" cols="20" rows="8"></textarea>
                </td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" name="submit" value="Create"/></td>
            </tr>
            <tr>
                <td colspan="2"><input type="button" name="btnCancel"  value="Cancel" onclick="move()"/></td>
            </tr>
            <input type="hidden" name="MM_insert" value="form1" />
            </form>
        </table>
        

</body>
</html>