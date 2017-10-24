
<?php @mysql_query("SET NAMES 'utf8'"); ?>
<?php require_once("../includes/coniction.php") ?>
<?php require_once("../includes/fonc_categories.php") ?>
<?php require_once("../includes/fonc_class_categories.php") ?>



<?php 
 if (!empty($_POST)) {
   
   $nom_class = $_POST['nom'];
   $position = $_POST['position'];

   
   $visible = 1;
   
   if ($_POST['visible'] =='on') {
     $visible = 0;
   }
    $query = "INSERT INTO class_categories (nom_class_categorie, position, visible) VALUES ('{$nom_class}', '{$position}', '{$visible}')";

  $result = mysql_query($query, $connection);
    confirm_query($result);
    redirect_to("../mod_class_categories.php?class=1");
 }


 ?>




<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link  rel="stylesheet" type="text/css" href="../../stylesheets/style-admin.css"/>



</head>
<body>
<form method="POST" action="" >
	<table>

   <tr>
   <td><label for="nom">Nom de class: </label></td>
   <td>
  <input type="text" name="nom">

   </td>
   </tr>
   <tr>
   <td><label for="marque">Position: </label></td>
   <td>
      
      
<select name="position">
                    <?php $class = get_all_class_categories();
                    $class_count = count($class);
                    for($count=1; $count <= $class_count+1; $count++){
                      echo "<option value=\"{$count}\">{$count}</option>";
                    }
                    
                    ?>
                  </select>
  </td>
   </tr>
   <tr>
    <td><label for="model">Visible: </label></td>
    <td>non
    <input type="radio" name="visible" value"0" /> 
                
    </td>
   </tr>
   <tr><td><input type="submit" name="envoyer"/></td></tr>
    </table>
</form>
</body>



<?php if (isset($connection)){
	mysql_close($connection);
} ?>