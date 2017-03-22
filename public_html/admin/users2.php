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

//usuario a cambiar
$u = "-1";
if (isset($_GET['Usuario'])) {
  $u = $_GET['Usuario'];
}

//info Todos Usuarios
mysql_select_db($database_Base, $Base);
$query_users =  sprintf("SELECT * FROM users where username=%s" , GetSQLValueString( $u, "text"));
$users = mysql_query($query_users, $Base) or die(mysql_error());
$row_users = mysql_fetch_assoc($users);

//Cambio de permiso
if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("UPDATE users SET permiso=%s WHERE username=%s",
                       GetSQLValueString($_POST['Perm'], "text"),
                       GetSQLValueString($_POST['usuario'], "text"));

  mysql_select_db($database_Base, $Base);
  $Result = mysql_query($insertSQL, $Base) or die(mysql_error());
  
 $insertGoTo="users.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/1999/REC-html401-19991224">

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>DA Permiso Usuario</title>
<link rel="stylesheet" href="CSS/estilos.css" type="text/css" />
<link rel="stylesheet" href="CSS/CSS.css" type="text/css" />

<script src="js/jquery-1.3.2.js" type="text/javascript"></script>

<script type="text/javascript" src="Menu/menu.js"></script>

<link rel="shortcut icon" href="images/da_ico.ico" type="image/x-icon"/>
<link rel="icon" href="images/da_ico.ico" type="image/x-icon" />

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
              <table border="0" cellpadding="0" cellspacing="0">
                   <tr>
                       <td  class="titulos">Cambio de Permiso</td>
                   </tr>
              </table>
              <table border="0" cellpadding="5" cellspacing="0" class="photos">
                    <tr class="usuariosT">
                       <td>Usuario</td>
                       <td>Permiso</td>
                       <td>&nbsp;</td>
                     </tr>
                     <?php  do {?>
                     <form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">
                     <tr class="usuarios">
                             <td><?php echo $row_users['username'];?></td>
                             
                                <td>
                                   <select name="Perm">
                                        <option value="0"<?php if($row_users['permiso']=="0"){echo "selected";}?>>No</option>
                                        <option value="1" <?php if($row_users['permiso']=="1"){echo "selected";}?>>Si</option>
                                    </select>
                                </td>
                                <td><input type="submit" value="Cambiar" />
                                    <input type="hidden" name="MM_insert" value="form1" />
                                    <input type="hidden" name="usuario" value="<?php echo $row_users['username'];?>" /></td>
                     </tr>
                     </form>
                      <?php } while ($row_users= mysql_fetch_assoc($users)); ?>
               </table>
        </div>
    </div>
</body>
</html>