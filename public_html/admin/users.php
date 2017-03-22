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

//info Todos Usuarios
mysql_select_db($database_Base, $Base);
$query_users =  sprintf("SELECT * FROM users");
$users = mysql_query($query_users, $Base) or die(mysql_error());
$row_users = mysql_fetch_assoc($users);

$editFormAction = $_SERVER['PHP_SELF'];

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "submitform")) {
  $updateSQL = sprintf("DELETE FROM users WHERE Username=%s",
                       GetSQLValueString($_POST['Username'], "text"));
  mysql_select_db($database_Base, $Base);
  $Result = mysql_query($updateSQL, $Base) or die(mysql_error());

  header('Location: ' . $_SERVER['PHP_SELF']);
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/1999/REC-html401-19991224">


<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>DA Usuarios</title>
<link rel="stylesheet" href="CSS/estilos.css" type="text/css" />
<link rel="stylesheet" href="CSS/CSS.css" type="text/css" />

<script src="js/jquery-1.3.2.js" type="text/javascript"></script>

<script type="text/javascript" src="Menu/menu.js"></script>

<link rel="shortcut icon" href="images/da_ico.ico" type="image/x-icon"/>
<link rel="icon" href="images/da_ico.ico" type="image/x-icon" />

<script type="text/javascript">
function confirmSubmit()
{
var agree=confirm("¿Seguro que quiere Borrar?");
if (agree)
	return true ;
else
	return false ;
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
        <table border="0" cellpadding="0" cellspacing="0">
                           <tr>
                               <td  class="titulos">Administración de Permisos</td>
                           </tr>

              </table>
              <table border="0" cellpadding="5" cellspacing="0" class="photos">
                                   <tr class="usuariosT">
                                       <td>Usuario</td>
                                       <td>Permiso</td>
                                       <td>Editar</td>
                                       <td>Borrar</td>
                                   </tr>
                                <?php  do {
                                    if($row_users['username']!=$username){
                                    ?>
                                    <tr class="usuarios">
                                       <td><?php echo $row_users['username']; ?></td>
                                       <td><?php echo $row_users['permiso']; ?></td>
                                       <td>
                                           <a href="users2.php?Usuario=<?php echo $row_users['username'];?>" title="Editar Permiso"><img src="images/database_edit.png" alt="Editar Permiso" style="border: none;"/></a>
                                       </td>
                                       <td>
                                           <form method="POST" action="<?php echo $editFormAction; ?>" id="submitform" name="submitform">
                                               <input type="image" name="Delete" title="Borrar Usuario" src="images/cross.png" alt="Borrar Usuario" onClick="return confirmSubmit()"/>
                                                <input type="hidden" name="MM_update" value="submitform" />
                                                <input type="hidden" name="Username" value="<?php echo $row_users['username']; ?>" />
                                           </form>
                                       </td>
                                   </tr>
                                <?php } } while ($row_users= mysql_fetch_assoc($users)); ?>
               </table>    
    </div>
</div>

</body>
</html>