
<?php require_once("./includes/coniction.php") ?>
<?php require_once("includes/session.php") ?>
<?php confirm_logged_in(); ?>
<?php @mysql_query("SET NAMES 'utf8'"); ?>
<?php
if (isset($_POST['submit'])) {

	$errors = array();
	$required_fields = array('username', 'password');
	//$errors = array_merge($errors, check_required_fields($required_fields, $_POST));
	//$fields_with_lengths = array('username' => 30, 'password' => 30);
	//$errors = array_merge($errors, check_max_field_lengths($fields_with_lengths, $_POST));
	$username = trim(mysql_prep($_POST['username']));
	$password = trim(mysql_prep($_POST['password']));
	$hashed_password = sha1($password);
	if (empty($errors)) {
		$query = "INSERT INTO users (username, hashed_password) VALUES ('{$username}', '{$hashed_password}')";
		$result = mysql_query($query, $connection);
		if ($result) {
			$message = "The user was successfully created.";
		} else {
			$message = "The user could not de created.";
			$message .= "<br> />" . mysql_error(); 
		}
	} else {
		if (count($errors) == 1) {
			$message = "There was 1 errors in the form.";
		} else {
			$message = "There were " . count($errors) . "errors in the from. ";
		}
	}

}else {
	$username = "";
	$password = "";

}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link  rel="stylesheet" type="text/css" href="../stylesheets/style-admin.css"/>
<style type="text/css">
#structure {
	
	margin-left: 40px;
}

</style>
</head>
</body>
<table id="structure">
	<tr>
        <td id="navig">
           <a href="menu_admin.php">Return to Menu</a>
           <br />
        </td>
        <td id="page">
          <h2>Create New User</h2>

          <?php if (!empty($message)) {
          	echo "<p class=\"message\">" . $message ."</p>";
          } ?>
          <?php if (!empty($errors)) { display_errors($errors);
          } ?>
      
          <form action="" method="post">
          	<table>
              <tr>
                 <td>Username:</td>
                 <td><input type="text" name="username" maxlength="30" value="<?php echo htmlentities($username); ?>"></td>
              </tr>
              <tr>
                    <td>Password:</td>
                    <td><input type="password" name="password" maxlength="30" value="<?php echo htmlentities($password); ?>"></td>
              </tr>
              <tr>
                <td colspan="2"><input type="submit" name="submit" value="Create user"></td>
            </tr>
              
          	</table>

          </form>
        </td>
	</tr>
</table>
</body>
</html>
<?php if (isset($connection)){
	mysql_close($connection);
} ?>