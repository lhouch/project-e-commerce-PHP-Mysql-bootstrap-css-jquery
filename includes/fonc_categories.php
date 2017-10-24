<?php 
//  c'est fichier si un place pour les fonction


function get_categories_for_class_categorie($class_categorie_id,$p=0,$d=0){
	global $connection;
	$limit = "";
	if($d != 0){
		$limit = "LIMIT ".$p.",".$d;
	}
	$qurey = "SELECT * FROM categories WHERE class_categorie_id = {$class_categorie_id} ORDER BY nom_categorie ASC ".$limit;
    $categories_set = mysql_query($qurey,$connection);
	confirm_query($categories_set);
	$categories = array();
	while ($data = mysql_fetch_array($categories_set)){
		$categories[] = $data;

	}
	return $categories;
}


function get_all_categories(){
	global $connection;
	$qurey = "SELECT * FROM categories ORDER BY nom_categorie ASC";
	$categories_set = mysql_query($qurey,$connection);
	$categories = array();
	while ($data = mysql_fetch_array($categories_set)){
		$categories[] = $data;

	}
	return $categories;
}


function get_categorie_by_id($id){
	if(!$id){
		return false;
	}

	global $connection;
	$qurey = "SELECT * FROM categories WHERE id = '{$id}'";
    $categorie_id = mysql_query($qurey,$connection);
	confirm_query($categorie_id);
	return mysql_fetch_array($categorie_id);
}


function get_id_by_categorie($categorie){

	global $connection;
	$qurey = "SELECT id FROM categories WHERE nom_categorie = '{$categorie}'";
    $categorie_id = mysql_query($qurey,$connection);
	confirm_query($categorie_id);
	return $categorie_id;
}


function find_selected_class($p){
  global $sel_class;
   $p -=1;
  $p *= 9;
  $d = $p+9;

    if (isset($_GET['class'])){
    	$sel_class = get_categories_for_class_categorie($_GET['class'],$p,$d);
    }else{
    	$sel_class = NULL;
    }
}

?>





