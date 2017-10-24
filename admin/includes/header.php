
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>PROJET</title>
<link rel="icon" type="image/png" href="../images/logo.png" />

<script type="text/javascript" src="../javascripts/jquery-2.0.2.min.js"></script>
<script type="text/javascript" src="../javascripts/jquery.cycle2.min.js"></script>
<script type="text/javascript" src="../javascripts/jquery.cycle2.caption2.min.js"></script>
<link rel="stylesheet" href="../stylesheets/slider.css">
<link  rel="stylesheet" type="text/css" href="../stylesheets/style.css"/>
<script type="text/javascript">

function load_categ (elt) {
    cat_id = elt.value;
    location.href = "produits.php?catg="+cat_id;
}

</script>
<style type="text/css">
.ajut {
background-color: #001FFF;

}
.ajut a {
color: #10FF00; 

}

header {
	margin-top: 20px;
}

#aside_bottom {
	margin-top: 420px;


}
header a img, input[type=image] {
	margin-left: 150px;
	box-shadow: 0 0 9px #000;

}  

</style>
<script type="text/javascript">

function effac(url) {
var answer = confirm ("Voulez-vous vraiment Supprimer ?");

if (answer == true) {
	var v = window.location.search;


window.location=(url) +(v);
}
}


</script>
</head>

<body>
     <div id="site">
			<div id="header">
				<a href="./menu_admin.php"><img src="../images/menu_icon.png" with="100" height="100" style="box-shadow: 0 0 5px #000;"></a>
				<div id="nav"> 
					<ul>
						<li><a href="mod_aceuil.php" >Aceuil</a></li>
						<li><a href="#" >Qu'est ce que Tasawoq ?</a></li>
						<li><a href="contact.html"> Contact</a></li>
					</ul>
				</div>
			</div>