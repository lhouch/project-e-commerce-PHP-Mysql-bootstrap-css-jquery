<?php 
 
if (isset($_GET['page'])){
    	$page = $_GET['page'];
    }else{
    	$page = 1;
    }


?>
<?php if (isset($_POST['produit_r'])) {
 $produit_r = $_POST['produit_r'];
 $categ = $_POST['categ'];
 chercher_produit($categ,$produit_r); 
}elseif (isset($_GET['marq'])) {

  $marque = $_GET['marq'];
  get_produit_by_marque();
  
}else { 

 find_selected_categorie($page);} ?>
  
    <div id="section"> 
        <div id="aside">
	    		                <div class="title_menu">Voir les Catégories</div>

				<ul>
                   <?php 
                   	$class_categories = get_all_class_categories();
                    $nbr = count($class_categories);
             foreach ($class_categories as $key => $class_categorie) { 
              $classli = ($key == $nbr -1) ? '' : 'bordered';
            echo "<li class='" . $classli . "'><a href=\"categories.php?class=" . urlencode($class_categorie["id"]) . "\">{$class_categorie["nom_class_categorie"]} </a>";
            $categories_set = get_categories_for_class_categorie($class_categorie["id"],0,500);
            echo "<ul>";
            foreach ($categories_set as $key => $categorie) {
              echo "<li><a href=\"produits.php?categ=" . urlencode($categorie["id"]) . "\">{$categorie["nom_categorie"]}</a></li>";
            }
              echo "</ul></li>";
            }
                    ?>
				</ul>	

                 <div id="aside_bottom">
                 	<h3 class="">Marque</h3>
                 	<ul>
                          <?php echo "<li><a href=\"produits.php?marq=IBM\">IBM</a></li>"; ?>
                        <?php echo "<li><a href=\"produits.php?marq=SAMSUNG\">SAMSUNG</a></li>"; ?>
                         <?php echo "<li><a href=\"produits.php?marq=NOKIA\">NOKIA</a></li>"; ?>
                         <?php echo "<li><a href=\"produits.php?marq=ILG\">ILG</a></li>"; ?>
                         <?php echo "<li><a href=\"produits.php?marq=NIKE\">NIKE</a></li>"; ?>
                         <?php echo "<li><a href=\"produits.php?marq=HP\">HP</a></li>"; ?>
                         <?php echo "<li><a href=\"produits.php?marq=SONY\">SONY</a></li>"; ?>
                 	</ul>

                 </div>



	    </div>


			<div id="article">
			    <div id="rechrech">
					<form  action="produits.php" method="post">  
                
              
                  <?php 
                    $categories_set = get_all_categories(); 
                    echo "<div class=\"styled-select\">";
                  echo "<select name=\"categ\">";
                  foreach ($categories_set as $key => $categorie) {
                    echo "<option value='". $categorie["id"] ."'>{$categorie["nom_categorie"]}</option>";
                  }
                  echo "</select></div>";
                  ?>
              
                
        
              <input type="text" name="produit_r" placeholder="Trouvez Rapidement vos produits ICI !!"/>
            <input type="submit" value="Chercher!!"/>
          </form>
			    </div>
		 
			   
              <div id="affeche_produits">
                   <div id="tout_produits">

<?php 
if (isset($_GET['categ'])) {
$categ = $_GET['categ'];
}
if (isset($_GET['marq'])) {
  echo "<h2>{$marque}</h2>"; 
}else {
$categorie = get_categorie_by_id($categ);
                   	 echo "<h2>{$categorie['nom_categorie']}</h2>";  
} ?>         





 <?php
$key = 0;
 foreach ($sel_categorie as $key => $produit) {
  echo "<div class=\"produit\"><ul>";
echo "<li><a href=\"afficher_produit.php?prod=" . urlencode($produit["id"]) . "\"><img src=\"./photo/";
if (isset($_GET['marq'])) {
  echo "{$produit['nom_categorie']}";
}else {
  echo "{$categorie['nom_categorie']}";
}
echo "/{$produit['img_produit']}\"></a></li>";
echo "<li><span class=\"nom_produit\">{$produit['nom_produit']}</span></li>";
echo "<li><span class=\"prix_p\">{$produit['ancien_prix']} Dh</span></li>";
echo "<li><span class=\"prix_n\">{$produit['prix']} Dh</span></li>";
echo " <li><span class=\"achet\">J'ach&egrave;te !</span></li>";
echo "</ul></div>";
 }




 ?>

   <div id="navg">
                    <?php 
                     
                    if($page != 1) {
                      echo "<a href=\"produits.php?categ=" . urlencode($categorie['id']) . "&page=" . urlencode($page-1) . "\" ><img src=\"./images/pris.jpg\" id=\"pris\" name=\"page\"></a>";
                    }
                   if($key >= 11) {
                    echo "<a href=\"produits.php?categ=" . urlencode($categorie['id']) . "&page=" . urlencode($page+1) . "\" ><img src=\"./images/suiv.jpg\" id=\"suiv\" name=\"suivant\"></a>";
                   }
                    
                   

                     ?>
                
                    
   </div>  


               </div>

                 
                 
           
                  


          </div>
       		     

        </div>  
 </div>
