<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>DA Registro</title>
<link rel="stylesheet" href="CSS/estilos.css" type="text/css" />
<link rel="stylesheet" href="CSS/CSS.css" type="text/css" />
<link rel="shortcut icon" href="images/da_ico.ico" type="image/x-icon"/>
<link rel="icon" href="images/da_ico.ico" type="image/x-icon" />
</head>
<body>
    
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

/*$sqlcreate= "CREATE TABLE users (
    ID MEDIUMINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(60),
    password VARCHAR(60))";
mysql_query($sqlcreate,$Base);*/

//This code runs if the form has been submitted
if (isset($_POST['submit'])) {

//This makes sure they did not leave any fields blank
if (!$_POST['username'] | !$_POST['pass'] | !$_POST['pass2'] ) {
?>
<p class="tituloswarn">Campos</p>
<p class="letranorm">No completaste todos los campos.</p>
<meta http-equiv="refresh" content="2; url=registration.php"/>
<?php
die();
}

// checks if the username is in use
/*if (!get_magic_quotes_gpc()) {
$_POST['username'] = addslashes($_POST['username']);
}*/
$usercheck = $_POST['username'];
$check = mysql_query("SELECT username FROM users WHERE username = '$usercheck'")
or die(mysql_error());
$check2 = mysql_num_rows($check);

//if the name exists it gives an error
if ($check2 != 0) {
?>
<p class="tituloswarn">Usuario</p>
<p class="letranorm">El usuario: <b><?php echo $_POST['username']?></b> ya esta en uso.</p>
<meta http-equiv="refresh" content="2; url=registration.php"/>
<?php
die();
}


// this makes sure both passwords entered match
if ($_POST['pass'] != $_POST['pass2']) {
?>
<p class="tituloswarn">Password</p>
<p class="letranorm">Los passwords no son iguales.</p>
<meta http-equiv="refresh" content="2; url=registration.php"/>
<?php
die();
}

// here we encrypt the password and add slashes if needed
//$_POST['pass'] = md5($_POST['pass']); //Encriptacion
/*if (!get_magic_quotes_gpc()) {
$_POST['pass'] = addslashes($_POST['pass']);
$_POST['username'] = addslashes($_POST['username']);
}*/

// now we insert it into the database
$insert = sprintf("INSERT INTO users (username, password , permiso) values (%s,%s,%s)",
    GetSQLValueString($_POST['username'], "text"),
    GetSQLValueString($_POST['pass'], "text"),
    GetSQLValueString('0', "text"));
$add_member = mysql_query($insert);

?>
<p class="tituloswarn">Registrado</p>
<p class="letranorm">Gracias por registrarte, ahora solo debes ser autorizado por un administrador.</p>
<meta http-equiv="refresh" content="3; url=index.php"/>
<?php
}
else
{
?>

<div id="wrapper">
    <div id="leftcolumn">
        <div id="DA">
            <a href="index.php">Dear Architects</a>
        </div>
    </div>
    <div id="rightcolumn">
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
              <table border="0" cellpadding="0" cellspacing="12">
                    <tr>
                        <td colspan=2 class="titulos">Registro</td>
                    </tr>
                    <tr>
                        <td class="letraform">Usuario:</td>
                        <td>
                        <input type="text" name="username" maxlength="60"/>
                        </td>
                    </tr>
                    <tr>
                        <td class="letraform">Password:</td>
                        <td>
                        <input type="password" name="pass" maxlength="10"/>
                        </td>
                    </tr>
                    <tr>
                        <td class="letraform">Confirmar Password:</td>
                        <td>
                        <input type="password" name="pass2" maxlength="10"/>
                        </td>
                    </tr>
                    <tr>
                        <td colspan=2 align="right">
                            <input type="submit" name="submit" value="Registrar"/>
                        </td>
                    </tr>
              </table>
            </form>
           </div>
</div>
</body>
</html>
<?php
}
?>
