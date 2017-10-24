<?php @mysql_query("SET NAMES 'utf8'"); ?>
<?php require_once("../includes/coniction.php") ?>
<?php require_once("../includes/fonc_categories.php") ?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link  rel="stylesheet" type="text/css" href="../../stylesheets/style-admin.css"/>
</head>
<body>
<?php

function upload_image($img,$nom_categorie){
     $img_produit = "";
     $ext = strtolower(substr($img['name'], -3));
     $allow_ext  = array("jpg",'png','gif');

     if(in_array($ext, $allow_ext)){
      move_uploaded_file($img['tmp_name'],PHOTOS_PATH. $nom_categorie . "/". $img['name']);
      $img_produit = $img['name'];


     }else{
      $img_produit = "";
     }
     return $img_produit;
}

if (isset($_GET['categ'])){
 
   $categorie_id = mysql_prep($_GET['categ']);
  $categorieInfo = get_categorie_by_id($categorie_id);
  $nom_categorie = $categorieInfo['nom_categorie'];
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
      $img_produit = upload_image($file,$nom_categorie);
  }
  $query = "INSERT INTO produits (categorie_id, nom_produit, marque, model, ancien_prix, prix, details, img_produit) VALUES ('{$categorie_id}', '{$nom_produit}', '{$marque}', '{$model}', '{$a_prix}', '{$prix}', '{$details}', '{$img_produit}')";

  $result = mysql_query($query, $connection);
  }
}   	
?>




<form method="post" action="" enctype="multipart/form-data">
	<table>
  
   <tr>
   <td><label for="nom">Nom de produit: </label></td>
   <td><input type="text" name="nom"></td>
   </tr>
   <tr>
   <td><label for="marque">Marque: </label></td>
   <td><input type="text" name="marque"></td>
   </tr>
   <tr>
    <td><label for="model">Model: </label></td>
    <td><input type="text" name="model"/></td>
   </tr>
   <tr>
     <td><label for="a_prix">Ancien prix: </label></td>
    <td><input type="text" name="a_prix"/></td>
   </tr>
   <tr>
     <td><label for="prix">Prix: </label></td>
    <td><input type="text" name="prix"/></td>
   </tr>
   <tr>
     <td><label for="details">Details: </label></td>
    <td>
<textarea name="details" id="comments" cols="20" rows="4"></textarea></td>


   </tr>
   <tr>
     <td><label for="image">Image de produit: </label></td>
     <td><input type="file" name="img"/></td>
   </tr>
   <tr><td><input type="submit" name="envoyer"/></td></tr>
    </table>
    <a href="../mod_categorie.php?categ=<?php echo $categorie_id; ?>" size="14">Annuler</a>
</form>

</body>



<?php if (isset($connection)){
	mysql_close($connection);
} ?>