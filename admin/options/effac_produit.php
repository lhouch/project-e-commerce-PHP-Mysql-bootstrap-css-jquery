<?php @mysql_query("SET NAMES 'utf8'"); ?>
<?php require_once("../includes/coniction.php") ?>
<?php require_once("../includes/fonc_categories.php") ?>
<?php require_once("../includes/fonc_produits.php") ?>

<?php 

if (isset($_GET['prod'])) {


  $produit_id = mysql_prep($_GET['prod']);


     $produit = get_produit_by_id($produit_id); 
     $categorie = get_categorie_by_id($produit['categorie_id']);
     $sel_categ = $categorie['id'];
    
     $categorie_nom = $categorie['nom_categorie']; 

    unlink(PHOTOS_PATH. "/" . $categorie_nom . "/" . $produit['img_produit']); 

    $quer = "DELETE FROM produits WHERE id = '{$produit_id}' LIMIT 1";
    $result = mysql_query($quer, $connection);

    redirect_to("../mod_categorie.php?categ=". $sel_categ);
}

 ?>


<?php if (isset($connection)){
	mysql_close($connection);
} ?>