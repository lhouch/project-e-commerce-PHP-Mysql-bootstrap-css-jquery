<?php
@mysql_query("SET NAMES 'utf8'");
require("constants.php");

// 1. create a database connection
$connection = mysql_connect(DB_SERVER,DB_USER,DB_PASS);
if (!$connection){
	die("Database conniction failed :" .mysql_error());

}

// 2. select a database to use
$db_select = mysql_select_db(DB_NAME,$connection);
if (!$db_select){
	die("Database selection failed :" . mysql_error());
}
function confirm_query($result_set){
	if (!$result_set){
	die("Database query failed :" .mysql_error());}
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
 ?>