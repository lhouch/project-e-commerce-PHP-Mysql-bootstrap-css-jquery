<?php find_selected_produit(); ?>
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
		 
			   
                 <div id="d_produit">

                 	<?php
                 	
                 	$categorie = get_categorie_by_id($produit['categorie_id']);

                 	echo "<h2>{$produit['nom_produit']}</h2><div id=\"img\">";
                 	echo " <a href=\"./photo/{$categorie['nom_categorie']}/{$produit['img_produit']}\"><img src=\"./photo/{$categorie['nom_categorie']}/{$produit['img_produit']}\"></a></div>";
                    echo "<div id=\"info_produit\"><table><form><tr>";
                    echo "<td><label for=\"quantit\">Quantit&eacute;:</label></td>";
                    echo "<td><input type=\"text\" value=\"1\" size=\"2\" name=\"quantit\"></td></tr><tr>";
                    echo "<td><label for=\"ancien-prix\">Ancien prix:</label></td>";
                    echo "<td><label for=\"ancien-prix\" class=\"ancien-prix\">{$produit['ancien_prix']}</label></td>";
                    echo "</tr><tr><td><label for=\"prix\">Prix:</label></td>";
                    echo " <td><label for=\"prix\">{$produit['prix']}</label></td></tr><tr>";
                    echo "  <td></td><td><input type=\"submit\" value=\"Acheter\"/></td></tr></form></table>";
                    echo " <div id=\"prgrf\"><h3>D&eacute;tails:</h3>";
                    echo "<p>{$produit['details']}</p></div>";
                 	 ?>
                  

		             </div>



                


                </div>
       		     

        </div>  
 </div>
