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

function upload_image($img,$nom_categorie,$img_dr_produit){
     $img_produit = "";
     $ext = strtolower(substr($img['name'], -3));
     $allow_ext  = array("jpg",'png','gif');

     if(in_array($ext, $allow_ext)){
       unlink(PHOTOS_PATH. $nom_categorie . "/". $img_dr_produit);
      move_uploaded_file($img['tmp_name'],PHOTOS_PATH. $nom_categorie . "/". $img['name']);
      $img_produit = $img['name'];


     }else{
      $img_produit = NULL;
     }
     return $img_produit;
}
if (isset($_GET['prod'])) {
$produit_id = $_GET['prod'];
$produit = get_produit_by_id($produit_id);
$categorie = get_categorie_by_id($produit['categorie_id']);
$nom_categorie = $categorie['nom_categorie'];
$img_dr_produit = $produit['img_produit'];
}



if(!empty($_POST)){
  
  $errors = array();
  $required_fields = array('nom', 'marque', 'model', 'a_prix', 'prix', 'details');
  foreach ($required_fields as $fieldname) {
    if (!isset($_POST[$fieldname]) || empty($_POST[$fieldname])) {
      $errors[] = $fieldname;
    }
  }

  if (empty($errors)) {

 
  $nom_produit = mysql_prep($_POST['nom']);
  $marque = mysql_prep($_POST['marque']);
  $model = mysql_prep($_POST['model']);
  $a_prix = mysql_prep($_POST['a_prix']);
  $prix = mysql_prep($_POST['prix']);
  $details = mysql_prep($_POST['details']);
  if(!empty($_FILES)){ 
      $file = $_FILES['img'];
      $img_name = upload_image($file,$nom_categorie,$img_dr_produit);

if ($img_name != NULL) {
        $img_produit = ", img_produit = ";
      $img_produit .= "'{$img_name}' ";
      }else{
    $img_produit = NULL;
  }


  }
   $query = "UPDATE produits SET nom_produit = '{$nom_produit}', marque = '{$marque}', model = '{$model}', ancien_prix = '{$a_prix}', details = '{$details}'". $img_produit . "WHERE id = {$produit_id}";
  

  $result = mysql_query($query, $connection);

redirect_to("../mod_produit.php?prod=".$produit_id);
}  
}	
?>




<form method="post" action="" enctype="multipart/form-data">
	<table>
   
   <tr>
   <td><label for="nom">Nom de produit: </label></td>
   <td><input type="text" name="nom" value="<?php echo $produit['nom_produit']; ?>"></td>
   </tr>
   <tr>
   <td><label for="marque">Marque: </label></td>
   <td><input type="text" name="marque" value="<?php echo $produit['marque']; ?>"></td>
   </tr>
   <tr>
    <td><label for="model">Model: </label></td>
    <td><input type="text" name="model" value="<?php echo $produit['model']; ?>"/></td>
   </tr>
   <tr>
     <td><label for="a_prix">Ancien prix: </label></td>
    <td><input type="text" name="a_prix" value="<?php echo $produit['ancien_prix']; ?>"/></td>
   </tr>
   <tr>
     <td><label for="prix">Prix: </label></td>
    <td><input type="text" name="prix" value="<?php echo $produit['prix']; ?>"/></td>
   </tr>
   <tr>
     <td><label for="details">Details: </label></td>
    <td>
<textarea name="details" id="comments" cols="20" rows="4"><?php echo $produit['details']; ?></textarea></td>


   </tr>
   <tr>
     <td><label for="image">Image de produit: </label></td>
     <td><input type="file" name="img"/></td>
   </tr>
   <tr><td><input type="submit" name="envoyer"/></td></tr>

    </table>
<a href="../mod_produit.php?prod=<?php echo $produit_id; ?>" style=" color: red;text-decoration:none;font-weight: bold;">Annuler</a>
</form>
</body>



<?php if (isset($connection)){
	mysql_close($connection);
} ?>