<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>PROJET</title>
<link rel="icon" type="image/png" href="./photo/tighremt.png" />

<style type="text/css">
#menu {
	background-color: #EFEFEF;
	width: 900px;
	margin: auto;
	height: 35em;
		box-shadow: 0 1px 5px #000;
}

label {
	padding-top: 10px;
	display: block;
	height: 40px;
	text-align: center;
width: 400px;

background-color: #FF8608;
font-family:Verdana, Arial, Helvetica, sans-serif;
	font-weight: bold;
	text-shadow: 0px 1px 3px #000;
font-size: 20px;
-webkit-border-radius: 0px 0px 10px 10px;
 	    -moz-border-radius: 0px 0px 10px 10px;
	border-radius: 0px 0px 10px 10px;
	box-shadow: 0 1px 5px #000;


}
ul li ul li {
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
	text-shadow: 0px 1px 3px #000;
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

<div id="menu">

<ul>
      <li><label for="name">Modifier les class des categories :</label>
      	<ul>
           <a href="ajut_class.php"><li>Créer un class</li></a>
           <a href=""><li>Supprimer un class</li></a>
           <a href=""><li>Modifier un class</li></a>
        </ul>
      </li>
</ul>
<ul>      

      <li><label for="name">Modifier les categories :</label>
      	<ul>
           <a href="ajut_categorie.php"><li>Créer un catégorie</li></a>
           <a href="effac_categorie.php"><li>Supprimer un catégorie</li></a>
           <a href=""><li>Modifier un catégorie</li></a>
        </ul>
      </li>
</ul>      
<ul>      
      <li><label for="name">Modifier les produits :</label>
      	<ul>
           <a href="ajut_produit.php"><li>Créer un produit</li></a>
           <a href="effac_produit.php"><li>Supprimer un produit</li></a>
           <a href=""><li>Modifier un produit</li></a>
        </ul>
      </li>
</ul>


</div>

</body>