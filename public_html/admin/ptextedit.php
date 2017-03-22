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
//checks cookies to make sure they are logged in
if(isset($_COOKIE['ID_my_site']))
{
    $username = $_COOKIE['ID_my_site'];
    $pass = $_COOKIE['Key_my_site'];
    $check = mysql_query("SELECT * FROM users WHERE username = '$username'")or die(mysql_error());
    while($info = mysql_fetch_array( $check ))
    {
        //if the cookie has the wrong password, they are taken to the login page
        if ($pass != $info['password'])
        { header("Location: index.php");
        }
        //otherwise they are shown the admin area
    }
}
else
//if the cookie does not exist, they are taken to the login screen
{
header("Location: index.php");
}
//Info Usuario
mysql_select_db($database_Base, $Base);
$query_permiso =  sprintf("SELECT permiso FROM users WHERE username=%s" , GetSQLValueString( $username, "text"));
$permiso = mysql_query($query_permiso, $Base) or die(mysql_error());
$row_permiso = mysql_fetch_assoc($permiso);
if($row_permiso['permiso']== '0')
{
    header("Location: esperando.php");
    die();
}
//obten Project
$p = "-1";
if (isset($_GET['Project'])) {
  $p = $_GET['Project'];
}

//Info Projects
mysql_select_db($database_Base, $Base);
$query_project =  sprintf("SELECT * FROM projects where Project=%s",GetSQLValueString( $p, "text"));
$projects = mysql_query($query_project, $Base) or die(mysql_error());
$row_projects = mysql_fetch_assoc($projects);

//Update info
if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1"))  {
  $insertSQL = sprintf("UPDATE projects  SET active=%s, Year=%s, Plot=%s , FootPrint=%s, BuiltArea=%s , Team=%s , Description=%s where Project=%s",
                       GetSQLValueString($_POST['active'], "text"),
                       GetSQLValueString($_POST['Year'], "text"),
                       GetSQLValueString($_POST['Plot'], "text"),
                       GetSQLValueString($_POST['FootPrint'], "text"),
                       GetSQLValueString($_POST['BuiltArea'], "text"),
                       GetSQLValueString($_POST['Team'], "text"),
                       GetSQLValueString($_POST['Description'], "text"),
                       GetSQLValueString($p, "text"));

  mysql_select_db($database_Base, $Base);
  $Result1 = mysql_query($insertSQL, $Base) or die(mysql_error());

  header("Location: ".$_SERVER["PHP_SELF"]."?Project=".$p);
  }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/1999/REC-html401-19991224">


<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Project Text</title>
<link rel="stylesheet" href="CSS/estilos.css" type="text/css" />
<link rel="stylesheet" href="CSS/CSS.css" type="text/css" />

<script src="js/jquery-1.3.2.js" type="text/javascript"></script>

<script type="text/javascript" src="Menu/menu.js"></script>

<link rel="shortcut icon" href="images/da_ico.ico" type="image/x-icon"/>
<link rel="icon" href="images/da_ico.ico" type="image/x-icon" />

<script type="text/javascript">
function displayLoading() {
 if (document.getElementById('upload-progress')) {
  document.getElementById('upload-progress').style.display='block';
  document.getElementById('datos').style.display='none';
 }
}
</script>
</head>

<body>
<div id="wrapper">
    <div id="leftcolumn">
        <?php include("Menu/menu.html");?>
        <div id="general">
        <p><?php echo "Usuario: ".$username;?></p>
        <p><a href="logout.php">Cerrar Sesi&oacute;n</a></p>
        </div>
        
    </div>
    <div id="rightcolumn">
        <p class="titulos">Project <?php echo $p?></p>
        <p class="titulos">Text Edit</p>
        <table border="0" cellpadding="0" cellspacing="1"  class="addproject" id="datos">
            <form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1" onSubmit="displayLoading();">
            <tr>
                <td>
                    Name:
                </td>
                <td class="alignleft">
                    <input type="text" name="Project" value="<?php echo $p?>" size="25"  disabled="disabled"/>
                </td>
            </tr>
            <tr>
                <td>
                    Active:
                </td>
                <td class="alignleft">
                    <input type="radio" name="active" value="0" <?php if($row_projects['active']==0){ echo 'checked';}?>/> No<br />
                    <input type="radio" name="active" value="1" <?php if($row_projects['active']==1){ echo 'checked';}?>> Yes
                </td>
            </tr>
            <tr>
                <td>
                    Year:
                </td>
                <td class="alignleft">
                    <input type="text" name="Year"  value="<?php echo $row_projects['Year']; ?>" size="25"/>
                </td>
            </tr>
            <tr>
                <td>
                    Plot:
                </td>
                <td class="alignleft">
                    <input type="text" name="Plot" value="<?php echo $row_projects['Plot']; ?>" size="25"/>
                </td>
            </tr>
            <tr>
                <td>
                    FootPrint:
                </td>
                <td class="alignleft">
                    <input type="text" name="FootPrint" value="<?php echo $row_projects['FootPrint']; ?>" size="25"/>
                </td>
            </tr>
            <tr>
                <td>
                    BuiltArea:
                </td>
                <td class="alignleft">
                    <input type="text" name="BuiltArea" value="<?php echo $row_projects['BuiltArea']; ?>" size="25" />
                </td>
            </tr>
            <tr>
                <td>
                    Team:
                </td>
                <td class="alignleft">
                    <textarea name="Team" cols="21" rows="2"><?php echo $row_projects['Team']; ?></textarea>
                </td>
            </tr>
            <tr>
                <td>
                    Description:
                </td>
                <td class="alignleft">
                    <textarea name="Description"  cols="21" rows="8"><?php echo $row_projects['Description']; ?></textarea>
                </td>
            </tr>
            <tr>
                <td colspan="4"><input type="submit" name="submit" value="Update"/></td>
            </tr>
            <tr>
                <td colspan="4"><input type="button" name="btnCancel"  value="Back" onclick="window.location = 'adminproject.php'"/></td>
            </tr>
            <input type="hidden" name="MM_insert" value="form1" />
            <input type="hidden" name="pp" value="<?php echo $p?>" />
            </form>
        </table>
        <table id="upload-progress" style="display:none">
        <tr >
                <td>
                Updating...
                </td>
        <tr>
        </table>
    </div>
</div>

</body>
</html>