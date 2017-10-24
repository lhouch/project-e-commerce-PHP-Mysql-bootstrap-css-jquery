<?php 
//  c'est fichier si un place pour les fonction



function get_all_produits($p=0,$d=0){
	global $connection;
	$limit = "";
	if($d != 0){
		$limit = "LIMIT ".$p.",".$d;
	}
	$qurey = "SELECT p.*,c.nom_categorie FROM produits p
				LEFT JOIN categories c ON p.categorie_id = c.id ".$limit ;
	$produits_set = mysql_query($qurey,$connection);
	confirm_query($produits_set);
	$produits = array();
	while ($data = mysql_fetch_array($produits_set)){
		$produits[] = $data;

	}
	return $produits;
}


function get_produit_by_id($id){
	if(!$id){
		return false;
	}

	global $connection;
	$qurey = "SELECT * FROM produits WHERE id = '{$id}'";
    $produit = mysql_query($qurey,$connection);
	confirm_query($produit);
	return mysql_fetch_array($produit);
}

function get_produits_by_categorie($categorie_id,$p=0,$d=0)
{
	if(!$categorie_id){
		return false;
	}
	$limit = "";
	if($d != 0){
		$limit = "LIMIT ".$p.",".$d;
	}
	global $connection;
	$qurey = "SELECT * FROM produits WHERE categorie_id = '{$categorie_id}' ".$limit;
    $produit_set = mysql_query($qurey,$connection);
	confirm_query($produit_set);
	$produits = array();
	while ($data = mysql_fetch_array($produit_set)){
		$produits[] = $data;

	}
	return $produits;

}


function get_id_by_produit($produit){

	global $connection;
	$qurey = "SELECT id FROM produits WHERE nom_produit = '{$produit}'";
    $produit_id = mysql_query($qurey,$connection);
	confirm_query($produit_id);
	return $produit_id;
}

function find_selected_categorie($p){
  global $sel_categorie;
  $p -=1;
  $p *= 12;
  $d = $p+12;

    if (isset($_GET['categ'])){
    	$sel_categorie = get_produits_by_categorie($_GET['categ'],$p,$d);
    }else{
    	$sel_categorie = NULL;
    }
}

function find_selected_produit(){
	global $produit;

    if (isset($_GET['prod'])){
    	$produit = get_produit_by_id($_GET['prod']);
    }else{
    	$produit = NULL;
    }
}

function chercher_produit($categ,$produit_r)
{

	global $sel_categorie;
	global $connection;
	$qurey = "SELECT * FROM produits WHERE categorie_id = '{$categ}' AND nom_produit LIKE '%{$produit_r}%' ";
	 $produits = mysql_query($qurey,$connection);
		confirm_query($produits);


	$sel_categorie = array();
while ($data = mysql_fetch_array($produits)){
	$sel_categorie[] = $data;
		
	}
		 
	

}

function get_produit_by_marque()
{
	global $connection;
	global $marque;
	global $sel_categorie;

$qurey = "SELECT p.*,c.nom_categorie FROM produits p
				LEFT JOIN categories c ON c.id = p.categorie_id WHERE p.marque = '{$marque}'";


	
	 $produits = mysql_query($qurey,$connection);
		confirm_query($produits);


	$sel_categorie = array();
while ($data = mysql_fetch_array($produits)){
	$sel_categorie[] = $data;
		
	}
}

?>





