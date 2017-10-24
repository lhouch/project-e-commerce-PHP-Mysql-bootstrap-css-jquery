<?php 
 
if (isset($_GET['page'])){
    	$page = $_GET['page'];
    }else{
    	$page = 1;
    }


?>
  <?php find_selected_class($page); ?>
    <div id="section"> 
        <div id="aside">
          <div id="aside_top">
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
</div>
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
                  echo "<select name=\"categ\" >";
                  foreach ($categories_set as $key => $categorie) {
                    echo "<option value='". $categorie["id"] ."'>{$categorie["nom_categorie"]}</option>";
                  }
                  echo "</select></div>";
                  ?>
              
                
        
              <input type="text" name="produit_r" placeholder="Trouvez Rapidement vos produits ICI !!"/>
            <input type="submit" value="Chercher!!"/>
          </form>
			    </div>
		 
			   
             
       		     <div id="tout_catg">         
       		     
            <?php 
            if (isset($_GET['class'])) {
           $nom_class = get_class_categorie_by_id($_GET['class']);
            }
            
             ?>
                        <?php echo "<header>";
                        echo "<a href=\"options/mod_class.php?class=" . urlencode($_GET['class']) . "\" ><img title=\"Modifier cette class\" src=\"../images/mod.png\" alt=\"Modifier c'est class des Catégories\" /></a>";
                        echo "<a href=\"options/ajut_categorie.php?class=" . urlencode($_GET['class']) . "\" ><img title=\"Ajutte un categorie\" src=\"../images/ajut.png\" /></a>";
                        echo "<input title=\"Supprimer cette class\" type=\"image\" src=\"../images/sup.png\" onclick=\"effac('./options/effac_class.php')\" /> ";
                                         
                        echo "<h2>{$nom_class["nom_class_categorie"]}</h2></header>"; ?>

                    <table>
                    	<?php 

                    	
                    	 echo "<tr>";
                    	 $n = 0;
                    	 $key = 0;
                    	foreach ($sel_class as $key => $categorie) {
                
		                        echo "<td><div class=\"catg\"><a href=\"mod_categorie.php?categ=" . urlencode($categorie["id"]) . "\">";
		                        echo "<img src=\"../photo/{$categorie["nom_categorie"]}/{$categorie["img_categorie"]}\" width=\"200\" height=\"300\">";
								            echo "<h4>{$categorie["nom_categorie"]}</h4>";
                            echo "</a></div></td>";
								if ($n == 2) {
							              echo "</tr><tr>";
                                   $n = 0;
								}else{ $n = $n+1;}
						       
					     
					}	
					echo "</tr>";	                     
                        ?>
                    </table>

<div id="navg">
                    <?php 
                     
                    if($page != 1) {
                      echo "<a href=\"categories.php?class=" . urlencode($_GET['class']) . "&page=" . urlencode($page-1) . "\" ><img src=\"../images/pris.jpg\" id=\"pris\" name=\"page\"></a>";
                    }
                   if($key >= 8) {
                    echo "<a href=\"categories.php?class=" . urlencode($_GET['class']) . "&page=" . urlencode($page+1) . "\" ><img src=\"../images/suiv.jpg\" id=\"suiv\" name=\"suivant\"></a>";
                   }
                    
                   

                     ?>
                
                    
   </div>  
           
                </div>
        </div>  
 </div>
