<?php 
//  c'est fichier si un place pour les fonction

function confirm_query($result_set){
	if (!$result_set){
	die("Database query failed :" .mysql_error());}
}


function get_all_class_categories(){
	global $connection;
	$qurey = "SELECT * FROM class_categories ORDER BY position ASC";
   $class_categorie_set = mysql_query($qurey,$connection);
         confirm_query($class_categorie_set);
    return $class_categorie_set;
}

function get_categories_for_class_categorie($class_categorie_id){
	global $connection;
	$qurey = "SELECT * FROM categories WHERE class_categorie_id = {$class_categorie_id} ORDER BY position ASC";
    $categories_set = mysql_query($qurey,$connection);
	confirm_query($categories_set);
	return $categories_set;
}


function navigation_menu(){
     $class_categorie_set = get_all_class_categories();
     
   	 while ($class_categorie = mysql_fetch_array($class_categorie_set)){
		
	 echo "<li><a href=\"edit_class_categorie.php?catg=" . urlencode($class_categorie["id"]) . "\">{$class_categorie["nom_class_categorie"]} </a>";
	 
		$categorie_set = get_categories_for_class_categorie($class_categorie["id"]);
		echo "<ul>";
		while ($categorie = mysql_fetch_array($categorie_set)) {
			echo "<li><a href=\"index.php?prod=" . urlencode($categorie["id"]) . "\">{$categorie["nom_categorie"]}</a></li>";
		  }

    	  echo "</ul></li>";}
}

function get_all_categories(){
	global $connection;
	$qurey = "SELECT * FROM categories ORDER BY position ASC";
$categories_set = mysql_query($qurey,$connection);
echo "<div class=\"styled-select\">";
echo "<select name=\"categorie\">";
while ($categorie = mysql_fetch_array($categories_set)){
	echo "<option>{$categorie["nom_categorie"]}</option>";

}
echo "</select></div>";
}


function mysql_prep($value){
            $magic_quotes_active = get_magic_quotes_gpc();
            $new_enough_php = function_exists("mysql_real_escape_string");

            if($new_enough_php ){
            	if( $magic_quotes_active ) { $value = stripslashes($value);}
            	$value = mysql_real_escape_string( $value );
            } else { //before PHP v4.3.0
             //if magic quotes aren't already on then add slashes manully
            	if( !$magic_quotes_active){ $value = addslashes($value);}

            }
            return $value;
}


function get_id_by_categorie($categorie){

	global $connection;
	$qurey = "SELECT id FROM categories WHERE nom_categorie = '{$categorie}'";
    $categorie_id = mysql_query($qurey,$connection);
	confirm_query($categorie_id);
	return $categorie_id;
}


?>





