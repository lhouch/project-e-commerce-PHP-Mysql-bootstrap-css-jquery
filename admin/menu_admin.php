<?php require_once("includes/connection.php") ?>
<?php require_once("includes/session.php") ?>
<?php confirm_logged_in(); ?>
<html>
<head>
<style type="text/css">
body {
	width: 400px;
	margin: auto;
}
h2 {
	
	background-color: #888;
	width: 400px;
	height: 30px;
text-align: center;
	color: #FF8040;
	text-shadow: 1px 1px 1px #000;
	box-shadow: 0 0 5px #000;
	margin-left: 20px;
	font-weight: bold;
}
ul li {
	display: block;
          margin-top: 10px;
          height: 25px;
	
	border-radius: 10px 10px 10px 10px;
	box-shadow: 0 1px 5px #000;
   background-color: #C7C7C7;
   text-align: center;
}
ul {
	
}

a {
text-decoration: none;
font-family:Verdana, Arial, Helvetica, sans-serif;
	font-weight: bold;	
	color: black;
	display: block;
	text-shadow: 0px 1px 1px #000;
}
li {

	list-style: none;
}
a:hover li {

background-color: #706F6E;
}

</style>

</head>
<body>
<nav>
	<h2>Welcome to the staffe area. <?php echo $_SESSION['username']; ?></h2>
<ul>
<li><h3><a href="mod_aceuil.php">Manage wibsite content</a></h3></li>
<li><h3><a href="options/new_user.php">Add Staff user</a></h3></li>
<li><h3><a href="options/logout.php">Logout</a></h3></li>
</ul>
</nav>
</body>
</html>