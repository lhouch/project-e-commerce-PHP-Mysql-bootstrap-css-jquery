<?php require_once("./includes/coniction.php") ?>
<?php require_once("includes/session.php") ?>
<?php 
if (!logged_in()) {
	redirect_to("menu_admin.php");
}
	require_once("./includes/fonc_categories.php");
	require_once("./includes/fonc_class_categories.php");
	require_once("./includes/fonc_produits.php");
 ?>
<?php include("./includes/header.php"); ?>

<?php include("./includes/section_mod_categorie.php"); ?>
<?php include("./includes/footer.php"); ?>