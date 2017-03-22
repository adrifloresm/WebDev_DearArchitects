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

//Info fotos
mysql_select_db($database_Base, $Base);
$query_fotos =  sprintf("SELECT * FROM indexp order by Foto ASC");
$fotos = mysql_query($query_fotos, $Base) or die(mysql_error());
$row_fotos = mysql_fetch_assoc($fotos);



//Borrar Imagen
if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "deleteform")) {
  $updateSQL2 = sprintf("DELETE FROM indexp WHERE Project=%s and Foto=%s",
                       GetSQLValueString($_POST['Project'], "text"),
                       GetSQLValueString($_POST['Foto'], "text"));
  mysql_select_db($database_Base, $Base);
  $Result2 = mysql_query($updateSQL2, $Base) or die(mysql_error());


  unlink("indexp/chico/".$_POST['Foto'] );
  unlink("indexp/grande/".$_POST['Foto'] );
  header("Location: ".$_SERVER["PHP_SELF"]);
}

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/1999/REC-html401-19991224">


<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Index Photos</title>
<link rel="stylesheet" href="CSS/estilos.css" type="text/css" />
<link rel="stylesheet" href="CSS/CSS.css" type="text/css" />

<script src="js/jquery-1.3.2.js" type="text/javascript"></script>

<script type="text/javascript" src="Menu/menu.js"></script>

<link rel="shortcut icon" href="images/da_ico.ico" type="image/x-icon"/>
<link rel="icon" href="images/da_ico.ico" type="image/x-icon" />
<!-- FancyBox-->
<script type="text/javascript" src="fancybox/jquery.mousewheel-3.0.2.pack.js"></script>
<script type="text/javascript" src="fancybox/jquery.fancybox-1.3.1.js"></script>
<link rel="stylesheet" type="text/css" href="fancybox/jquery.fancybox-1.3.1.css" media="screen" />
<script type="text/javascript">
$(document).ready(function() {
$("a[rel=example_group]").fancybox({
'transitionIn'		: 'none',
'transitionOut'		: 'none',
'cyclic'                : 'true',
'overlayOpacity'        : '0.4',
'overlayColor'          : 'blue'
});
});

function nuevaVentana()
{
    window.open("agregar_index.php", "newWindow", "width=495,height=245,screenX=50,left=390,screenY=50,top=100");
}
function confirmSubmit()
{
var agree=confirm("Do you want to erase the photo?");
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
        <p class="titulos">Index Photos</p>
        <span onclick="nuevaVentana()" style="cursor:pointer;"><img src="images/add.png" alt="New"> Add Photos</span>
        <table border="0" cellpadding="0" cellspacing="0" class="photos" style="padding-top: 10px;">
            <tr>
                <td>Project</td>
                <td>Photo</td>
                <td>Name</td>
                <td>Delete</td>
            </tr>
        <?php
        do { 
            $nombre=$row_fotos['Foto'];
            if($nombre != NULL){
            ?>
            <!-- Photoos!-->
             <tr>
                <td><?php echo $row_fotos['Project'];?></td>
                <td>
                <a rel="example_group" href="indexp/grande/<?php echo $nombre;?>" title=""><img alt="" src="indexp/chico/<?php echo $nombre;?>" style="border: none;" /></a>
                </td>
                <td><?php echo $nombre;?></td>
                <td>
                    <form method="POST" action="<?php echo $editFormAction; ?>" id="deleteform" name="deleteform">
                         <input type="image" name="Delete" title="Borrar Foto" src="images/cross.png" alt="Borrar Foto" onClick="return confirmSubmit()"/>
                         <input type="hidden" name="MM_update" value="deleteform" />
                         <input type="hidden" name="Project" value="<?php echo $row_fotos['Project']; ?>" />
                         <input type="hidden" name="Foto" value="<?php echo $nombre; ?>" />
                    </form>
                </td>
            </tr>
       <?php } } while ($row_fotos = mysql_fetch_assoc($fotos)); ?>
        </table>
    </div>
</div>

</body>
</html>