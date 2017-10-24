<?php @mysql_query("SET NAMES 'utf8'"); ?>
<?php require_once("../includes/coniction.php") ?>
<?php require_once("../includes/fonc_categories.php") ?>
<?php require_once("../includes/fonc_class_categories.php") ?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link  rel="stylesheet" type="text/css" href="../../stylesheets/style-admin.css"/>
</head>
<body>
<?php

if (isset($_GET['class'])) {
   $class_categorie_id = $_GET['class'];
}
if(!empty($_POST)){

 
  $nom_categorie = $_POST['nom'];
  
  $visible = $_POST['visible'];

  mkdir (PHOTOS_PATH. $nom_categorie);
  if(!empty($_FILES)){ 
      $file = $_FILES['img'];
      $img_categorie = upload_image($file,$nom_categorie);
  }
  $query = "INSERT INTO categories (class_categorie_id, nom_categorie, visible, img_categorie) VALUES ('{$class_categorie_id}', '{$nom_categorie}', '{$visible}', '{$img_categorie}')";

  $result = mysql_query($query, $connection);
}   



function upload_image($img,$nom_categorie){
     $img_categorie = "";
     $ext = strtolower(substr($img['name'], -3));
     $allow_ext  = array("jpg",'png','gif');

     if(in_array($ext, $allow_ext)){
      move_uploaded_file($img['tmp_name'],PHOTOS_PATH. $nom_categorie . "/". $img['name']);
      $img_categorie = $img['name'];


     }else{
      $img_categorie = "";
     }
     return $img_categorie;
}


?>




<form method="post" action="ajut_categorie.php?class=<?php echo $class_categorie_id; ?>" enctype="multipart/form-data">
	<table>
   
      
   
   <tr>
   <td><label for="nom">Nom de categorie: </label></td>
   <td><input type="text" name="nom"></td>
   </tr>
   <tr>
    <td><label for="model">Visible: </label></td>
    <td>Yes
    <input type="radio" name="visible" value"1"/> 
                  &nbsp;
        No          
    <input type="radio" name="visible" value"0"/> 
        
    </td>
   </tr>
   <tr>
     <td><label for="image">Image pour categorie: </label></td>
     <td><input type="file" name="img"/></td>
   </tr>
   <tr><td><input type="submit" name="envoyer"/></td></tr>
    </table>
    <a href="../mod_class_categories.php?class=<?php echo urlencode($class_categorie_id); ?>">R a class</a>
</form>

</body>



<?php if (isset($connection)){
	mysql_close($connection);
} ?>