<?php 
//  c'est fichier si un place pour les fonction
function get_all_class_categories(){
	global $connection;
	$qurey = "SELECT * FROM class_categories WHERE visible = 1 ORDER BY position ASC";
    $class_categorie_set = mysql_query($qurey,$connection);
    confirm_query($class_categorie_set);
    $class_categories = array();

    while($data = mysql_fetch_assoc($class_categorie_set)){
    	$class_categories[] = $data;
    }

    return $class_categories;
}

function get_class_categorie_by_id($id){
	if(!$id){
		return false;
	}

	global $connection;
	$qurey = "SELECT * FROM class_categories WHERE id = '{$id}'";
    $class = mysql_query($qurey,$connection);
	confirm_query($class);
	return mysql_fetch_array($class);

}


?>





