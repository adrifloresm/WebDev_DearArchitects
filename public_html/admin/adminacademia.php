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
//Info Academia
mysql_select_db($database_Base, $Base);
$query_academia =  sprintf("SELECT * FROM academia order by  University ASC, years DESC");
$academia = mysql_query($query_academia, $Base) or die(mysql_error());
$row_academia = mysql_fetch_assoc($academia);

//Borrar Academia
if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "deleteform")) {
  //Borrar Info AcademiaS
  $updateSQL2 = sprintf("DELETE FROM academia WHERE identif=%s ",
                       GetSQLValueString($_POST['Academia'], "text"));
  mysql_select_db($database_Base, $Base);
  $Result2 = mysql_query($updateSQL2, $Base) or die(mysql_error());

  //Borrar fotos

  //Info fotos AcademiaSP
    mysql_select_db($database_Base, $Base);
    $query_fotos =  sprintf("SELECT * FROM academiap where Academia=%s",GetSQLValueString($_POST['Academia'], "text"));
    $fotos = mysql_query($query_fotos, $Base) or die(mysql_error());
    $row_fotos = mysql_fetch_assoc($fotos);

    do {
            $nombre=$row_fotos['Photo'];
            unlink("academiap/chico/".$nombre );
            unlink("academiap/grande/".$nombre );
    }while ($row_fotos = mysql_fetch_assoc($fotos));

  $updateSQL = sprintf("DELETE FROM academiap WHERE Academia=%s ",
                       GetSQLValueString($_POST['Academia'], "text"));
  mysql_select_db($database_Base, $Base);
  $Result = mysql_query($updateSQL, $Base) or die(mysql_error());

  //Info fotos INDEXP
   /* mysql_select_db($database_Base, $Base);
    $query_fotosI =  sprintf("SELECT * FROM indexp where Project=%s",GetSQLValueString($_POST['Project'], "text"));
    $fotosI = mysql_query($query_fotosI, $Base) or die(mysql_error());
    $row_fotosI = mysql_fetch_assoc($fotosI);

    do {
            $nombre=$row_fotosI['Foto'];
            unlink("indexp/chico/".$nombre );
            unlink("indexp/grande/".$nombre );
    }while ($row_fotosI = mysql_fetch_assoc($fotosI));

  $updateSQL = sprintf("DELETE FROM indexp WHERE Project=%s ",
                       GetSQLValueString($_POST['Project'], "text"));
  mysql_select_db($database_Base, $Base);
  $Result = mysql_query($updateSQL, $Base) or die(mysql_error());*/

  header("Location: ".$_SERVER["PHP_SELF"]);
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/1999/REC-html401-19991224">


<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Academia</title>
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
function nuevaVentana()
{
    window.open("newacademia.php", "newWindow", "width=280,height=415,screenX=50,left=390,screenY=50,top=100");
}
function nuevaUni()
{
    window.open("newuniversity.php", "newWindow", "width=300,height=150,screenX=50,left=390,screenY=50,top=100");
}
function confirmSubmit()
{
var agree=confirm("Do you want to erase Academia?");
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
        <p class="titulos">Academia</p>
        <span onclick="nuevaUni()" style="cursor:pointer;"><img src="images/add.png" alt="New"> Edit Universities</span><br>
        <span onclick="nuevaVentana()" style="cursor:pointer;"><img src="images/add.png" alt="New"> New Academia</span>
        <table border="0" cellpadding="0" cellspacing="0" class="photos" style="padding-top: 10px;">
            <tr>
                <td>University</td>
                <td>Year</td>
                <td>Term</td>
                <td>Name</td>
                <td>Text Edit</td>
                <td>Photos Edit</td>
                <td>Active</td>
                <td>Delete</td>
            </tr>
             <?php
        do {
            if($row_academia['Academia'] != NULL){
            ?>
            <tr class="letrachica">
                <td><?php echo $row_academia['University']; ?></td>
                <td><?php echo $row_academia['years']; ?></td>
                <td><?php echo $row_academia['Term']; ?></td>
                <td><?php echo $row_academia['Academia']; ?></td>
                <td>
                    <a href="atextedit.php?Academia=<?php echo $row_academia['identif'];?>" title="Text Edit"><img src="images/text_dropcaps.png" alt="Text Edit" style="border: none;"/></a>
                </td>
                <td>
                    <?php if($row_academia['active']!=0) {?>
                    <a href="aphotoedit.php?Academia=<?php echo $row_academia['identif'];?>" title="Photo Edit"><img src="images/picture_edit.png" alt="Photo Edit" style="border: none;"/></a>
                    <?php } ?>
                </td>
                                <td>
                    <?php if($row_academia['active']==0){?>
                    <span style="color:#ccc;">No</span>
                   <?php }else{?>
                     <span  style="color:#000;">Yes</span>
                    <?php }?>
                </td>
                <td>
                    <form method="POST" action="<?php echo $editFormAction; ?>" id="deleteform" name="deleteform">
                         <input type="image" name="Delete" title="Borrar Academia" src="images/cross.png" alt="Borrar Academia" onClick="return confirmSubmit()"/>
                         <input type="hidden" name="MM_update" value="deleteform" />
                         <input type="hidden" name="Academia" value="<?php echo $row_academia['identif']; ?>" />
                    </form>
                </td>
            </tr>
             <?php } } while ($row_academia = mysql_fetch_assoc($academia)); ?>
        </table>
    </div>
</div>

</body>
</html>