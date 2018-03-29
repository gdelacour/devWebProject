<!-- Section de la recette -->
    <section>
<div.box>

<?php
$bdd = new PDO('mysql:host=127.0.0.1;dbname=miamBDD;charset=utf8', 'admin', 'some_pass');
$resultRecipe = $bdd->query ('SELECT * FROM `Recette` WHERE Id_Recette = 1');
$affichrecette = $resultRecipe->fetch();
$resultIng = $bdd->query ('SELECT * FROM `Ingredient`');
$affichIng = $resultIng->fetch();
$resultRecipe_Ing = $bdd->query ('SELECT * FROM `Recette_Ingredient` WHERE Id_Recette = 1');
$affichRecipe_Ing = $resultRecipe_Ing->fetch();
$nb_Ing = $bdd->query('SELECT COUNT(*) FROM `Recette_Ingredient` ');
$affichNb_Ing = $nb_Ing->fetch();
?>
<!-- En-tête de la recette -->
    <div class="container has-text-centered">
        <h1 class="title">
            <?php
                echo $affichrecette['Nom_Recette'];
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
                echo $affichrecette['Temps_Prep'];
            ?> minutes
     </div>
     <div class="column">
     <div class="level-item buttons has-addons">
Personne:   <span class="has-text-warning is-size-3 num-person">
                <?php
                    echo $affichrecette['Nb_Perso'];
                ?>
                
            </span>
     <button class="button is-small add-person"></button>
     <button class="button is-small remove-person"></button>
     </div>
     </div>
     <div class="column">
Difficulté :<?php
                if ($affichrecette['Lvl_Diff'] == 1)
                    {
                        echo 'Très facile';
                    }
                else echo 'error'  
            ?>
             
         </div>
         </div>
         <!-- Recette -->
         <div class="columns">
         <div class="column">
         <h2 class="title">Ingrédients</h2>
         <ul>
            <?php 
            $i = 1;
            while( $i <= $affichNb_Ing)
            {
                 ?><li>
                        <?php
                            if ($affichIng['Id_Ingredient'] == $i)
                                {
                                    echo $affichIng['Nom_Ingredient'];
                                }
                            else echo 'error'  
                        ?>
                    <span class="qteIngredient">
                        <?php
                            if ($affichRecipe_Ing['Id_Recette']==1 && $affichRecipe_Ing['Id_Ingredient'] == $i)
                                {
                                    echo $affichRecipe_Ing['Quantite'];
                                }
                            else echo 'error'  
                        ?>
                    </span>
                        <?php
                            if ($affichRecipe_Ing['Id_Recette']==1 && $affichRecipe_Ing['Id_Ingredient'] == $i)
                                {
                                    echo $affichRecipe_Ing['Unite'];
                                }
                            else echo 'error'  
                        ?>
                    </li>
                <? 
                $i++;
            }
            ?>
        </ul>
          </div>
          <div class="column">
        <h2 class="title">Préparations</h2>
          <?php
                echo $affichrecette['Préparation'];
            ?>
          </div>
        </div>    
      </div.box>
    </section>