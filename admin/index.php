
<?php require_once("includes/coniction.php") ?>
<?php require_once("includes/session.php") ?>

<?php @mysql_query("SET NAMES 'utf8'"); ?>
<?php

if (logged_in()) {
	redirect_to("menu_admin.php");
}
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
		
		
		$query = "SELECT id, username FROM users WHERE username = '{$username}' AND hashed_password = '{$hashed_password}' LIMIT 1";
		

		$result_set = mysql_query($query);
		confirm_query($result_set);


		if (mysql_num_rows($result_set) == 1) {
			$found_user = mysql_fetch_array($result_set);
			$_SESSION['user_id'] = $found_user['id']; 
			$_SESSION['username'] = $found_user['username'];
			redirect_to("menu_admin.php");
		} else {
			$message = "<p style=\"background-color: #F35656;padding: 10px;float: left;\">Username/password combination incorrect.<br />
			Please make sure your caps<br /> lock key is off and try again.</p>";
		}
	} else {
		if (count($errors) == 1) {
			$message = "<p style=\"background-color: #F35656;padding: 10px;float: left;\">There was 1 errors in the form.</p>";
		} else {
			$message = "<p style=\"background-color: #F35656;padding: 10px;float: left;\">There were " . count($errors) . "errors in the from. </p>";
		}
	}

}else {
if (isset($_GET['logout']) && $_GET['logout'] == 1) {
		$message = "<p style=\"background-color: #56F36F;padding: 10px;float: left;\">You are naw logged out.</p>";
	}
	
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
body {
	width: 380px;
	margin: auto;
	
	
}

</style>
</head>
</body>
<table id="structure">
	<tr>
        <td id="navig">
       
           <br />
        </td>
        <td id="page">
          <h2 style="text-align: center;">Welcome</h2>
          <?php if (!empty($message)) {
          	echo "<p class=\"message\" >" . $message ."</p>";
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