<?php @mysql_query("SET NAMES 'utf8'"); ?>
<?php require_once("../includes/coniction.php") ?>
<?php require_once("../includes/fonc_categories.php") ?>
<?php require_once("../includes/fonc_produits.php") ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link  rel="stylesheet" type="text/css" href="../../stylesheets/style-admin.css"/>
</head>
<body>
<?php

if (isset($_GET['categ'])) {
   $categorie_id = mysql_prep($_GET['categ']);
   $dr_categorie = get_categorie_by_id($categorie_id);

}
if(!empty($_POST)){

   
  $nom_categorie = mysql_prep($_POST['nom']);
  
  $visible = mysql_prep($_POST['visible']);

sleep(1);
rename (PHOTOS_PATH. $dr_categorie['nom_categorie'], PHOTOS_PATH. $nom_categorie);


  if(!empty($_FILES)){ 
      
      $file = $_FILES['img'];
      $img_name = upload_image($file,$nom_categorie);

      if ($img_name != NULL) {
        $img_categorie = ", img_categorie = ";
      $img_categorie .= "'{$img_name}' ";
      }else{
    $img_categorie = NULL;
  }

      
      
  }
  $query = "UPDATE categories SET nom_categorie = '{$nom_categorie}', visible = '{$visible}'". $img_categorie . "WHERE id = {$categorie_id}";
  
  $result = mysql_query($query, $connection);
    confirm_query($result);
    redirect_to("../mod_categorie.php?categ=".$categorie_id);
}   



function upload_image($img,$nom_categorie){
     
     $img_categorie = "";
     $ext = strtolower(substr($img['name'], -3));
     $allow_ext  = array("jpg",'png','gif');

     if(in_array($ext, $allow_ext)){
     unlink(PHOTOS_PATH. $nom_categorie . "/". $dr_categorie['img_categorie']);
      move_uploaded_file($img['tmp_name'],PHOTOS_PATH. $nom_categorie . "/". $img['name']);
      $img_categorie = $img['name'];


     }else{
      $img_categorie = NULL;
     }
     return $img_categorie;
}


?>

	<form method="post" action="mod_categorie.php?categ=<?php echo $categorie_id; ?>" enctype="multipart/form-data">
	<table>
   
      
   
   <tr>
   <td><label for="nom">Nom de categorie: </label></td>
   <td><input type="text" name="nom" value="<?php echo $dr_categorie['nom_categorie']; ?>">
   </td>
   </tr>

   
   

   <tr>
    <td><label for="model">Visible: </label></td>
    <td><label>Non</label>
    <input type="radio" name="visible" value"0" <?php if ($dr_categorie['visible'] == 0) {
      echo "checked";
    } ?> /> 
                  &nbsp;
        <label>Yes</label>         
    <input type="radio" name="visible" value"1" <?php if ($dr_categorie['visible'] == 1) {
      echo "checked";
    } ?>/> 
        
    </td>
   </tr>
   <tr>
     <td><label for="image">Image pour categorie: </label></td>
     <td><input type="file" name="img"/></td>
   </tr>
   <tr><td><input type="submit" name="envoyer"/></td></tr>
    </table>
    <a href="../mod_categorie.php?categ=<?php echo $categorie_id; ?>" style=" color: red;text-decoration:none;font-weight: bold;">Annuler</a>
</form>

</body>



<?php if (isset($connection)){
	mysql_close($connection);
} ?>