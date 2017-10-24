<?php @mysql_query("SET NAMES 'utf8'"); ?>
<?php require_once("../includes/coniction.php") ?>
<?php require_once("../includes/fonc_categories.php") ?>
<?php require_once("../includes/fonc_produits.php") ?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link  rel="stylesheet" type="text/css" href="../stylesheets/style-admin.css"/>
<script type="text/javascript">

function load_categ (cat_id) {
    location.href = "mod_produit.php?catg="+cat_id;
}

</script>
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




if(!empty($_POST)){
  $categorie_id = $_POST['categorie'];
  $produit_id = $_POST['produit'];
  $categorieInfo = get_categorie_by_id($categorie_id);
  $nom_categorie = $categorieInfo['nom_categorie'];
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
?>




<form method="post" action="" enctype="multipart/form-data">
	<table>
   <tr>
   	<td><label for="catg">Choisir la categories de produit: </label></td>
	<td>
      <?php 
          $categories_set = get_all_categories(); 

          echo "<div class=\"styled-select\">";
          echo "<select name=\"categorie\" onchange=\"load_categ(".$categorie["id"].")\" >";
          foreach ($categories_set as $key => $categorie) {
            echo "<option value='". $categorie["id"] ."'>{$categorie["nom_categorie"]}</option>";
          }
          echo "</select></div>";
        ?>
    </td>
   </tr>

    
      
        <?php 

        if (!empty($categorie_id)) {

          $produits_set = get_produits_by_categorie($categorie_id,0,500); 
            echo "<tr><td>";
          echo "<div class=\"styled-select\">";
          echo "<select name=\"produit\"  > ";

          foreach ($produits_set as $key => $produit) {
            echo "<option value='". $produit["id"] ."'>{$produit["nom_produit"]}</option>";
          }
          echo "</select></div></td></tr>";
          }
        ?>
      
    


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
</form>
</body>



<?php if (isset($connection)){
	mysql_close($connection);
} ?>