<?php require_once('Connections/Base.php'); ?>
<?php
mysql_select_db($database_Base, $Base);

//Checks if there is a login cookie
if(isset($_COOKIE['ID_my_site']))

//if there is, it logs you in and directes you to the members page
{
$username = $_COOKIE['ID_my_site'];
$pass = $_COOKIE['Key_my_site'];
$check = mysql_query("SELECT * FROM users WHERE username = '$username'")or die(mysql_error());
while($info = mysql_fetch_array( $check ))
{
if ($pass != $info['password'])
{
}
else
{
    header("Location: inicio.php");
}
}
}

//if the login form is submitted
if (isset($_POST['submit'])) { // if form has been submitted

// makes sure they filled it in
if(!$_POST['username'] | !$_POST['pass']) {
?>
<p style="font-family:'Georgia';
    font-size:16px;
    color:#666 ;
    font-weight:bold;
    font-style: italic;
    text-align: left;">Campos</p>
<p style=" font-family: 'Georgia';
    font-size: 11px;">No llenaste todos los campos requeridos.</p>
<meta http-equiv="refresh" content="5; url=index.php"/>
<?php
die();
}

// checks it against the database
/*if (!get_magic_quotes_gpc()) {
$_POST['email'] = addslashes($_POST['email']);
}*/
mysql_select_db($database_Base, $Base);
$usuario=$_POST['username'];
$check = mysql_query("SELECT * FROM users WHERE username = '$usuario'")or die(mysql_error());

//Gives error if user dosen't exist
$check2 = mysql_num_rows($check);
if ($check2 == 0) {
?>
<p style="font-family:'Georgia';
    font-size:16px;
    color:#666 ;
    font-weight:bold;
    font-style: italic;
    text-align: left;">Registrar</p>
<p style=" font-family: 'Georgia';
    font-size: 11px;">El usuario no existe favor de <a href=registration.php style="color:#ccc;">Registrarse</a>.</p>
<meta http-equiv="refresh" content="5; url=index.php"/>
<?php
die();
}

while($info = mysql_fetch_array( $check ))
{
//$_POST['pass'] = stripslashes($_POST['pass']);
//$info['password'] = stripslashes($info['password']);
//$_POST['pass'] = md5($_POST['pass']); //Encriptacion

//gives error if the password is wrong
if ($_POST['pass'] != $info['password']) {
?>
<p style="font-family:'Georgia';
    font-size:16px;
    color:#666 ;
    font-weight:bold;
    font-style: italic;
    text-align: left;">Password</p>
<p style=" font-family: 'Georgia';
    font-size: 11px; ">Password incorrecto, intente de nuevo.</p>
<meta http-equiv="refresh" content="2; url=index.php"/>
<?php
die();
}
else
{
// if login is ok then we add a cookie
//$_POST['username'] = stripslashes($_POST['username']);
$hour = time() + 3600;
setcookie(ID_my_site, $_POST['username'], $hour);
setcookie(Key_my_site, $_POST['pass'], $hour);

//then redirect them to the members area
header("Location: inicio.php");
}
}
}
else
{
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Dear Architects Admin</title>
<link rel="stylesheet" href="CSS/estilos.css" type="text/css" />
<link rel="stylesheet" href="CSS/CSS.css" type="text/css" />

<link rel="shortcut icon" href="images/da_ico.ico" type="image/x-icon"/>
<link rel="icon" href="images/da_ico.ico" type="image/x-icon" />

</head>
    
<body>
<div id="wrapper">
    <div id="leftcolumn">
        <div id="DA">
            <a href="index.php">Dear Architects</a>
        </div>
    </div>
    <div id="rightcolumn">
        <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
                   <table border="0" cellpadding="0" cellspacing="12">
                    <tr>
                        <td colspan=2 class="titulos">Login</td></tr>
                    <tr>
                        <td class="letraform">Usuario:</td><td>
                        <input type="text" name="username" SIZE="20" maxlength="40"/>
                        </td>
                    </tr>
                    <tr>
                        <td class="letraform">Contrase&ntilde;a:</td><td>
                        <input type="password"  name="pass" SIZE="20" maxlength="40"/>
                        </td>
                    </tr>
                    <tr>
                        <td align="right" class="registrar"><a href="registration.php">Registrar</a></td>
                        <td  align="right">
                        <input type="submit" name="submit" value="Entrar"/>
                        </td>
                    </tr>
                    </table>

                    </form>
                    <?php
                    }
                    ?>
    </div>

</div>
</body>
</html>
