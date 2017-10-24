<?php @mysql_query("SET NAMES 'utf8'"); ?>
<?php require_once("../includes/coniction.php") ?>
<?php require_once("../includes/fonc_categories.php") ?>


<?php 



 if (!empty($_GET['categ'])){
 $categorie_id = $_GET['categ'];

 
$categorie = get_categorie_by_id($categorie_id);
$sel_class = $categorie['class_categorie_id'];
$nom_categorie = $categorie['nom_categorie'];

supprimer_dossier(PHOTOS_PATH. $nom_categorie);




 
 $query = "DELETE FROM produits WHERE categorie_id = '{$categorie_id}'";

 $result = mysql_query($query, $connection);
 confirm_query($result);

 

 $query = "DELETE FROM categories WHERE id = '{$categorie_id}' LIMIT 1";
 
 
 $result = mysql_query($query, $connection);
 confirm_query($result);

 
 
}
redirect_to("../mod_class_categories.php?class=". $sel_class);
 ?>


<?php if (isset($connection)){
	mysql_close($connection);
} ?>