
  
    <div id="section"> 
        <div id="aside">
	    		                <div class="title_menu">Voir les Catégories</div>

				<ul>
                  <li class="ajut"><a href="./options/ajut_class.php"><img src="../images/ajut.png" width="20" height="20">Ajut class<img src="../images/ajut.png" width="20" height="20"></a></li>
                   <?php 
                   	$class_categories = get_all_class_categories();
                    $nbr = count($class_categories);
             foreach ($class_categories as $key => $class_categorie) { 
              $classli = ($key == $nbr -1) ? '' : 'bordered';
            echo "<li class='" . $classli . "'><a href=\"mod_class_categories.php?class=" . urlencode($class_categorie["id"]) . "\">{$class_categorie["nom_class_categorie"]} </a>";
            $categories_set = get_categories_for_class_categorie($class_categorie["id"]);
            echo "<ul>";
            foreach ($categories_set as $key => $categorie) {
              echo "<li><a href=\"mod_categorie.php?categ=" . urlencode($categorie["id"]) . "\">{$categorie["nom_categorie"]}</a></li>";
            }
              echo "</ul></li>";
            }
                    ?>
                 
				</ul>	

                 <div id="aside_bottom">
                 	<h3 class="">Marque</h3>
                 	<ul>
                          <?php echo "<li><a href=\"mod_categorie.php?marq=IBM\">IBM</a></li>"; ?>
                        <?php echo "<li><a href=\"mod_categorie.php?marq=SAMSUNG\">SAMSUNG</a></li>"; ?>
                         <?php echo "<li><a href=\"mod_categorie.php?marq=NOKIA\">NOKIA</a></li>"; ?>
                         <?php echo "<li><a href=\"mod_categorie.php?marq=ILG\">ILG</a></li>"; ?>
                         <?php echo "<li><a href=\"mod_categorie.php?marq=NIKE\">NIKE</a></li>"; ?>
                         <?php echo "<li><a href=\"mod_categorie.php?marq=HP\">HP</a></li>"; ?>
                         <?php echo "<li><a href=\"mod_categorie.php?marq=SONY\">SONY</a></li>"; ?>
                 	</ul>

                 </div>



	    </div>


			<div id="article">
			    <div id="rechrech">
					<form  action="mod_categorie.php" method="post">  
				        
							
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
		 
			    <div class="cycle-slideshow" 
							    data-cycle-fx=scrollHorz
							    data-cycle-timeout=2000
							    data-cycle-pager-event="mouseover"
							    data-cycle-caption-plugin=caption2
							    data-cycle-caption-fx-out='slideUp'
							    data-cycle-caption-fx-in='slideDown'
							    data-cycle-overlay-fx-out="slideUp"
							    data-cycle-overlay-fx-in="slideDown"
							    >
				    <!-- prev/next links -->
				    <div class="cycle-prev"></div>
				    <div class="cycle-next"></div>
				    <!-- Pager -->
				    <div class="cycle-pager"></div>
				    <!-- Caption -->
				    <div class="cycle-caption"></div>
				    <!-- Caption OVERLAY -->
				    <div class="cycle-overlay"></div>
		    
				    <img src="../images/cadeau.jpg" data-cycle-title="cadeau" data-cycle-desc="500 DH">
				    <img src="../images/combi-col-polo.jpg" data-cycle-title="combi col polo" data-cycle-desc="200 DH">
				    <img src="../images/Galaxy-S-VI.jpg" data-cycle-title="Galaxy S VI" data-cycle-desc="300 DH">
				    <img src="../images/HP-Envy-X2.jpg" data-cycle-title="HP-Envy-X2" data-cycle-desc="900 DH">
				    <img src="../images/les-lunettes-de-soleil.jpg" data-cycle-title="les lunettes de soleil" data-cycle-desc="220 DH">
				    <img src="../images/Nike-SportWatch-GPS-big.jpg" data-cycle-title="Nike SportWatch GPS big" data-cycle-desc="499 DH">
					<img src="../images/polo-summer.jpg" data-cycle-title="polo summer" data-cycle-desc="120 DH">
			    </div>


			    <div id="img_right">
			     	<ul>
				     	<li><a href="#"><img src="../photo/Accessoires pour femme/Robe.jpg" width="240" height="158" ></a></li>
				     	<li><a href="#"><img src="../photo/Accessioires Enfants et bebes/paul.jpg" width="240" height="158" ></a></li>
			        </ul>
			    </div>
			</div>
             
       		<div id="article_b">
                <div id="new_catgr">
                	<h2>Nouveau Produits</h2>
                	<?php
                	
                	 $nouveaux_produits = get_all_produits(0,8);

                		foreach($nouveaux_produits as $position => $produit){
                	?>
                	<div class="produit">   

                    	<ul>
	                        <li><a href="mod_produit.php?prod=<?php echo $produit['id']; ?>"><img src="<?php echo  '../photo/'. $produit['nom_categorie'] . '/' . $produit['img_produit'];?>" ></a></li>
	                        <li><span class="nom_produit"><?php echo $produit['nom_produit'];?></span></li>
	                        <li><span class="prix_p"><?php echo $produit['ancien_prix'] ?> Dh</span></li>
	                        <li><span class="prix_n"><?php echo $produit['prix'] ?> Dh</span></li>
	                        <li><span class="achet">J'achète !</span></li>

                    	</ul>
                    </div>

                	<?php	
                				
                		}
                	?>

                	

                </div>
       	   
        </div>  
 </div>
