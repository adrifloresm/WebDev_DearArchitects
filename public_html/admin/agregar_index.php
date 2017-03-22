<?php require_once('Connections/Base.php'); ?>
<?php
//ini_set("memory_limit" , "100M");

if (!function_exists("shrink")) {
function shrink($uid,$na){
//describe dynamic image resize function for uploading user avatars and delete original
ob_start(); //output buffering
$quality = 120;

$uploadedfile = $uid;

if (file_exists($uploadedfile)){
list($width,$height)=getimagesize($uploadedfile);
$image_handle = imagecreatefromjpeg($uploadedfile);

//Medium
$hm = 480; //720w x 480h
if($height < $width)//horizontal
{
 $hs= 67;
 $ws= 67;
}
else
{
//Small
$hs = 67; // 67w x 67h
$ws = round(($hs / $height) * $width); //resizing etc
}
//Small
$tmps=imagecreatetruecolor($ws,$hs) or $tmps=imagecreate($ws,$hs);
imagecopyresampled($tmps,$image_handle,0,0,0,0,$ws,$hs,$width,$height);
$fs= "indexp/chico/".$na;
imagejpeg($tmps,$fs,$quality);
imagedestroy($tmps);

//Medium
$wm = round(($hm / $height) * $width); //resizing etc
if($wm > 720)
{$wm=720;}
$tmps2=imagecreatetruecolor($wm,$hm) or $tmps=imagecreate($wm,$hm);
imagecopyresampled($tmps2,$image_handle,0,0,0,0,$wm,$hm,$width,$height);
$fs2= "indexp/grande/".$na;
imagejpeg($tmps2,$fs2,$quality);
imagedestroy($tmps2);

unlink($uploadedfile);
imagedestroy($image_handle);

}
}
}

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


//Agregar imagen a servidor
//uno
if(isset($_FILES['fileField1']['name']))
{
 $nombre_archivo1=$_FILES['fileField1']['name'];

$target_path= "indexp/".$nombre_archivo1;
if(move_uploaded_file($_FILES['fileField1']['tmp_name'], $target_path)) {
shrink($target_path, $nombre_archivo1);
}
}
//dos
if(isset($_FILES['fileField2']['name']))
{
 $nombre_archivo2=$_FILES['fileField2']['name'];
$target_path= "indexp/".$nombre_archivo2;
if(move_uploaded_file($_FILES['fileField2']['tmp_name'], $target_path)) {
shrink($target_path, $nombre_archivo2);
}}
//tres
if(isset($_FILES['fileField3']['name']))
{
 $nombre_archivo3=$_FILES['fileField3']['name'];
$target_path= "indexp/".$nombre_archivo3;
if(move_uploaded_file($_FILES['fileField3']['tmp_name'], $target_path)) {
shrink($target_path, $nombre_archivo3);
}}
//cuatro
if(isset($_FILES['fileField4']['name']))
{
 $nombre_archivo4=$_FILES['fileField4']['name'];

$target_path= "indexp/".$nombre_archivo4;
if(move_uploaded_file($_FILES['fileField4']['tmp_name'], $target_path)) {
shrink($target_path, $nombre_archivo4);
}}
//cinco
if(isset($_FILES['fileField5']['name']))
{
 $nombre_archivo5=$_FILES['fileField5']['name'];

$target_path= "indexp/".$nombre_archivo5;
if(move_uploaded_file($_FILES['fileField5']['tmp_name'], $target_path)) {
shrink($target_path, $nombre_archivo5);
}}


if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1"))  {
  for ($i=0; $i< $_POST['count'] ; $i++)
  {
  $arch= array($nombre_archivo1 , $nombre_archivo2 , $nombre_archivo3 , $nombre_archivo4 , $nombre_archivo5 ) ;
  $nom= array('nombre1' ,'nombre2','nombre3','nombre4','nombre5') ;
  $act=$nom[$i];
  $insertSQL = sprintf("INSERT INTO indexp (Project , Foto) VALUES (%s,%s)",
                       GetSQLValueString($_POST[$act], "text"),
                       GetSQLValueString($arch[$i], "text"));

  mysql_select_db($database_Base, $Base);
  $Result1 = mysql_query($insertSQL, $Base) or die(mysql_error());
  }
  if (isset($_SERVER['QUERY_STRING'])) {
    echo "<script language=javascript>window.opener.location = 'adminindex.php';window.close();</script>";
  }
}

 ob_end_flush();

//Info Projects
mysql_select_db($database_Base, $Base);
$query_project =  sprintf("SELECT Project FROM projects");
$projects = mysql_query($query_project, $Base) or die(mysql_error());
$row_projects = mysql_fetch_assoc($projects);

$values = array();
$i=0;
do {
$values[$i] = $row_projects['Project'];
 $i+=1;
}while ($row_projects = mysql_fetch_assoc($projects));

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/1999/REC-html401-19991224">

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Index Photos</title>
<link rel="stylesheet" href="CSS/estilos.css" type="text/css" />
<link rel="stylesheet" href="CSS/CSS.css" type="text/css" />

<link rel="shortcut icon" href="images/da_ico.ico" type="image/x-icon"/>
<link rel="icon" href="images/da_ico.ico" type="image/x-icon" />

<script type="text/javascript">
function move() {
    window.opener.location = "adminindex.php";
    window.close();
}
function displayLoading() {
 if (document.getElementById('upload-progress')) {
  document.getElementById('upload-progress').style.display='block';
  document.getElementById('datos').style.display='none';
 }
}
function OnChange(obj)
{
for(var j=1; j<=5; j++)
{
    var m = document.getElementById("f"+j);
    if(j <= obj.value)
    {m.style.display ="block";}
    else{m.style.display ="none";}
}
}
</script>
</head>

<body>
        <p class="titulos" style="padding-top: 5px;">Add Photos</p>
        <table border="0" cellpadding="0" cellspacing="1"  class="addphoto" id="datos">
            <form action="<?php echo $editFormAction; ?>" enctype="multipart/form-data" method="post" name="form1" id="form1" onSubmit="displayLoading();">
            <tr>
                 <td colspan="4" align="left">
                    <select name="count" onchange="OnChange(this)">
                          <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                          <option value="4">4</option>
                          <option value="5">5</option>
                    </select>
                </td>
            </tr>
            <tr id="f1">
                <td>
                    Project:
                </td>
                <td>
                    <select name="nombre1">
                        <?php  for($m=0 ; $m < count($values); $m++) {?>
                       <option value="<?php echo $values[$m]; ?>"><?php echo $values[$m]; ?></option>
                        <?php }?>
                    </select>
                </td>
                <td>
                    Image 1:
                </td>
                <td>
                    <input type="file" name="fileField1" id="fileField"/>
                </td>
            </tr>
            <tr id="f2" style="display:none;">
                <td>
                    Project:
                </td>
                <td>
                    <select name="nombre2">
                        <?php  for($m=0 ; $m < count($values); $m++) {?>
                       <option value="<?php echo $values[$m]; ?>"><?php echo $values[$m]; ?></option>
                        <?php }?>
                    </select>
                </td>
                <td>
                    Image 2:
                </td>
                <td>
                    <input type="file" name="fileField2" id="fileField"/>
                </td>     
            </tr>
            <tr id="f3" style="display:none;">
                <td>
                    Project:
                </td>
                <td>
                    <select name="nombre3">
                        <?php  for($m=0 ; $m < count($values); $m++) {?>
                       <option value="<?php echo $values[$m]; ?>"><?php echo $values[$m]; ?></option>
                        <?php }?>
                    </select>
                </td>
                <td>
                    Image 3:
                </td>
                <td>
                    <input type="file" name="fileField3" id="fileField"/>
                </td>
            </tr>
            <tr id="f4" style="display:none;">
                <td>
                    Project:
                </td>
                <td>
                    <select name="nombre4">
                        <?php  for($m=0 ; $m < count($values); $m++) {?>
                       <option value="<?php echo $values[$m]; ?>"><?php echo $values[$m]; ?></option>
                        <?php }?>
                    </select>
                </td>
                <td>
                    Image 4:
                </td>
                <td>
                    <input type="file" name="fileField4" id="fileField"/>
                </td>
            </tr>
            <tr id="f5" style="display:none;">
                <td>
                    Project:
                </td>
                <td>
                    <select name="nombre5">
                        <?php  for($m=0 ; $m < count($values); $m++) {?>
                       <option value="<?php echo $values[$m]; ?>"><?php echo $values[$m]; ?></option>
                        <?php }?>
                    </select>
                </td>
                <td>
                    Image 5:
                </td>
                <td>
                    <input type="file" name="fileField5" id="fileField"/>
                </td>
            </tr>

            <tr>
                <td colspan="4"><input type="submit" name="submit" value="Add"/></td>
            </tr>
            <tr>
                <td colspan="4"><input type="button" name="btnCancel"  value="Cancel" onclick="move()"/></td>
            </tr>
            <input type="hidden" name="MM_insert" value="form1" />
            </form>
        </table>
        <table id="upload-progress" style="display:none">
        <tr >
                <td>
                Uploading images...
                </td>
        <tr>
        </table>

</body>
</html>