<!-- Section de la recette -->
	<section>
<div.box>

<?php
$bdd = new PDO('mysql:host=127.0.0.1;dbname=miamBDD;charset=utf8', 'admin', 'some_pass');
$result = $bdd->query ('SELECT * FROM `Recette` WHERE 1');
$affich = $result->fetch();
?>
<!-- En-tête de la recette -->
    <div class="container has-text-centered">
        <h1 class="title">
            <?php
                echo $affich['Nom_Recette'];
            ?>
        </h1>
     <figure class="image is-128x128 has-text-centered">
     <img src="https://cdn.pixabay.com/photo/2016/11/14/10/06/cafe-latte-1823066_640.jpg">
     </figure>
     </div>
     
     <!-- Description de la recette -->
     <div class="columns has-text-centered">
     <div class="column">
     Temps de préparation : <?php
                echo $affich['Temps_Prep'];
            ?> minutes
     </div>
     <div class="column">
     <div class="level-item buttons has-addons">
Personne:   <span class="has-text-warning is-size-3 num-person">
                <?php
                    echo $affich['Nb_Perso'];
                ?>
                
            </span>
     <button class="button is-small add-person"></button>
     <button class="button is-small remove-person"></button>
     </div>
     </div>
     <div class="column">
Difficulté :<?php
                if ($affich['Nom_Recette'] = 1)
                    {
                        echo 'Très facile';
                    }   
            ?>
             
         </div>
         </div>
         <!-- Recette -->
         <div class="columns">
         <div class="column">
         <h2 class="title">Ingrédients</h2>
         <ul>
         <li><span class="qteIngredient">20</span>cL d'eau</li>
		  <li><span class="qteIngredient">1</span>sachet de café</li>
		  <li><span class="qteIngredient">1</span>sachet de sucre</li>
		  <li><span class="qteIngredient">5</span>cL de lait</li>
		</ul>
	      </div>
	      <div class="column">
		<h2 class="title">Préparations</h2>
		  <?php
                echo $affich['Préparation'];
            ?>
	      </div>
	    </div>
	    
	  </div.box>
	</section>