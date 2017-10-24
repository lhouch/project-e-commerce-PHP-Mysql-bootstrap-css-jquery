<?php @mysql_query("SET NAMES 'utf8'"); ?>
<?php require_once("../includes/coniction.php") ?>
<?php require_once("../includes/fonc_categories.php") ?>
<?php require_once("../includes/fonc_class_categories.php") ?>

<?php 





if (isset($_GET['class'])) {
	$sel_class = $_GET['class'];
	$categories_class = get_categories_for_class_categorie($sel_class);
	
        foreach ($categories_class as $key => $categorie) {
        	$nom_categorie = $categorie['nom_categorie'];

        	 supprimer_dossier(PHOTOS_PATH. $nom_categorie);

        
	}

          

	$qurey = "DELETE FROM `issgh`.`class_categories` WHERE `class_categories`.`id` = '{$sel_class}';";
	$result = mysql_query($qurey, $connection);
	confirm_query($result);

    
    $qurey = "DELETE FROM `issgh`.`categories` WHERE `categories`.`class_categorie_id` = '{$sel_class}';";
	
	$result = mysql_query($qurey, $connection);
	confirm_query($result);
foreach ($categories_class as $key => $categorie) {
	$qurey = "DELETE FROM `issgh`.`produits` WHERE `produits`.`categorie_id` = '{$categorie['id']}'";
	$result = mysql_query($qurey, $connection);
	confirm_query($result);
}
	
	



}

redirect_to("../mod_class_categories.php?class=". $sel_class);


 ?>


<?php if (isset($connection)){
	mysql_close($connection);
} ?>